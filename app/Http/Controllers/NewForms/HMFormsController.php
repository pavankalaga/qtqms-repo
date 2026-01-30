<?php

namespace App\Http\Controllers\NewForms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoagulationMnptForm;
use App\Models\AboRhTypingQcForm;
use App\Models\TitrationAntibodyReagentForm;
use App\Models\AvidityAntibodyReagentForm;
use App\Models\BoneMarrowExaminationForm;
use App\Models\CoagulationRequisitionForm;
use App\Models\PtApttResultsRegister;
use App\Models\LeishmanStainQcRegister;
use App\Models\AboRhTypingResultRegister;
use App\Models\IctDctMalariaResultRegister;
use App\Models\EsrResultsRegister;
use App\Models\BodyFluidsExaminationResultRegister;

class HMFormsController extends Controller
{
    /**
     * Handle form submission - routes to appropriate handler based on doc_no
     */
    public function submit(Request $request)
    {
        $docNo = $request->input('doc_no');

        switch ($docNo) {
            case 'TDPL/HM/FOM-001':
                return $this->storeCoagulationMnptForm($request);
            case 'TDPL/HM/FOM-002':
                return $this->storeAboRhTypingQcForm($request);
            case 'TDPL/HM/FOM-003':
                return $this->storeTitrationAntibodyReagentForm($request);
            case 'TDPL/HM/FOM-004':
                return $this->storeAvidityAntibodyReagentForm($request);
            case 'TDPL/HM/FOM-005':
                return $this->storeBoneMarrowExaminationForm($request);
            case 'TDPL/HM/FOM-006':
                return $this->storeCoagulationRequisitionForm($request);
            case 'TDPL/HM/REG-001':
                return $this->storePtApttResultsRegister($request);
            case 'TDPL/HM/REG-002':
                return $this->storeLeishmanStainQcRegister($request);
            case 'TDPL/HM/REG-003':
                return $this->storeAboRhTypingResultRegister($request);
            case 'TDPL/HM/REG-004':
                return $this->storeIctDctMalariaResultRegister($request);
            case 'TDPL/HM/REG-005':
                return $this->storeEsrResultsRegister($request);
            case 'TDPL/HM/REG-006':
                return $this->storeBodyFluidsExaminationResultRegister($request);
            default:
                return back()->with('error', 'Unknown form type');
        }
    }

