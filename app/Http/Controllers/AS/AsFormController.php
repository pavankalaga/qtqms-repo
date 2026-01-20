<?php

namespace App\Http\Controllers\AS;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SampleVolumeCheck;
use App\Models\SampleVolumeCheckItem;
use App\Models\SampleReceivingRegister;
use App\Models\SampleDeliveryRegister;
use App\Models\IceGelPackRegister;
use App\Models\SampleOutsourceRegister;


class AsFormController extends Controller
{
    public function store(Request $request)
    {
        $docNo = $request->doc_no;

        // TDPL/AS/FOM-001 → FOM-001
        $formCode = last(explode('/', $docNo));

        switch ($formCode) {
            case 'FOM-001':
                return $this->storeSampleVolumeCheck($request);

            case 'REG-001':
                return $this->storeSampleReceivingRegister($request);

            case 'REG-003':
                return $this->storeSampleDeliveryRegister($request);

            case 'REG-004':
                return $this->storeIceGelRegister($request);

            case 'REG-005':
                return $this->storeSampleOutsourceRegister($request);

            default:
                return back()->with('error', 'Unknown AS form');
        }
    }

    /**
     * Store Sample Volume Check Form (FOM-001)
     */
    protected function storeSampleVolumeCheck(Request $request)
    {
        // ✅ BASIC VALIDATION
        $request->validate([
            'month_year' => 'required',      // e.g. 2026-03
            'containers' => 'required|array',
        ]);

        // month_year = 2026-03
        [$year, $month] = explode('-', $request->month_year);
        $month = (int) $month;
        $year  = (int) $year;

        // numeric month → short key
        $monthMap = [
            1 => 'jan',
            2 => 'feb',
            3 => 'mar',
            4 => 'apr',
            5 => 'may',
            6 => 'jun',
            7 => 'jul',
            8 => 'aug',
            9 => 'sep',
            10 => 'oct',
            11 => 'nov',
            12 => 'dec',
        ];

        $formMonthKey = $monthMap[$month];

        DB::transaction(function () use ($request, $month, $year, $formMonthKey) {

            /**
             * =========================
             * 1️⃣ PARENT TABLE
             * =========================
             * One row per Month & Year
             */
            $form = SampleVolumeCheck::updateOrCreate(
                [
                    'month' => $month,
                    'year'  => $year,
                ],
                [
                    'location'    => $request->location,
                    'department'  => $request->department,
                    'done_by'     => $request->done_by,
                    'reviewed_by' => $request->reviewed_by,
                    'status'      => 'submitted',
                ]
            );

            /**
             * =========================
             * 2️⃣ CLEAR OLD ITEMS
             * =========================
             * For re-submit / edit case
             */
            $form->items()->delete();

            /**
             * =========================
             * 3️⃣ CHILD TABLE
             * =========================
             * DEFAULT LOGIC:
             * Month columns fill చేయకపోయినా
             * Required Qty → selected month actual_qty
             */
            foreach ($request->containers as $row) {

                $requiredQty = $row['required_qty'] ?? null;

                // Skip empty rows completely
                if ($requiredQty === null || $requiredQty === '') {
                    continue;
                }

                /**
                 * CASE 1️⃣
                 * User filled month columns manually (advanced case)
                 */
                if (isset($row['actual_qty']) && is_array($row['actual_qty'])) {

                    $savedAnyMonth = false;

                    foreach ($row['actual_qty'] as $monthKey => $qty) {

                        if ($qty === null || $qty === '') {
                            continue;
                        }

                        SampleVolumeCheckItem::create([
                            'sample_volume_check_id' => $form->id,
                            'container_type'         => $row['container_type'],
                            'required_qty'           => $requiredQty,
                            'actual_qty'             => $qty,
                            'month'                  => $monthKey, // jul, aug, mar...
                            'remarks'                => null,
                        ]);

                        $savedAnyMonth = true;
                    }

                    // If month columns exist but selected month not filled
                    if (!$savedAnyMonth) {
                        SampleVolumeCheckItem::create([
                            'sample_volume_check_id' => $form->id,
                            'container_type'         => $row['container_type'],
                            'required_qty'           => $requiredQty,
                            'actual_qty'             => $requiredQty,
                            'month'                  => $formMonthKey,
                            'remarks'                => null,
                        ]);
                    }
                }
                /**
                 * CASE 2️⃣
                 * User did NOT touch month columns at all (MOST COMMON)
                 */
                else {

                    SampleVolumeCheckItem::create([
                        'sample_volume_check_id' => $form->id,
                        'container_type'         => $row['container_type'],
                        'required_qty'           => $requiredQty,
                        'actual_qty'             => $requiredQty,
                        'month'                  => $formMonthKey,
                        'remarks'                => null,
                    ]);
                }
            }
        });

        return back()->with('success', 'Sample Volume Check saved successfully');
    }

