<?php

namespace App\Http\Controllers\NewForms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DailyUrineQcForm;
use App\Models\CpManualCueForm;
use App\Models\CpManualCueEntry;
use App\Models\StoolExaminationRegister;
use App\Models\UrineExaminationRegister;

/**
 * CP FORMS CONTROLLER
 * Pattern same as BE / AS / CG
 */
class CPFormsController extends Controller
{
    /**
     * MAIN STORE ROUTER
     */
    public function store(Request $request)
    {
        $docNo = $request->doc_no;

        // Example: TDPL/CP/FOM-001 → FOM-001
        $formCode = last(explode('/', $docNo));

        switch ($formCode) {

            case 'FOM-001':
                return $this->storeDailyUrineQc($request);

            case 'REG-001':
                return $this->storeManualCue($request);

            case 'REG-002':
                return $this->submitStoolRegister($request);

            case 'REG-003':
                return $this->submitUrineRegister($request);


                // 🔜 add more CP forms here

            default:
                return back()->with('error', 'Unknown CP form');
        }
    }

    protected function storeDailyUrineQc(Request $request)
    {

        $request->validate([
            'month_year' => 'required|string|max:7',
        ]);

        /* ===============================
       CLEAN DAILY JSON
    =============================== */
        $dailyData = [];

        if (is_array($request->data)) {
            foreach ($request->data as $day => $row) {
                $cleanRow = array_filter($row, fn($v) => $v !== null && $v !== '');
                if (!empty($cleanRow)) {
                    $dailyData[$day] = $cleanRow;
                }
            }
        }

        /* ===============================
       PAYLOAD
    =============================== */
        $payload = [
            'month_year'      => $request->month_year,
            'lot_no'          => $request->lot_no,
            'expiry_date'     => $request->expiry_date,
            'level'           => $request->level,
            'instrument_name' => $request->instrument_name,
            'instrument_id'   => $request->instrument_id,
            'data'            => $dailyData ?: null,
        ];

        /* ===============================
       FIND EXISTING (MONTH UNIQUE)
    =============================== */
        if ($request->filled('urine_qc_form_id')) {

            // ✅ INLINE EDIT UPDATE (HIGHEST PRIORITY)
            DailyUrineQcForm::where('id', $request->urine_qc_form_id)
                ->update($payload);
        } else {

            // ✅ ONE RECORD PER MONTH
            DailyUrineQcForm::updateOrCreate(
                ['month_year' => $request->month_year],
                $payload
            );
        }

        return back()->with('success', 'Daily Urine QC Form saved successfully');
    }



    public function loadDailyUrineQc(Request $request)
    {
        // ❗ GLOBAL RULE – month mandatory
        if (!$request->filled('month_year')) {
            return response()->json(['data' => null]);
        }

        $form = DailyUrineQcForm::where('month_year', $request->month_year)
            ->when(
                $request->filled('instrument_id'),
                fn($q) => $q->where('instrument_id', $request->instrument_id)
            )
            ->first();

        return response()->json(['data' => $form]);
    }

