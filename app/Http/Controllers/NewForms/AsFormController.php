<?php

namespace App\Http\Controllers\NewForms;

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

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Sample Volume Check saved successfully',
            ]);
        }

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
        $isAjax = $request->ajax() || $request->wantsJson();
        $location   = $request->srLocation;
        $department = $request->srDepartment;
        $equipmentId = $request->srEquipmentId;
        $savedIds = [];

        // Handle array-style rows (row_date[], row_time[], etc.)
        if (is_array($request->row_date)) {
            $rowCount     = count($request->row_date);
            $rowIds       = $request->row_id ?? [];
            $rowTimes     = $request->row_time ?? [];
            $rowClientLoc = $request->row_client_location ?? [];
            $rowClientNm  = $request->row_client_name ?? [];
            $rowTlCode    = $request->row_tl_code ?? [];
            $rowBlood     = $request->row_blood_samples ?? [];
            $rowOther     = $request->row_other_samples ?? [];
            $rowCsrName   = $request->row_csr_name ?? [];
            $rowCsrSign   = $request->row_csr_sign ?? [];
            $rowTemp      = $request->row_sample_temp ?? [];
            $rowReceiver  = $request->row_receiver_name ?? [];
            $rowRemarks   = $request->row_remarks ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows
                if (empty($request->row_date[$i])) {
                    continue;
                }

                $rowDate = $request->row_date[$i];
                $rowId   = $rowIds[$i] ?? null;

                $data = [
                    'date'            => $rowDate,
                    'time'            => $rowTimes[$i] ?? null,
                    'location'        => $location,
                    'department'      => $department,
                    'equipment_id'    => $equipmentId,
                    'client_location' => $rowClientLoc[$i] ?? null,
                    'client_name'     => $rowClientNm[$i] ?? null,
                    'blood_samples'   => $rowBlood[$i] ?? null,
                    'other_samples'   => $rowOther[$i] ?? null,
                    'csr_name'        => $rowCsrName[$i] ?? null,
                    'csr_sign'        => $rowCsrSign[$i] ?? null,
                    'sample_temp'     => $rowTemp[$i] ?? null,
                    'receiver_name'   => $rowReceiver[$i] ?? null,
                    'remarks'         => $rowRemarks[$i] ?? null,
                    'tl_code'         => $rowTlCode[$i] ?? null,
                ];

                if ($rowId) {
                    SampleReceivingRegister::where('id', $rowId)->update($data);
                    $savedIds[] = $rowId;
                } else {
                    $newRecord = SampleReceivingRegister::create($data);
                    $savedIds[] = $newRecord->id;
                }
            }
        }

        // Return JSON for AJAX requests with saved records
        if ($isAjax) {
            $savedRecords = SampleReceivingRegister::whereIn('id', $savedIds)
                ->orderBy('date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Sample Receiving Register saved successfully',
                'data'    => $savedRecords,
            ]);
        }

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
        $isAjax = $request->ajax() || $request->wantsJson();
        $location   = $request->sdLocation;
        $department = $request->sdDepartment;
        $equipmentId = $request->sdEquipmentId;
        $savedIds = [];

        // Handle array-style rows (row_date[], row_barcode[], etc.)
        if (is_array($request->row_date)) {
            $rowCount              = count($request->row_date);
            $rowIds                = $request->row_id ?? [];
            $rowBarcodes           = $request->row_barcode ?? [];
            $rowSamples            = $request->row_samples ?? [];
            $rowDepartments        = $request->row_department ?? [];
            $rowTakenFromAccession = $request->row_taken_from_accession ?? [];
            $rowVerifiedBy         = $request->row_verified_by ?? [];
            $rowDeliveredToDept    = $request->row_delivered_to_dept ?? [];
            $rowReceivedAtDept     = $request->row_received_at_dept ?? [];
            $rowRemarks            = $request->row_remarks ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows
                if (empty($request->row_date[$i])) {
                    continue;
                }

                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'date'                   => $request->row_date[$i],
                    'barcode'                => $rowBarcodes[$i] ?? null,
                    'samples'                => $rowSamples[$i] ?? null,
                    'department'             => $rowDepartments[$i] ?? null,
                    'taken_from_accession'   => $rowTakenFromAccession[$i] ?? null,
                    'verified_by'            => $rowVerifiedBy[$i] ?? null,
                    'delivered_to_dept'      => $rowDeliveredToDept[$i] ?? null,
                    'received_at_dept'       => $rowReceivedAtDept[$i] ?? null,
                    'remarks'                => $rowRemarks[$i] ?? null,
                    'location'               => $location,
                    'equipment_id'           => $equipmentId,
                    'destination_department' => $department,
                ];

                if ($rowId) {
                    SampleDeliveryRegister::where('id', $rowId)->update($data);
                    $savedIds[] = $rowId;
                } else {
                    $newRecord = SampleDeliveryRegister::create($data);
                    $savedIds[] = $newRecord->id;
                }
            }
        }

        // Return JSON for AJAX requests with saved records
        if ($isAjax) {
            $savedRecords = SampleDeliveryRegister::whereIn('id', $savedIds)
                ->orderBy('date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Sample Delivery Register saved successfully',
                'data'    => $savedRecords,
            ]);
        }

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
        $isAjax = $request->ajax() || $request->wantsJson();
        $location   = $request->igLocation;
        $department = $request->igDepartment;
        $savedIds = [];

        // Handle array-style rows (row_date[], row_quantity[], etc.)
        if (is_array($request->row_date)) {
            $rowCount       = count($request->row_date);
            $rowIds          = $request->row_id ?? [];
            $rowQuantity     = $request->row_quantity ?? [];
            $rowHandedOverBy = $request->row_handed_over_by ?? [];
            $rowReceivedBy   = $request->row_received_by ?? [];
            $rowReturned     = $request->row_returned ?? [];
            $rowRemarks      = $request->row_remarks ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows
                if (empty($request->row_date[$i])) {
                    continue;
                }

                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'date'           => $request->row_date[$i],
                    'quantity'       => $rowQuantity[$i] ?? null,
                    'handed_over_by' => $rowHandedOverBy[$i] ?? null,
                    'received_by'    => $rowReceivedBy[$i] ?? null,
                    'returned'       => $rowReturned[$i] ?? null,
                    'remarks'        => $rowRemarks[$i] ?? null,
                    'location'       => $location,
                    'department'     => $department,
                ];

                if ($rowId) {
                    IceGelPackRegister::where('id', $rowId)->update($data);
                    $savedIds[] = $rowId;
                } else {
                    $newRecord = IceGelPackRegister::create($data);
                    $savedIds[] = $newRecord->id;
                }
            }
        }

        // Return JSON for AJAX requests with saved records
        if ($isAjax) {
            $savedRecords = IceGelPackRegister::whereIn('id', $savedIds)
                ->orderBy('date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Ice Gel Packs Register saved successfully',
                'data'    => $savedRecords,
            ]);
        }

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
        $isAjax = $request->ajax() || $request->wantsJson();
        $location    = $request->soLocation;
        $department  = $request->soDepartment;
        $equipmentId = $request->soEquipmentId;
        $savedIds = [];

        // Handle array-style rows (row_date[], row_bar_code[], etc.)
        if (is_array($request->row_date)) {
            $rowCount              = count($request->row_date);
            $rowIds                = $request->row_id ?? [];
            $rowBarCodes           = $request->row_bar_code ?? [];
            $rowPatientNames       = $request->row_patient_name ?? [];
            $rowDepartments        = $request->row_department ?? [];
            $rowTestnameCodes      = $request->row_testname_code ?? [];
            $rowHandoverSigns      = $request->row_sample_handover_sign ?? [];
            $rowReceiverSigns      = $request->row_sample_receiver_sign ?? [];
            $rowHandoverToOs       = $request->row_sample_handover_to_os ?? [];
            $rowOsLabReceiverNames = $request->row_os_lab_receiver_name ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows
                if (empty($request->row_date[$i])) {
                    continue;
                }

                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'date'                   => $request->row_date[$i],
                    'location'               => $location,
                    'department'             => $department,
                    'equipment_id'           => $equipmentId,
                    'bar_code'               => $rowBarCodes[$i] ?? null,
                    'patient_name'           => $rowPatientNames[$i] ?? null,
                    'testname_code'          => $rowTestnameCodes[$i] ?? null,
                    'sample_handover_sign'   => $rowHandoverSigns[$i] ?? null,
                    'sample_receiver_sign'   => $rowReceiverSigns[$i] ?? null,
                    'sample_handover_to_os'  => $rowHandoverToOs[$i] ?? null,
                    'os_lab_receiver_name'   => $rowOsLabReceiverNames[$i] ?? null,
                    'destination_department' => $rowDepartments[$i] ?? null,
                ];

                if ($rowId) {
                    SampleOutsourceRegister::where('id', $rowId)->update($data);
                    $savedIds[] = $rowId;
                } else {
                    $newRecord = SampleOutsourceRegister::create($data);
                    $savedIds[] = $newRecord->id;
                }
            }
        }

        // Return JSON for AJAX requests with saved records
        if ($isAjax) {
            $savedRecords = SampleOutsourceRegister::whereIn('id', $savedIds)
                ->orderBy('date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Sample Outsource Register saved successfully',
                'data'    => $savedRecords,
            ]);
        }

        return back()->with('success', 'Sample Outsource Register saved successfully');
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