    public function loadSampleVolumeCheck(Request $request)
    {
        $request->validate([
            'month_year' => 'required',
        ]);

        [$year, $month] = explode('-', $request->month_year);

        $form = SampleVolumeCheck::where([
            'month' => (int) $month,
            'year'  => (int) $year,
        ])->with('items')->first();

        if (!$form) {
            return response()->json([
                'location'    => null,
                'department'  => null,
                'done_by'     => null,
                'reviewed_by' => null,
                'data'        => [],
            ]);
        }

        $result = [];

        foreach ($form->items as $item) {
            $result[$item->container_type]['required_qty'] = $item->required_qty;
            $result[$item->container_type][$item->month]  = $item->actual_qty;
        }

        return response()->json([
            'location'    => $form->location,
            'department'  => $form->department,
            'done_by'     => $form->done_by,
            'reviewed_by' => $form->reviewed_by,
            'data'        => $result,
        ]);
    }

    protected function storeSampleReceivingRegister(Request $request)
    {
        /**
         * =================================================
         * 🔵 INLINE EDIT (MULTIPLE ROWS)
         * =================================================
         */
        if ($request->has('rows') && is_array($request->rows)) {

            foreach ($request->rows as $row) {

                // 🛑 skip empty rows
                if (
                    empty($row['date']) &&
                    empty($row['client_name'])
                ) {
                    continue;
                }

                $data = [
                    'date'            => $row['date'] ?? null,
                    'time'            => $row['time'] ?? null,
                    'location'        => $request->srLocation ?? null,
                    'department'      => $request->srDepartment ?? null,
                    'equipment_id'    => $request->srEquipmentId ?? null,
                    'client_location' => $row['client_location'] ?? null,
                    'client_name'     => $row['client_name'] ?? null,
                    'blood_samples'   => $row['blood_samples'] ?? null,
                    'other_samples'   => $row['other_samples'] ?? null,
                    'csr_name'        => $row['csr_name'] ?? null,
                    'csr_sign'        => $row['csr_sign'] ?? null,
                    'sample_temp'     => $row['sample_temp'] ?? null,
                    'receiver_name'   => $row['receiver_name'] ?? null,
                    'remarks'         => $row['remarks'] ?? null,
                    'tl_code'         => $row['tl_code'] ?? null,
                ];

                if (!empty($row['id'])) {
                    SampleReceivingRegister::where('id', $row['id'])->update($data);
                } else {
                    SampleReceivingRegister::create($data);
                }

            }

            $query = SampleReceivingRegister::query();

            if ($request->filled('srFromDate') && $request->filled('srToDate')) {

                // 🔹 Date range
                $query->whereBetween('date', [
                    $request->srFromDate,
                    $request->srToDate
                ]);
            } elseif ($request->filled('srFromDate')) {

                // 🔹 Single day
                $query->whereDate('date', $request->srFromDate);
            }

            if ($request->filled('srLocation')) {
                $query->where('location', $request->srLocation);
            }

            if ($request->filled('srDepartment')) {
                $query->where('department', $request->srDepartment);
            }

            if ($request->filled('srEquipmentId')) {
                $query->where('equipment_id', $request->srEquipmentId);
            }

            $data = $query->orderBy('date', 'desc')->get();

        //     return response()->json([
        //         'success' => true,
        //         'data' => $data
        //     ]);
         return back()->with('success', 'Sample Receiving Register   sccessfully');
         }

        /**
         * =================================================
         * 🔵 NORMAL FORM SUBMIT
         * =================================================
         */
        if (
            empty($request->date) &&
            empty($request->client_name)
        ) {
            return back();
        }

        SampleReceivingRegister::create([
            'date'            => $request->date,
            'time'            => $request->time ?? null,
            'location'        => $request->srLocation ?? $request->location,
            'department'      => $request->srDepartment ?? null,
            'equipment_id'    => $request->srEquipmentId ?? null,
            'client_location' => $request->client_location ?? null,
            'client_name'     => $request->client_name ?? null,
            'blood_samples'   => $request->blood_samples ?? null,
            'other_samples'   => $request->other_samples ?? null,
            'csr_name'        => $request->csr_name ?? null,
            'csr_sign'        => $request->csr_sign ?? null,
            'sample_temp'     => $request->sample_temp ?? null,
            'receiver_name'   => $request->receiver_name ?? null,
            'remarks'         => $request->remarks ?? null,
            'tl_code'         => $request->tl_code ?? null,
        ]);


        return back()->with('success', 'Sample Receiving Register saved successfully');
    }