    protected function storeManualCue(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();
        $savedIds = [];

        // Handle array-style rows (row_date[], row_sin_no[], etc.)
        if (is_array($request->row_date)) {
            $rowCount     = count($request->row_date);
            $rowIds       = $request->row_id ?? [];
            $rowSinNo     = $request->row_sin_no ?? [];
            $rowAnalyte   = $request->row_analyte ?? [];
            $rowResults   = $request->row_results ?? [];
            $rowDoneBy    = $request->row_done_by ?? [];
            $rowVerified  = $request->row_verified_by ?? [];
            $rowRemarks   = $request->row_remarks ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows
                if (empty($request->row_date[$i]) && empty($rowSinNo[$i]) && empty($rowAnalyte[$i])) {
                    continue;
                }

                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'cue_date'    => $request->row_date[$i] ?? null,
                    'sin_no'      => $rowSinNo[$i] ?? null,
                    'analyte'     => $rowAnalyte[$i] ?? null,
                    'results'     => $rowResults[$i] ?? null,
                    'done_by'     => $rowDoneBy[$i] ?? null,
                    'verified_by' => $rowVerified[$i] ?? null,
                    'remarks'     => $rowRemarks[$i] ?? null,
                ];

                if ($rowId) {
                    CpManualCueEntry::where('id', $rowId)->update($data);
                    $savedIds[] = $rowId;
                } else {
                    $newRecord = CpManualCueEntry::create($data);
                    $savedIds[] = $newRecord->id;
                }
            }
        }

        if ($isAjax) {
            $savedRecords = CpManualCueEntry::whereIn('id', $savedIds)
                ->orderBy('cue_date')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Manual Method CUE saved successfully',
                'data'    => $savedRecords,
            ]);
        }

        return back()->with('success', 'Manual Method CUE saved successfully');
    }

    public function loadManualCue(Request $request)
    {
        if (
            !$request->filled('from_date') &&
            !$request->filled('to_date')
        ) {
            return response()->json(['data' => []]);
        }

        $query = CpManualCueEntry::query();

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('cue_date', [$request->from_date, $request->to_date]);
        } elseif ($request->filled('from_date')) {
            $query->whereDate('cue_date', $request->from_date);
        } elseif ($request->filled('to_date')) {
            $query->whereDate('cue_date', $request->to_date);
        }

        return response()->json([
            'data' => $query->orderBy('cue_date')->get()
        ]);
    }


    public function storeStoolExaminationRegister(Request $request)
    {
        /* =====================================
       BUILD REGISTER ROWS (JSON)
       ===================================== */

        $rows = [];

        $count = count($request->sno ?? []);

        for ($i = 0; $i < $count; $i++) {

            $row = [
                'sno'                => $request->sno[$i] ?? null,
                'date'               => $request->date[$i] ?? null,
                'sin_no'             => $request->sin_no[$i] ?? null,
                'patient_name'       => $request->patient_name[$i] ?? null,
                'age_sex'            => $request->age_sex[$i] ?? null,
                'analyte_name'       => $request->analyte_name[$i] ?? null,
                'colour'             => $request->colour[$i] ?? null,
                'consistency'        => $request->consistency[$i] ?? null,
                'mucus'              => $request->mucus[$i] ?? null,
                'blood'              => $request->blood[$i] ?? null,
                'worms'              => $request->worms[$i] ?? null,
                'reducing_substance' => $request->reducing_substance[$i] ?? null,
                'reaction'           => $request->reaction[$i] ?? null,
                'pus_cells'          => $request->pus_cells[$i] ?? null,
                'epithelial_cells'   => $request->epithelial_cells[$i] ?? null,
                'rbc'                => $request->rbc[$i] ?? null,
                'macrophages'        => $request->macrophages[$i] ?? null,
                'fat_globulins'      => $request->fat_globulins[$i] ?? null,
                'starch_granules'    => $request->starch_granules[$i] ?? null,
                'ova'                => $request->ova[$i] ?? null,
                'cyst'               => $request->cyst[$i] ?? null,
                'larva'              => $request->larva[$i] ?? null,
                'undigested_food'    => $request->undigested_food[$i] ?? null,
                'occult_blood'       => $request->occult_blood[$i] ?? null,
                'others'             => $request->others[$i] ?? null,
                'done_by'            => $request->done_by[$i] ?? null,
                'verified_by'        => $request->verified_by[$i] ?? null,
                'remarks'            => $request->remarks[$i] ?? null,
            ];

            // ❌ REMOVE EMPTY ROWS (SAME AS PREVIOUS FORMS)
            if (array_filter($row)) {
                $rows[] = $row;
            }
        }

        /* =====================================
       FINAL PAYLOAD
       (filters from/to NOT saved)
       ===================================== */

        $payload = [
            'location' => $request->location,
            'rows'     => $rows ?: null,
        ];

        /* =====================================
       INLINE EDIT OR NEW SUBMIT
       ===================================== */

        if ($request->filled('stool_register_id')) {

            // ✅ INLINE UPDATE
            StoolExaminationRegister::where('id', $request->stool_register_id)
                ->update($payload);
        } else {

            // ✅ NEW INSERT
            StoolExaminationRegister::create($payload);
        }

        return back()->with('success', 'Stool Examination Result Register saved successfully');
    }

    public function submitStoolRegister(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();
        $savedIds = [];

        $rowCount = count($request->date ?? []);
        $rowIds   = $request->row_id ?? [];

        for ($i = 0; $i < $rowCount; $i++) {

            if (empty($request->date[$i])) {
                continue;
            }

            $rowId = $rowIds[$i] ?? null;

            $data = [
                'stool_date'         => $request->date[$i],
                'location'           => $request->location,
                'sno'                => $request->sno[$i] ?? null,
                'sin_no'             => $request->sin_no[$i] ?? null,
                'patient_name'       => $request->patient_name[$i] ?? null,
                'age_sex'            => $request->age_sex[$i] ?? null,
                'analyte_name'       => $request->analyte_name[$i] ?? null,
                'colour'             => $request->colour[$i] ?? null,
                'consistency'        => $request->consistency[$i] ?? null,
                'mucus'              => $request->mucus[$i] ?? null,
                'blood'              => $request->blood[$i] ?? null,
                'worms'              => $request->worms[$i] ?? null,
                'reducing_substance' => $request->reducing_substance[$i] ?? null,
                'reaction'           => $request->reaction[$i] ?? null,
                'pus_cells'          => $request->pus_cells[$i] ?? null,
                'epithelial_cells'   => $request->epithelial_cells[$i] ?? null,
                'rbc'                => $request->rbc[$i] ?? null,
                'macrophages'        => $request->macrophages[$i] ?? null,
                'fat_globulins'      => $request->fat_globulins[$i] ?? null,
                'starch_granules'    => $request->starch_granules[$i] ?? null,
                'ova'                => $request->ova[$i] ?? null,
                'cyst'               => $request->cyst[$i] ?? null,
                'larva'              => $request->larva[$i] ?? null,
                'undigested_food'    => $request->undigested_food[$i] ?? null,
                'occult_blood'       => $request->occult_blood[$i] ?? null,
                'others'             => $request->others[$i] ?? null,
                'done_by'            => $request->done_by[$i] ?? null,
                'verified_by'        => $request->verified_by[$i] ?? null,
                'remarks'            => $request->remarks[$i] ?? null,
            ];

            if ($rowId) {
                StoolExaminationRegister::where('id', $rowId)->update($data);
                $savedIds[] = $rowId;
            } else {
                $newRecord = StoolExaminationRegister::create($data);
                $savedIds[] = $newRecord->id;
            }
        }

        if ($isAjax) {
            $savedRecords = StoolExaminationRegister::whereIn('id', $savedIds)
                ->orderBy('stool_date')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Stool Examination Register Saved Successfully',
                'data'    => $savedRecords,
            ]);
        }

        return back()->with('success', 'Stool Examination Register Saved Successfully');
    }

    public function loadStoolRegister(Request $request)
    {
        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json(['data' => []]);
        }

        $query = StoolExaminationRegister::query();

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('stool_date', [
                $request->from_date,
                $request->to_date
            ]);
        } else {
            $query->whereDate(
                'stool_date',
                $request->from_date ?? $request->to_date
            );
        }

        return response()->json([
            'data' => $query->orderBy('stool_date')->get()
        ]);
    }

    public function submitUrineRegister(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();
        $savedIds = [];

        $rowCount = count($request->date ?? []);
        $rowIds   = $request->row_id ?? [];

        for ($i = 0; $i < $rowCount; $i++) {

            if (empty($request->date[$i])) {
                continue;
            }

            $rowId = $rowIds[$i] ?? null;

            $data = [
                'urine_date'        => $request->date[$i],
                'sno'               => $request->sno[$i] ?? null,
                'sin_no'            => $request->sin_no[$i] ?? null,
                'patient_name'      => $request->patient_name[$i] ?? null,
                'age_sex'           => $request->age_sex[$i] ?? null,
                'quantity'          => $request->quantity[$i] ?? null,
                'colour'            => $request->colour[$i] ?? null,
                'appearance'        => $request->appearance[$i] ?? null,
                'blood'             => $request->blood[$i] ?? null,
                'bilirubin'         => $request->bilirubin[$i] ?? null,
                'urobilinogen'      => $request->urobilinogen[$i] ?? null,
                'ketone'            => $request->ketone[$i] ?? null,
                'glucose'           => $request->glucose[$i] ?? null,
                'protein'           => $request->protein[$i] ?? null,
                'ph'                => $request->ph[$i] ?? null,
                'nitrites'          => $request->nitrites[$i] ?? null,
                'leucocytosis'      => $request->leucocytosis[$i] ?? null,
                'specific_gravity'  => $request->specific_gravity[$i] ?? null,
                'pus_cells'         => $request->pus_cells[$i] ?? null,
                'epithelial_cells'  => $request->epithelial_cells[$i] ?? null,
                'rbcs'              => $request->rbcs[$i] ?? null,
                'others'            => $request->others[$i] ?? null,
                'done_by'           => $request->done_by[$i] ?? null,
                'verified_by'       => $request->verified_by[$i] ?? null,
                'remarks'           => $request->remarks[$i] ?? null,
            ];

            if ($rowId) {
                UrineExaminationRegister::where('id', $rowId)->update($data);
                $savedIds[] = $rowId;
            } else {
                $newRecord = UrineExaminationRegister::create($data);
                $savedIds[] = $newRecord->id;
            }
        }

        if ($isAjax) {
            $savedRecords = UrineExaminationRegister::whereIn('id', $savedIds)
                ->orderBy('urine_date')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Urine Examination Register Saved Successfully',
                'data'    => $savedRecords,
            ]);
        }

        return back()->with('success', 'Urine Examination Register Saved Successfully');
    }


    public function loadUrineRegister(Request $request)
    {
        // ❗ SAME GLOBAL RULE
        if (
            !$request->filled('from_date') &&
            !$request->filled('to_date')
        ) {
            return response()->json(['data' => []]);
        }

        $query = UrineExaminationRegister::query();

        // ✅ FROM only
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('urine_date', $request->from_date);
        }

        // ✅ TO only
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('urine_date', $request->to_date);
        }

        // ✅ FROM – TO
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('urine_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        return response()->json([
            'data' => $query->orderBy('urine_date')->get()
        ]);
    }
}