    /**
     * STORE Coagulation MNPT Form
     */
    protected function storeCoagulationMnptForm(Request $request)
    {
        $recordId = $request->input('record_id');

        // Collect rows data (20 rows with name, pt, aptt)
        $rowsData = [];
        $rows = $request->input('rows', []);
        foreach ($rows as $index => $row) {
            if (!empty($row['name']) || !empty($row['pt']) || !empty($row['aptt'])) {
                $rowsData[$index] = [
                    'name' => $row['name'] ?? null,
                    'pt' => $row['pt'] ?? null,
                    'aptt' => $row['aptt'] ?? null,
                ];
            }
        }

        $data = [
            'doc_no' => $request->doc_no,
            'location' => $request->location,
            'instrument_name' => $request->instrument_name,
            'instrument_id' => $request->instrument_id,
            'rows_data' => $rowsData,
            'geo_mean_pt' => $request->geo_mean_pt,
            'geo_mean_aptt' => $request->geo_mean_aptt,
            'arith_mean_pt' => $request->arith_mean_pt,
            'arith_mean_aptt' => $request->arith_mean_aptt,
            'sd_pt' => $request->sd_pt,
            'sd_aptt' => $request->sd_aptt,
            'mean2sd_pt' => $request->mean2sd_pt,
            'mean2sd_aptt' => $request->mean2sd_aptt,
            'mean_minus_2sd_pt' => $request->mean_minus_2sd_pt,
            'mean_minus_2sd_aptt' => $request->mean_minus_2sd_aptt,
            'cv_pt' => $request->cv_pt,
            'cv_aptt' => $request->cv_aptt,
            'pt_lot' => $request->pt_lot,
            'pt_expiry' => $request->pt_expiry ?: null,
            'pt_performed' => $request->pt_performed ?: null,
            'aptt_lot' => $request->aptt_lot,
            'aptt_expiry' => $request->aptt_expiry ?: null,
            'aptt_performed' => $request->aptt_performed ?: null,
            'performed_by' => $request->performed_by,
            'verified_by' => $request->verified_by,
        ];

        if ($recordId) {
            // UPDATE existing record
            $record = CoagulationMnptForm::find($recordId);
            if ($record) {
                $record->update(array_merge($data, ['updated_by' => auth()->id()]));
                $savedRecord = $record->fresh();
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Record not found'
                ], 404);
            }
        } else {
            // CREATE new record
            $savedRecord = CoagulationMnptForm::create(array_merge($data, ['created_by' => auth()->id()]));
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Coagulation MNPT Form saved successfully',
                'data' => $savedRecord
            ]);
        }

        return back()->with('success', 'Coagulation MNPT Form saved successfully');
    }

    /**
     * LOAD Coagulation MNPT Form data based on filters
     */
    public function loadCoagulationMnptForm(Request $request)
    {
        $query = CoagulationMnptForm::query();

        // Date filter on pt_performed
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('pt_performed', [
                $request->from_date,
                $request->to_date
            ]);
        } elseif ($request->filled('from_date')) {
            $query->whereDate('pt_performed', $request->from_date);
        } elseif ($request->filled('to_date')) {
            $query->whereDate('pt_performed', $request->to_date);
        }

        // Location filter
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        // Instrument Name filter
        if ($request->filled('instrument_name')) {
            $query->where('instrument_name', $request->instrument_name);
        }

        $records = $query->orderBy('pt_performed', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Get unique values for datalists
        $locations = CoagulationMnptForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        $instrumentNames = CoagulationMnptForm::whereNotNull('instrument_name')
            ->where('instrument_name', '!=', '')
            ->distinct()
            ->pluck('instrument_name')
            ->toArray();

        return response()->json([
            'success' => true,
            'data' => $records,
            'locations' => $locations,
            'instrument_names' => $instrumentNames
        ]);
    }

    /**
     * STORE ABO & Rh Typing QC Form - Multiple rows
     */
    protected function storeAboRhTypingQcForm(Request $request)
    {
        $savedIds = [];

        // Handle array-style rows
        if (is_array($request->check_date)) {
            $rowCount = count($request->check_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows (no check_date)
                if (empty($request->check_date[$i])) {
                    continue;
                }

                $checkDate = $request->check_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no' => $request->doc_no,
                    'check_date' => $checkDate,
                    // Anti-A
                    'anti_a_appearance' => $request->anti_a_appearance[$i] ?? null,
                    'anti_a_a' => $request->anti_a_a[$i] ?? null,
                    'anti_a_b' => $request->anti_a_b[$i] ?? null,
                    'anti_a_o' => $request->anti_a_o[$i] ?? null,
                    // Anti-B
                    'anti_b_appearance' => $request->anti_b_appearance[$i] ?? null,
                    'anti_b_a' => $request->anti_b_a[$i] ?? null,
                    'anti_b_b' => $request->anti_b_b[$i] ?? null,
                    'anti_b_o' => $request->anti_b_o[$i] ?? null,
                    // Anti-D IgM
                    'anti_d_igm_appearance' => $request->anti_d_igm_appearance[$i] ?? null,
                    'anti_d_igm_a' => $request->anti_d_igm_a[$i] ?? null,
                    'anti_d_igm_b' => $request->anti_d_igm_b[$i] ?? null,
                    'anti_d_igm_o' => $request->anti_d_igm_o[$i] ?? null,
                    // Anti-D IgG
                    'anti_d_igg_appearance' => $request->anti_d_igg_appearance[$i] ?? null,
                    'anti_d_igg_a' => $request->anti_d_igg_a[$i] ?? null,
                    'anti_d_igg_b' => $request->anti_d_igg_b[$i] ?? null,
                    'anti_d_igg_o' => $request->anti_d_igg_o[$i] ?? null,
                    // Anti-A1
                    'anti_a1_appearance' => $request->anti_a1_appearance[$i] ?? null,
                    'anti_a1_a' => $request->anti_a1_a[$i] ?? null,
                    'anti_a1_b' => $request->anti_a1_b[$i] ?? null,
                    'anti_a1_o' => $request->anti_a1_o[$i] ?? null,
                    // Anti-H
                    'anti_h_appearance' => $request->anti_h_appearance[$i] ?? null,
                    'anti_h_a' => $request->anti_h_a[$i] ?? null,
                    'anti_h_b' => $request->anti_h_b[$i] ?? null,
                    'anti_h_o' => $request->anti_h_o[$i] ?? null,
                    // Other fields
                    'done_by' => $request->done_by[$i] ?? null,
                    'verified_by' => $request->verified_by[$i] ?? null,
                    'remarks' => $request->remarks[$i] ?? null,
                ];

                if ($rowId) {
                    // UPDATE existing record
                    AboRhTypingQcForm::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    // Check for duplicate before creating
                    $existingRecord = AboRhTypingQcForm::where('check_date', $checkDate)->first();

                    if ($existingRecord) {
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                        $savedIds[] = $existingRecord->id;
                    } else {
                        $newRecord = AboRhTypingQcForm::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                        $savedIds[] = $newRecord->id;
                    }
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = AboRhTypingQcForm::whereIn('id', $savedIds)
                ->orderBy('check_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'ABO & Rh Typing QC Form saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'ABO & Rh Typing QC Form saved successfully');
    }

    /**
     * LOAD ABO & Rh Typing QC Form data based on filters
     */
    public function loadAboRhTypingQcForm(Request $request)
    {
        // At least one date filter required
        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => []
            ]);
        }

        $query = AboRhTypingQcForm::query();

        // FROM only - load records for that specific date
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('check_date', $request->from_date);
        }

        // TO only - load records for that specific date
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('check_date', $request->to_date);
        }

        // FROM and TO - load records in range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('check_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        $data = $query->orderBy('check_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data
        ]);
    }

    /**
     * STORE Titration Antibody Reagent Form - Multiple rows
     */
    protected function storeTitrationAntibodyReagentForm(Request $request)
    {
        $savedIds = [];

        // Handle array-style rows
        if (is_array($request->check_date)) {
            $rowCount = count($request->check_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows (no check_date)
                if (empty($request->check_date[$i])) {
                    continue;
                }

                $checkDate = $request->check_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no' => $request->doc_no,
                    'check_date' => $checkDate,
                    'antibody_reagent' => $request->antibody_reagent[$i] ?? null,
                    'company' => $request->company[$i] ?? null,
                    'lot_number' => $request->lot_number[$i] ?? null,
                    'expiry_date' => $request->expiry_date[$i] ?? null,
                    'time' => $request->time[$i] ?? null,
                    'performed_by' => $request->performed_by[$i] ?? null,
                    'reviewed_by' => $request->reviewed_by[$i] ?? null,
                    'remarks' => $request->remarks[$i] ?? null,
                ];

                if ($rowId) {
                    // UPDATE existing record
                    TitrationAntibodyReagentForm::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    // Check for duplicate before creating
                    $existingRecord = TitrationAntibodyReagentForm::where('check_date', $checkDate)->first();

                    if ($existingRecord) {
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                        $savedIds[] = $existingRecord->id;
                    } else {
                        $newRecord = TitrationAntibodyReagentForm::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                        $savedIds[] = $newRecord->id;
                    }
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = TitrationAntibodyReagentForm::whereIn('id', $savedIds)
                ->orderBy('check_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Titration Antibody Reagent Form saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Titration Antibody Reagent Form saved successfully');
    }

    /**
     * LOAD Titration Antibody Reagent Form data based on filters
     */
    public function loadTitrationAntibodyReagentForm(Request $request)
    {
        // At least one date filter required
        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => []
            ]);
        }

        $query = TitrationAntibodyReagentForm::query();

        // FROM only - load records for that specific date
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('check_date', $request->from_date);
        }

        // TO only - load records for that specific date
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('check_date', $request->to_date);
        }

        // FROM and TO - load records in range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('check_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        $data = $query->orderBy('check_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data
        ]);
    }

    /**
     * STORE Avidity Antibody Reagent Form - Multiple rows
     */
    protected function storeAvidityAntibodyReagentForm(Request $request)
    {
        $savedIds = [];

        // Handle array-style rows
        if (is_array($request->check_date)) {
            $rowCount = count($request->check_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows (no check_date)
                if (empty($request->check_date[$i])) {
                    continue;
                }

                $checkDate = $request->check_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no' => $request->doc_no,
                    'check_date' => $checkDate,
                    'antibody_reagent' => $request->antibody_reagent[$i] ?? null,
                    'company' => $request->company[$i] ?? null,
                    'lot_number' => $request->lot_number[$i] ?? null,
                    'expiry_date' => $request->expiry_date[$i] ?? null,
                    'time' => $request->time[$i] ?? null,
                    'performed_by' => $request->performed_by[$i] ?? null,
                    'reviewed_by' => $request->reviewed_by[$i] ?? null,
                    'remarks' => $request->remarks[$i] ?? null,
                ];

                if ($rowId) {
                    // UPDATE existing record
                    AvidityAntibodyReagentForm::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    // Check for duplicate before creating
                    $existingRecord = AvidityAntibodyReagentForm::where('check_date', $checkDate)->first();

                    if ($existingRecord) {
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                        $savedIds[] = $existingRecord->id;
                    } else {
                        $newRecord = AvidityAntibodyReagentForm::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                        $savedIds[] = $newRecord->id;
                    }
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = AvidityAntibodyReagentForm::whereIn('id', $savedIds)
                ->orderBy('check_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Avidity Antibody Reagent Form saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Avidity Antibody Reagent Form saved successfully');
    }

    /**
     * LOAD Avidity Antibody Reagent Form data based on filters
     */
    public function loadAvidityAntibodyReagentForm(Request $request)
    {
        // At least one date filter required
        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => []
            ]);
        }

        $query = AvidityAntibodyReagentForm::query();

        // FROM only - load records for that specific date
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('check_date', $request->from_date);
        }

        // TO only - load records for that specific date
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('check_date', $request->to_date);
        }

        // FROM and TO - load records in range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('check_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        $data = $query->orderBy('check_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data
        ]);
    }

    /**
     * STORE Bone Marrow Examination Form - Simple save (no filters)
     */
    protected function storeBoneMarrowExaminationForm(Request $request)
    {
        $data = [
            'doc_no' => $request->doc_no,
            'patient_name' => $request->patient_name,
            'lab_number' => $request->lab_number,
            'age_sex' => $request->age_sex,
            'exam_date' => $request->exam_date ?: null,
            'ref_doctor' => $request->ref_doctor,
            'time' => $request->time,
            'client_name' => $request->client_name,
            'mobile_no' => $request->mobile_no,
            'client_code' => $request->client_code,
            'clinical_history' => $request->clinical_history,
            'hemoglobin' => $request->hemoglobin,
            'rbc_count' => $request->rbc_count,
            'mcv' => $request->mcv,
            'rdw' => $request->rdw,
            'total_leukocyte_count' => $request->total_leukocyte_count,
            'differential_leukocyte_count' => $request->differential_leukocyte_count,
            'platelet_count' => $request->platelet_count,
            'peripheral_smear_findings' => $request->peripheral_smear_findings,
            'created_by' => auth()->id(),
        ];

        $savedRecord = BoneMarrowExaminationForm::create($data);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Bone Marrow Examination Form saved successfully',
                'data' => $savedRecord
            ]);
        }

        return back()->with('success', 'Bone Marrow Examination Form saved successfully');
    }

    /**
     * STORE Coagulation Requisition Form - Simple save (no filters)
     */
    protected function storeCoagulationRequisitionForm(Request $request)
    {
        $data = [
            'doc_no' => $request->doc_no,
            'lab_no' => $request->lab_no,
            'form_date' => $request->form_date ?: null,
            'specimen_type' => $request->specimen_type,
            'specimen_time' => $request->specimen_time,
            'patient_name' => $request->patient_name,
            'age' => $request->age,
            'sex' => $request->sex,
            'tel_patient' => $request->tel_patient,
            'tel_physician' => $request->tel_physician,
            // Clinical History
            'clinical_0' => $request->clinical_0,
            'clinical_1' => $request->clinical_1,
            'clinical_2' => $request->clinical_2,
            'clinical_3' => $request->clinical_3,
            'clinical_4' => $request->clinical_4,
            'clinical_5' => $request->clinical_5,
            'clinical_6' => $request->clinical_6,
            'last_transfusion_date' => $request->last_transfusion_date ?: null,
            'transfusion_type' => $request->transfusion_type,
            // Lab Investigation
            'lab_0' => $request->lab_0,
            'lab_0_value' => $request->lab_0_value,
            'lab_1' => $request->lab_1,
            'lab_1_value' => $request->lab_1_value,
            'liver_function' => $request->liver_function,
            'liver_function_note' => $request->liver_function_note,
            'others_specify' => $request->others_specify,
            // Medication
            'current_dose' => $request->current_dose,
            'dose_change_date' => $request->dose_change_date ?: null,
            'drug_0' => $request->drug_0,
            'drug_0_notes' => $request->drug_0_notes,
            'drug_1' => $request->drug_1,
            'drug_1_notes' => $request->drug_1_notes,
            'drug_2' => $request->drug_2,
            'drug_2_notes' => $request->drug_2_notes,
            'drug_3' => $request->drug_3,
            'drug_3_notes' => $request->drug_3_notes,
            // Heparin
            'heparin_0' => $request->heparin_0,
            'heparin_0_notes' => $request->heparin_0_notes,
            'heparin_1' => $request->heparin_1,
            'heparin_1_notes' => $request->heparin_1_notes,
            // Others
            'major_surgery' => $request->major_surgery,
            'probable_diagnosis' => $request->probable_diagnosis,
            'sample_collected_by' => $request->sample_collected_by,
            'client_name_code' => $request->client_name_code,
            'created_by' => auth()->id(),
        ];

        $savedRecord = CoagulationRequisitionForm::create($data);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Coagulation Requisition Form saved successfully',
                'data' => $savedRecord
            ]);
        }

        return back()->with('success', 'Coagulation Requisition Form saved successfully');
    }

    /**
     * STORE PT APTT Results Register - Multiple rows
     */
    protected function storePtApttResultsRegister(Request $request)
    {
        $savedIds = [];

        // Handle array-style rows
        if (is_array($request->check_date)) {
            $rowCount = count($request->check_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows (no check_date)
                if (empty($request->check_date[$i])) {
                    continue;
                }

                $checkDate = $request->check_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no' => $request->doc_no,
                    'check_date' => $checkDate,
                    'sin_no' => $request->sin_no[$i] ?? null,
                    'analyte_name' => $request->analyte_name[$i] ?? null,
                    'result' => $request->result[$i] ?? null,
                    'done_by' => $request->done_by[$i] ?? null,
                    'verified_by' => $request->verified_by[$i] ?? null,
                    'remarks' => $request->remarks[$i] ?? null,
                ];

                if ($rowId) {
                    // UPDATE existing record
                    PtApttResultsRegister::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    // CREATE new record
                    $newRecord = PtApttResultsRegister::create(array_merge($data, [
                        'created_by' => auth()->id(),
                    ]));
                    $savedIds[] = $newRecord->id;
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = PtApttResultsRegister::whereIn('id', $savedIds)
                ->orderBy('check_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'PT APTT Results Register saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'PT APTT Results Register saved successfully');
    }

    /**
     * LOAD PT APTT Results Register data based on filters
     */
    public function loadPtApttResultsRegister(Request $request)
    {
        // At least one date filter required
        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => []
            ]);
        }

        $query = PtApttResultsRegister::query();

        // FROM only - load records for that specific date
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('check_date', $request->from_date);
        }

        // TO only - load records for that specific date
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('check_date', $request->to_date);
        }

        // FROM and TO - load records in range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('check_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        $data = $query->orderBy('check_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data
        ]);
    }

    /**
     * STORE Leishman Stain QC Register - Multiple rows
     */
    protected function storeLeishmanStainQcRegister(Request $request)
    {
        $savedIds = [];

        // Handle array-style rows
        if (is_array($request->check_date)) {
            $rowCount = count($request->check_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows (no check_date)
                if (empty($request->check_date[$i])) {
                    continue;
                }

                $checkDate = $request->check_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no' => $request->doc_no,
                    'check_date' => $checkDate,
                    'buffer_ph' => $request->buffer_ph[$i] ?? null,
                    'sin_no' => $request->sin_no[$i] ?? null,
                    'smear_prepared_by' => $request->smear_prepared_by[$i] ?? null,
                    'shape' => $request->shape[$i] ?? null,
                    'thickness' => $request->thickness[$i] ?? null,
                    'length_of_smear' => $request->length_of_smear[$i] ?? null,
                    'distribution_of_cells' => $request->distribution_of_cells[$i] ?? null,
                    'uniform_stain' => $request->uniform_stain[$i] ?? null,
                    'deposit' => $request->deposit[$i] ?? null,
                    'rbc_cytoplasm' => $request->rbc_cytoplasm[$i] ?? null,
                    'wbc_cytoplasm' => $request->wbc_cytoplasm[$i] ?? null,
                    'eosinophils_granules' => $request->eosinophils_granules[$i] ?? null,
                    'overall_stain' => $request->overall_stain[$i] ?? null,
                    'verified_by' => $request->verified_by[$i] ?? null,
                    'approved_by_hod' => $request->approved_by_hod[$i] ?? null,
                    'remarks' => $request->remarks[$i] ?? null,
                ];

                if ($rowId) {
                    // UPDATE existing record
                    LeishmanStainQcRegister::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    // CREATE new record
                    $newRecord = LeishmanStainQcRegister::create(array_merge($data, [
                        'created_by' => auth()->id(),
                    ]));
                    $savedIds[] = $newRecord->id;
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = LeishmanStainQcRegister::whereIn('id', $savedIds)
                ->orderBy('check_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Leishman Stain QC Register saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Leishman Stain QC Register saved successfully');
    }

    /**
     * LOAD Leishman Stain QC Register data based on filters
     */
    public function loadLeishmanStainQcRegister(Request $request)
    {
        // At least one date filter required
        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => []
            ]);
        }

        $query = LeishmanStainQcRegister::query();

        // FROM only - load records for that specific date
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('check_date', $request->from_date);
        }

        // TO only - load records for that specific date
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('check_date', $request->to_date);
        }

        // FROM and TO - load records in range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('check_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        $data = $query->orderBy('check_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data
        ]);
    }

    /**
     * STORE ABO & Rh Typing Result Register - Multiple rows
     */
    protected function storeAboRhTypingResultRegister(Request $request)
    {
        $savedIds = [];

        // Handle array-style rows
        if (is_array($request->check_date)) {
            $rowCount = count($request->check_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows (no check_date)
                if (empty($request->check_date[$i])) {
                    continue;
                }

                $checkDate = $request->check_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no' => $request->doc_no,
                    'check_date' => $checkDate,
                    'check_time' => $request->check_time[$i] ?? null,
                    'sin_no' => $request->sin_no[$i] ?? null,
                    'patient_name' => $request->patient_name[$i] ?? null,
                    'age_sex' => $request->age_sex[$i] ?? null,
                    'pool_a_cells' => $request->pool_a_cells[$i] ?? null,
                    'pool_b_cells' => $request->pool_b_cells[$i] ?? null,
                    'pool_o_cells' => $request->pool_o_cells[$i] ?? null,
                    'anti_a' => $request->anti_a[$i] ?? null,
                    'anti_b' => $request->anti_b[$i] ?? null,
                    'anti_d' => $request->anti_d[$i] ?? null,
                    'result' => $request->result[$i] ?? null,
                    'test_done_by' => $request->test_done_by[$i] ?? null,
                    'test_verified_by' => $request->test_verified_by[$i] ?? null,
                    'approved_by' => $request->approved_by[$i] ?? null,
                ];

                if ($rowId) {
                    // UPDATE existing record
                    AboRhTypingResultRegister::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    // CREATE new record
                    $newRecord = AboRhTypingResultRegister::create(array_merge($data, [
                        'created_by' => auth()->id(),
                    ]));
                    $savedIds[] = $newRecord->id;
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = AboRhTypingResultRegister::whereIn('id', $savedIds)
                ->orderBy('check_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'ABO & Rh Typing Result Register saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'ABO & Rh Typing Result Register saved successfully');
    }

    /**
     * LOAD ABO & Rh Typing Result Register data based on filters
     */
    public function loadAboRhTypingResultRegister(Request $request)
    {
        // At least one date filter required
        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => []
            ]);
        }

        $query = AboRhTypingResultRegister::query();

        // FROM only - load records for that specific date
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('check_date', $request->from_date);
        }

        // TO only - load records for that specific date
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('check_date', $request->to_date);
        }

        // FROM and TO - load records in range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('check_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        $data = $query->orderBy('check_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data
        ]);
    }

    /**
     * STORE ICT DCT Malaria Result Register - Multiple rows
     */
    protected function storeIctDctMalariaResultRegister(Request $request)
    {
        $savedIds = [];

        // Handle array-style rows
        if (is_array($request->check_date)) {
            $rowCount = count($request->check_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows (no check_date)
                if (empty($request->check_date[$i])) {
                    continue;
                }

                $checkDate = $request->check_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no' => $request->doc_no,
                    'check_date' => $checkDate,
                    'sin_no' => $request->sin_no[$i] ?? null,
                    'patient_name' => $request->patient_name[$i] ?? null,
                    'age_sex' => $request->age_sex[$i] ?? null,
                    'analyte_name' => $request->analyte_name[$i] ?? null,
                    'result' => $request->result[$i] ?? null,
                    'done_by' => $request->done_by[$i] ?? null,
                    'verified_by' => $request->verified_by[$i] ?? null,
                    'remarks' => $request->remarks[$i] ?? null,
                ];

                if ($rowId) {
                    // UPDATE existing record
                    IctDctMalariaResultRegister::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    // CREATE new record
                    $newRecord = IctDctMalariaResultRegister::create(array_merge($data, [
                        'created_by' => auth()->id(),
                    ]));
                    $savedIds[] = $newRecord->id;
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = IctDctMalariaResultRegister::whereIn('id', $savedIds)
                ->orderBy('check_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'ICT DCT Malaria Result Register saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'ICT DCT Malaria Result Register saved successfully');
    }

    /**
     * LOAD ICT DCT Malaria Result Register data based on filters
     */
    public function loadIctDctMalariaResultRegister(Request $request)
    {
        // At least one date filter required
        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => []
            ]);
        }

        $query = IctDctMalariaResultRegister::query();

        // FROM only - load records for that specific date
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('check_date', $request->from_date);
        }

        // TO only - load records for that specific date
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('check_date', $request->to_date);
        }

        // FROM and TO - load records in range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('check_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        $data = $query->orderBy('check_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data
        ]);
    }

    /**
     * STORE ESR Results Register
     */
    private function storeEsrResultsRegister(Request $request)
    {
        $checkDates = $request->input('check_date', []);
        $sinNos = $request->input('sin_no', []);
        $esrStartTimes = $request->input('esr_start_time', []);
        $esrEndTimes = $request->input('esr_end_time', []);
        $esrResults = $request->input('esr_result', []);
        $doneBys = $request->input('done_by', []);
        $verifiedBys = $request->input('verified_by', []);
        $rowIds = $request->input('row_id', []);

        $savedRecords = [];

        for ($i = 0; $i < count($checkDates); $i++) {
            // Skip empty rows
            if (empty($checkDates[$i]) && empty($sinNos[$i])) {
                continue;
            }

            $data = [
                'doc_no' => 'TDPL/HM/REG-005',
                'check_date' => $checkDates[$i] ?? null,
                'sin_no' => $sinNos[$i] ?? null,
                'esr_start_time' => $esrStartTimes[$i] ?? null,
                'esr_end_time' => $esrEndTimes[$i] ?? null,
                'esr_result' => $esrResults[$i] ?? null,
                'done_by' => $doneBys[$i] ?? null,
                'verified_by' => $verifiedBys[$i] ?? null,
                'updated_by' => auth()->id(),
            ];

            if (!empty($rowIds[$i])) {
                $record = EsrResultsRegister::find($rowIds[$i]);
                if ($record) {
                    $record->update($data);
                    $savedRecords[] = $record->fresh();
                }
            } else {
                $data['created_by'] = auth()->id();
                $record = EsrResultsRegister::create($data);
                $savedRecords[] = $record;
            }
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'ESR Results Register saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'ESR Results Register saved successfully');
    }

    /**
     * LOAD ESR Results Register data based on filters
     */
    public function loadEsrResultsRegister(Request $request)
    {
        // At least one date filter required
        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => []
            ]);
        }

        $query = EsrResultsRegister::query();

        // FROM only - load records for that specific date
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('check_date', $request->from_date);
        }

        // TO only - load records for that specific date
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('check_date', $request->to_date);
        }

        // FROM and TO - load records in range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('check_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        $data = $query->orderBy('check_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data
        ]);
    }

    /**
     * STORE Body Fluids Examination Result Register - Multiple rows
     */
    protected function storeBodyFluidsExaminationResultRegister(Request $request)
    {
        $savedIds = [];

        // Handle array-style rows
        if (is_array($request->check_date)) {
            $rowCount = count($request->check_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows (no check_date)
                if (empty($request->check_date[$i])) {
                    continue;
                }

                $checkDate = $request->check_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no' => $request->doc_no,
                    'check_date' => $checkDate,
                    'sin_no' => $request->sin_no[$i] ?? null,
                    'analyte_name' => $request->analyte_name[$i] ?? null,
                    'done_by' => $request->done_by[$i] ?? null,
                    'verified_by' => $request->verified_by[$i] ?? null,
                    'remarks' => $request->remarks[$i] ?? null,
                ];

                if ($rowId) {
                    // UPDATE existing record
                    BodyFluidsExaminationResultRegister::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    // CREATE new record
                    $newRecord = BodyFluidsExaminationResultRegister::create(array_merge($data, [
                        'created_by' => auth()->id(),
                    ]));
                    $savedIds[] = $newRecord->id;
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = BodyFluidsExaminationResultRegister::whereIn('id', $savedIds)
                ->orderBy('check_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Body Fluids Examination Result Register saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Body Fluids Examination Result Register saved successfully');
    }

    /**
     * LOAD Body Fluids Examination Result Register data based on filters
     */
    public function loadBodyFluidsExaminationResultRegister(Request $request)
    {
        // At least one date filter required
        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => []
            ]);
        }

        $query = BodyFluidsExaminationResultRegister::query();

        // FROM only - load records for that specific date
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('check_date', $request->from_date);
        }

        // TO only - load records for that specific date
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('check_date', $request->to_date);
        }

        // FROM and TO - load records in range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('check_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        $data = $query->orderBy('check_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data
        ]);
    }
}