    public function loadSampleReceivingRegister(Request $request)
    {
        $query = SampleReceivingRegister::query();

        // 📅 Date range
        $from = $request->from_date;
        $to   = $request->to_date ?: $request->from_date; // ⭐ KEY FIX

        if ($from) {
            $query->whereDate('date', '>=', $from);
        }

        if ($to) {
            $query->whereDate('date', '<=', $to);
        }


        if ($request->location) {
            $query->where('location', $request->location);
        }

        if ($request->department) {
            $query->where('department', $request->department);
        }

        if ($request->equipment) {
            $query->where('equipment_id', $request->equipment);
        }

        return response()->json([
            'data' => $query->orderBy('date', 'desc')->get()
        ]);
    }

    protected function storeSampleDeliveryRegister(Request $request)
    {
        /**
         * =================================================
         * 🔵 INLINE EDIT / MULTI-ROW SAVE
         * rows[index][field]
         * =================================================
         */
        if ($request->has('rows') && is_array($request->rows)) {

            foreach ($request->rows as $row) {

                // 🛑 Skip completely empty rows
                if (
                    empty($row['date']) &&
                    empty($row['barcode'])
                ) {
                    continue;
                }

                $data = [
                    'date'                 => $row['date'] ?? null,
                    'barcode'              => $row['barcode'] ?? null,
                    'samples'              => $row['samples'] ?? null,
                    'department'           => $row['department'] ?? null,
                    'taken_from_accession' => $row['taken_from_accession'] ?? null,
                    'verified_by'          => $row['verified_by'] ?? null,
                    'delivered_to_dept'    => $row['delivered_to_dept'] ?? null,
                    'received_at_dept'     => $row['received_at_dept'] ?? null,
                    'remarks'              => $row['remarks'] ?? null,

                    // 🔍 FILTER VALUES (TOP FILTERS)
                    'location'             => $request->sdLocation ?? null,
                    'equipment_id'         => $request->sdEquipmentId ?? null,
                    'destination_department' => $request->sdDepartment ?? null,
                ];

                // 🔁 UPDATE
                if (!empty($row['id'])) {
                    SampleDeliveryRegister::where('id', $row['id'])->update($data);
                }
                // ➕ INSERT
                else {
                    SampleDeliveryRegister::create($data);
                }
            }

            // 🔥 INLINE SAVE → NO REDIRECT PAGE CHANGE

            return back()->with('success', 'Sample Delivery Register updated successfully');
        }

        /**
         * =================================================
         * 🟢 NORMAL FORM SUBMIT (SINGLE ROW)
         * =================================================
         */
        if (
            empty($request->date) &&
            empty($request->barcode)
        ) {
            return back();
        }

        SampleDeliveryRegister::create([
            'date'                 => $request->date,
            'barcode'              => $request->barcode,
            'samples'              => $request->samples,
            'department'           => $request->department,
            'taken_from_accession' => $request->taken_from_accession,
            'verified_by'          => $request->verified_by,
            'delivered_to_dept'    => $request->delivered_to_dept,
            'received_at_dept'     => $request->received_at_dept,
            'remarks'              => $request->remarks,
            'location'             => $request->sdLocation,
            'equipment_id'         => $request->sdEquipmentId,
            'destination_department' => $request->sdDepartment,
        ]);

        return back()->with('success', 'Sample Delivery Register saved successfully');
    }


    public function loadSampleDeliveryRegister(Request $request)
    {
        $query = SampleDeliveryRegister::query();

        // 📅 Date range
        $from = $request->from_date;
        $to   = $request->to_date ?: $request->from_date; // ⭐ KEY FIX

        if ($from) {
            $query->whereDate('date', '>=', $from);
        }

        if ($to) {
            $query->whereDate('date', '<=', $to);
        }


        // 🔹 Location
        if ($request->location) {
            $query->where('location', $request->location);
        }

        // 🔹 Department
        if ($request->department) {
            $query->where('department', $request->department);
        }

        // 🔹 Equipment / TL Code
        if ($request->equipment) {
            $query->where('equipment_id', $request->equipment);
        }

        return response()->json([
            'data' => $query->orderBy('date', 'desc')->get()
        ]);
    }

    protected function storeIceGelRegister(Request $request)
    {
        /**
         * =================================================
         * 🔵 INLINE EDIT / MULTI-ROW SAVE
         * rows[index][field]
         * =================================================
         */
        if ($request->has('rows') && is_array($request->rows)) {

            foreach ($request->rows as $row) {

                // 🛑 Skip completely empty rows
                if (
                    empty($row['date']) &&
                    empty($row['quantity']) &&
                    empty($row['handed_over_by'])
                ) {
                    continue;
                }

                $data = [
                    'date'           => $row['date'] ?? null,
                    'quantity'       => $row['quantity'] ?? null,
                    'handed_over_by' => $row['handed_over_by'] ?? null,
                    'received_by'    => $row['received_by'] ?? null,
                    'returned'       => $row['returned'] ?? null, // yes / no
                    'remarks'        => $row['remarks'] ?? null,

                    // 🔍 TOP FILTER VALUES
                    'location'       => $request->igLocation ?? null,
                    'department'     => $request->igDepartment ?? null,
                ];

                // 🔁 UPDATE
                if (!empty($row['id'])) {
                    IceGelPackRegister::where('id', $row['id'])->update($data);
                }
                // ➕ INSERT
                else {
                    IceGelPackRegister::create($data);
                }
            }

            // 🔥 INLINE SAVE → NO PAGE RELOAD
            return back()->with('success', 'Ice Gel Packs Register updated successfully');
        }

        /**
         * =================================================
         * 🟢 NORMAL FORM SUBMIT (SINGLE ROW)
         * =================================================
         */
        if (
            empty($request->date) &&
            empty($request->quantity) &&
            empty($request->handed_over_by)
        ) {
            return back();
        }

        IceGelPackRegister::create([
            'date'           => $request->date,
            'quantity'       => $request->quantity,
            'handed_over_by' => $request->handed_over_by,
            'received_by'    => $request->received_by,
            'returned'       => $request->returned,
            'remarks'        => $request->remarks,
            'location'       => $request->igLocation,
            'department'     => $request->igDepartment,
        ]);

        return back()->with('success', 'Ice Gel Packs Register saved successfully');
    }


    public function loadIceGelRegister(Request $request)
    {
        $query = IceGelPackRegister::query();

        $from = $request->from_date;
        $to   = $request->to_date ?: $request->from_date; // ⭐ KEY FIX

        if ($from) {
            $query->whereDate('date', '>=', $from);
        }

        if ($to) {
            $query->whereDate('date', '<=', $to);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        return response()->json([
            'data' => $query->orderBy('date', 'desc')->get()
        ]);
    }


    protected function storeSampleOutsourceRegister(Request $request)
    {
        /**
         * =================================================
         * 🔵 INLINE EDIT / MULTI-ROW SAVE
         * rows[index][field]
         * =================================================
         */
        if ($request->has('rows') && is_array($request->rows)) {

            foreach ($request->rows as $row) {

                // 🛑 Skip completely empty rows
                if (
                    empty($row['date']) &&
                    empty($row['bar_code']) &&
                    empty($row['patient_name'])
                ) {
                    continue;
                }

                $data = [
                    'date'                  => $row['date'] ?? null,

                    // 🔍 TOP FILTER VALUES
                    'location'              => $request->soLocation ?? null,
                    'department'            => $request->soDepartment ?? null,
                    'equipment_id'          => $request->soEquipmentId ?? null,

                    'bar_code'              => $row['bar_code'] ?? null,
                    'patient_name'          => $row['patient_name'] ?? null,
                    'testname_code'         => $row['testname_code'] ?? null,

                    'sample_handover_sign'  => $row['sample_handover_sign'] ?? null,
                    'sample_receiver_sign'  => $row['sample_receiver_sign'] ?? null,
                    'sample_handover_to_os' => $row['sample_handover_to_os'] ?? null,
                    'os_lab_receiver_name'  => $row['os_lab_receiver_name'] ?? null,

                    'destination_department' => $row['department'] ?? null,
                ];

                // 🔁 UPDATE
                if (!empty($row['id'])) {
                    SampleOutsourceRegister::where('id', $row['id'])->update($data);
                }
                // ➕ INSERT
                else {
                    SampleOutsourceRegister::create($data);
                }
            }

            // 🔥 INLINE SAVE → NO PAGE JUMP
            return back()->with(
                'success',
                'Sample Outsource Updated saved successfully'
            );
        }

        /**
         * =================================================
         * 🟢 NORMAL FORM SUBMIT (SINGLE ROW)
         * =================================================
         */
        if (
            empty($request->date) &&
            empty($request->bar_code) &&
            empty($request->patient_name)
        ) {
            return back();
        }

        SampleOutsourceRegister::create([
            'date'                  => $request->date,
            'location'              => $request->soLocation,
            'department'            => $request->soDepartment,
            'equipment_id'          => $request->soEquipmentId,

            'bar_code'              => $request->bar_code,
            'patient_name'          => $request->patient_name,
            'testname_code'         => $request->testname_code,

            'sample_handover_sign'  => $request->sample_handover_sign,
            'sample_receiver_sign'  => $request->sample_receiver_sign,
            'sample_handover_to_os' => $request->sample_handover_to_os,
            'os_lab_receiver_name'  => $request->os_lab_receiver_name,

            'destination_department' => $request->department,
        ]);

        return back()->with(
            'success',
            'Sample Outsource Register saved successfully'
        );
    }



    public function loadSampleOutsourceRegister(Request $request)
    {
        $query = SampleOutsourceRegister::query();

        // 📅 Date range
        $from = $request->from_date;
        $to   = $request->to_date ?: $request->from_date; // ⭐ KEY FIX

        if ($from) {
            $query->whereDate('date', '>=', $from);
        }

        if ($to) {
            $query->whereDate('date', '<=', $to);
        }


        // 📍 Location
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        // 🧪 Department
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        // 🧰 Equipment / TL Code
        if ($request->filled('equipment')) {
            $query->where('equipment_id', $request->equipment);
        }

        $data = $query
            ->orderBy('date', 'desc')
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
