<?php

namespace App\Http\Controllers\NewForms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QualityHandlingHeStainForm;
use App\Models\RecordHistoSampleDiscardForm;
use App\Models\IqcHistopathologyForm;
use App\Models\TissueProcessorReagentForm;
use App\Models\UsedReagentsDiscardForm;
use App\Models\FormalinPreparationForm;
use App\Models\FormalinTvocMonitoringForm;
use App\Models\HistopathologyRequisitionForm;
use App\Models\SlidesBlocksReturnForm;
use App\Models\HistopathologyWorkRegister;
use App\Models\HpClinicalCorrelationRegister;
use App\Models\SlidesBlocksReturnRegister;
use App\Models\SampleLabellingErrorsRegister;
use App\Models\DecalcificationRegister;
use App\Models\SlidesStorageRegister;
use App\Models\BlocksStorageRegister;
use App\Models\HpGrossingRegister;

class HPFormsController extends Controller
{
    /**
     * MAIN STORE ROUTER
     */
    public function store(Request $request)
    {
        $docNo = $request->doc_no;

        // Expected: TDPL/HP/FOM-001
        $parts = explode('/', $docNo);
        $formCode = $parts[2] ?? null; // FOM-001, FOM-002, etc.

        switch ($formCode) {
            case 'FOM-001':
                return $this->storeQualityHandlingHeStainForm($request);

            case 'FOM-002':
                return $this->storeRecordHistoSampleDiscardForm($request);

            case 'FOM-003':
                return $this->storeIqcHistopathologyForm($request);

            case 'FOM-004':
                return $this->storeTissueProcessorReagentForm($request);

            case 'FOM-005':
                return $this->storeUsedReagentsDiscardForm($request);

            case 'FOM-006':
                return $this->storeFormalinPreparationForm($request);

            case 'FOM-007':
                return $this->storeFormalinTvocMonitoringForm($request);

            case 'FOM-008':
                return $this->storeHistopathologyRequisitionForm($request);

            case 'FOM-009':
                return $this->storeSlidesBlocksReturnForm($request);

            case 'REG-001':
                return $this->storeHistopathologyWorkRegister($request);

            case 'REG-002':
                return $this->storeHpClinicalCorrelationRegister($request);

            case 'REG-003':
                return $this->storeSlidesBlocksReturnRegister($request);

            case 'REG-004':
                return $this->storeSampleLabellingErrorsRegister($request);

            case 'REG-005':
                return $this->storeDecalcificationRegister($request);

            case 'REG-006':
                return $this->storeSlidesStorageRegister($request);

            case 'REG-007':
                return $this->storeBlocksStorageRegister($request);

            case 'REG-008':
                return $this->storeHpGrossingRegister($request);

            default:
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Unknown HP form code: ' . $formCode
                    ]);
                }
                return back()->with('error', 'Unknown HP form code: ' . $formCode);
        }
    }

    /**
     * HP: Quality Handling of H&E Stain
     * TDPL/HP/FOM-001
     * Stores daily data as JSON (one record per month/location/department)
     */
    protected function storeQualityHandlingHeStainForm(Request $request)
    {
        $monthYear = $request->month_year;
        $location = $request->location;
        $department = $request->department;

        if (!$monthYear) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Month & Year is required'
                ]);
            }
            return back()->with('error', 'Month & Year is required');
        }

        // Collect all daily data fields
        $dailyData = [];
        foreach ($request->all() as $key => $value) {
            // Match patterns for row data
            if (preg_match('/^(xylene_1|xylene_2|xylene_3|alcohol_1a|alcohol_2a|alcohol_3a|hematoxylin|eosin|og6|alcohol_1b|alcohol_2b|ea36|alcohol_1c|alcohol_2c|sign)_\d+$/', $key)) {
                if ($value !== null && $value !== '') {
                    $dailyData[$key] = $value;
                }
            }
        }

        $payload = [
            'doc_no'      => $request->doc_no,
            'month_year'  => $monthYear,
            'location'    => $location,
            'department'  => $department,
            'daily_data'  => $dailyData ?: null,
        ];

        // Check if record exists for this month/location/department
        $existing = QualityHandlingHeStainForm::where('month_year', $monthYear)
            ->where('location', $location)
            ->where('department', $department)
            ->first();

        if ($existing) {
            // UPDATE existing record
            $existing->update(array_merge($payload, [
                'updated_by' => auth()->id(),
            ]));
        } else {
            // CREATE new record
            QualityHandlingHeStainForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Quality Handling of H&E Stain saved successfully'
            ]);
        }

        return back()->with('success', 'Quality Handling of H&E Stain saved successfully');
    }

    /**
     * LOAD Quality Handling of H&E Stain data based on filters
     */
    public function loadQualityHandlingHeStainForm(Request $request)
    {
        if (!$request->filled('month_year')) {
            return response()->json(['success' => false, 'data' => null]);
        }

        $query = QualityHandlingHeStainForm::where('month_year', $request->month_year);

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        $data = $query->first();

        // Get distinct values for datalists
        $locations = QualityHandlingHeStainForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        $departments = QualityHandlingHeStainForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        return response()->json([
            'success' => $data ? true : false,
            'data' => $data,
            'locations' => $locations,
            'departments' => $departments
        ]);
    }

    /**
     * HP: Record of Histo Sample Discard
     * TDPL/HP/FOM-002
     * Stores daily data as JSON (one record per month_year)
     */
    protected function storeRecordHistoSampleDiscardForm(Request $request)
    {
        $monthYear = $request->month_year;

        if (!$monthYear) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Month & Year is required'
                ]);
            }
            return back()->with('error', 'Month & Year is required');
        }

        // Collect all daily data fields
        $dailyData = [];
        foreach ($request->all() as $key => $value) {
            // Match patterns for row data
            if (preg_match('/^(date_time|histo_no|preserve_no|sample_count|discard_date|discarded_by|discard_sign_date|reviewed_by|review_sign_date|hod|hod_sign_date)_\d+$/', $key)) {
                if ($value !== null && $value !== '') {
                    $dailyData[$key] = $value;
                }
            }
        }

        $payload = [
            'doc_no'      => $request->doc_no,
            'month_year'  => $monthYear,
            'daily_data'  => $dailyData ?: null,
        ];

        // Check if record exists for this month
        $existing = RecordHistoSampleDiscardForm::where('month_year', $monthYear)
            ->first();

        if ($existing) {
            $existing->update(array_merge($payload, [
                'updated_by' => auth()->id(),
            ]));
        } else {
            RecordHistoSampleDiscardForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Record of Histo Sample Discard saved successfully'
            ]);
        }

        return back()->with('success', 'Record of Histo Sample Discard saved successfully');
    }

    /**
     * LOAD Record of Histo Sample Discard data based on month_year
     */
    public function loadRecordHistoSampleDiscardForm(Request $request)
    {
        if (!$request->filled('month_year')) {
            return response()->json(['success' => false, 'data' => null]);
        }

        $data = RecordHistoSampleDiscardForm::where('month_year', $request->month_year)
            ->first();

        return response()->json([
            'success' => $data ? true : false,
            'data' => $data
        ]);
    }

    /**
     * HP: IQC-Histopathology Form
     * TDPL/HP/FOM-003
     * Stores daily data as JSON (one record per month/location/department)
     */
    protected function storeIqcHistopathologyForm(Request $request)
    {
        $monthYear = $request->month_year;
        $location = $request->location;
        $department = $request->department;

        if (!$monthYear) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Month & Year is required'
                ]);
            }
            return back()->with('error', 'Month & Year is required');
        }

        // Collect all form data sections as daily_data
        $dailyData = [];
        $sections = [
            'hp_number', 'tissue_processing', 'microtomy',
            'hp_number_2', 'staining', 'mounting',
            'technician_signature', 'doctor_signature'
        ];
        $remarkFields = [
            'hp_number_remarks', 'hp_number_2_remarks',
            'technician_signature_remarks', 'doctor_signature_remarks'
        ];

        foreach ($sections as $section) {
            if ($request->has($section)) {
                $dailyData[$section] = $request->input($section);
            }
        }
        foreach ($remarkFields as $field) {
            if ($request->has($field)) {
                $dailyData[$field] = $request->input($field);
            }
        }

        $payload = [
            'doc_no'      => $request->doc_no,
            'month_year'  => $monthYear,
            'location'    => $location,
            'department'  => $department,
            'daily_data'  => $dailyData ?: null,
        ];

        // Check if record exists for this month/location/department
        $existing = IqcHistopathologyForm::where('month_year', $monthYear)
            ->where('location', $location)
            ->where('department', $department)
            ->first();

        if ($existing) {
            $existing->update(array_merge($payload, [
                'updated_by' => auth()->id(),
            ]));
        } else {
            IqcHistopathologyForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'IQC-Histopathology Form saved successfully'
            ]);
        }

        return back()->with('success', 'IQC-Histopathology Form saved successfully');
    }

    /**
     * LOAD IQC-Histopathology data based on filters
     */
    public function loadIqcHistopathologyForm(Request $request)
    {
        if (!$request->filled('month_year')) {
            return response()->json(['success' => false, 'data' => null]);
        }

        $query = IqcHistopathologyForm::where('month_year', $request->month_year);

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        $data = $query->first();

        // Get distinct values for datalists
        $locations = IqcHistopathologyForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        $departments = IqcHistopathologyForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        return response()->json([
            'success' => $data ? true : false,
            'data' => $data,
            'locations' => $locations,
            'departments' => $departments
        ]);
    }

    /**
     * HP: Tissue Processor Reagent Change Form
     * TDPL/HP/FOM-004
     * Stores each row as a separate record (same pattern as NiU-Transcription Check)
     */
    protected function storeTissueProcessorReagentForm(Request $request)
    {
        $department = $request->department;
        $location = $request->location;
        $savedIds = [];

        $reagentFields = [
            'formalin1','formalin2','processing_water',
            'alcohol70','alcohol80','alcohol90',
            'absolute1','absolute2','absolute3',
            'xylene1','xylene2','wax1','wax2',
            'cleaning_xylene','cleaning_alcohol'
        ];

        // Handle array-style rows
        if (is_array($request->row_date)) {
            $rowCount = count($request->row_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows (no date)
                if (empty($request->row_date[$i])) {
                    continue;
                }

                $rowDate = $request->row_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no'     => $request->doc_no,
                    'department' => $department,
                    'location'   => $location,
                    'row_date'   => $rowDate,
                ];

                foreach ($reagentFields as $field) {
                    $fieldArray = $request->input($field);
                    $data[$field] = $fieldArray[$i] ?? null;
                }

                if ($rowId) {
                    // UPDATE existing record
                    TissueProcessorReagentForm::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    // Check for duplicate (based on date, department, location)
                    $existingRecord = TissueProcessorReagentForm::where('row_date', $rowDate)
                        ->where('department', $department)
                        ->where('location', $location)
                        ->first();

                    if ($existingRecord) {
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                        $savedIds[] = $existingRecord->id;
                    } else {
                        $newRecord = TissueProcessorReagentForm::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                        $savedIds[] = $newRecord->id;
                    }
                }
            }
        }

        // Return JSON for AJAX requests with saved records
        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = TissueProcessorReagentForm::whereIn('id', $savedIds)
                ->orderBy('row_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Tissue Processor Reagent Change Form saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Tissue Processor Reagent Change Form saved successfully');
    }

    /**
     * LOAD Tissue Processor Reagent Change data based on filters
     * Returns MULTIPLE records for date range
     */
    public function loadTissueProcessorReagentForm(Request $request)
    {
        // Get distinct values for datalists
        $departments = TissueProcessorReagentForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = TissueProcessorReagentForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        // At least one date filter required
        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => [],
                'departments' => $departments,
                'locations' => $locations
            ]);
        }

        $query = TissueProcessorReagentForm::query();

        // FROM only
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('row_date', $request->from_date);
        }

        // TO only
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('row_date', $request->to_date);
        }

        // FROM and TO - range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('row_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $data = $query->orderBy('row_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * HP: Used Reagents Discard Form
     * TDPL/HP/FOM-005
     * Stores each row as a separate record
     */
    protected function storeUsedReagentsDiscardForm(Request $request)
    {
        $department = $request->department;
        $location = $request->location;
        $savedIds = [];

        $fields = [
            'reagent_name', 'quantity', 'handover_by',
            'received_by', 'agency_name', 'collection_datetime', 'hod_sign'
        ];

        if (is_array($request->row_date)) {
            $rowCount = count($request->row_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                if (empty($request->row_date[$i])) {
                    continue;
                }

                $rowDate = $request->row_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no'     => $request->doc_no,
                    'department' => $department,
                    'location'   => $location,
                    'row_date'   => $rowDate,
                ];

                foreach ($fields as $field) {
                    $fieldArray = $request->input($field);
                    $data[$field] = $fieldArray[$i] ?? null;
                }

                if ($rowId) {
                    UsedReagentsDiscardForm::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    $existingRecord = UsedReagentsDiscardForm::where('row_date', $rowDate)
                        ->where('reagent_name', $data['reagent_name'])
                        ->where('department', $department)
                        ->where('location', $location)
                        ->first();

                    if ($existingRecord) {
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                        $savedIds[] = $existingRecord->id;
                    } else {
                        $newRecord = UsedReagentsDiscardForm::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                        $savedIds[] = $newRecord->id;
                    }
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = UsedReagentsDiscardForm::whereIn('id', $savedIds)
                ->orderBy('row_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Used Reagents Discard Form saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Used Reagents Discard Form saved successfully');
    }

    /**
     * LOAD Used Reagents Discard data based on filters
     */
    public function loadUsedReagentsDiscardForm(Request $request)
    {
        $departments = UsedReagentsDiscardForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = UsedReagentsDiscardForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => [],
                'departments' => $departments,
                'locations' => $locations
            ]);
        }

        $query = UsedReagentsDiscardForm::query();

        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('row_date', $request->from_date);
        }

        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('row_date', $request->to_date);
        }

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('row_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $data = $query->orderBy('row_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * HP: Formalin Preparation Form
     * TDPL/HP/FOM-006
     * Stores each row as a separate record
     */
    protected function storeFormalinPreparationForm(Request $request)
    {
        $department = $request->department;
        $location = $request->location;
        $savedIds = [];

        $fields = ['ph', 'volume_prepared', 'prepared_by', 'verified_by', 'remarks', 'hod_signature'];

        if (is_array($request->row_date)) {
            $rowCount = count($request->row_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                if (empty($request->row_date[$i])) {
                    continue;
                }

                $rowDate = $request->row_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no'     => $request->doc_no,
                    'department' => $department,
                    'location'   => $location,
                    'row_date'   => $rowDate,
                ];

                foreach ($fields as $field) {
                    $fieldArray = $request->input($field);
                    $data[$field] = $fieldArray[$i] ?? null;
                }

                if ($rowId) {
                    FormalinPreparationForm::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    $existingRecord = FormalinPreparationForm::where('row_date', $rowDate)
                        ->where('department', $department)
                        ->where('location', $location)
                        ->first();

                    if ($existingRecord) {
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                        $savedIds[] = $existingRecord->id;
                    } else {
                        $newRecord = FormalinPreparationForm::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                        $savedIds[] = $newRecord->id;
                    }
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = FormalinPreparationForm::whereIn('id', $savedIds)
                ->orderBy('row_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Formalin Preparation Form saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Formalin Preparation Form saved successfully');
    }

    /**
     * LOAD Formalin Preparation data based on filters
     */
    public function loadFormalinPreparationForm(Request $request)
    {
        $departments = FormalinPreparationForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = FormalinPreparationForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => [],
                'departments' => $departments,
                'locations' => $locations
            ]);
        }

        $query = FormalinPreparationForm::query();

        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('row_date', $request->from_date);
        }

        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('row_date', $request->to_date);
        }

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('row_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $data = $query->orderBy('row_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * HP: Formalin & TVOC Monitoring Form
     * TDPL/HP/FOM-007
     * Stores daily data as JSON (one record per month/location/department)
     */
    protected function storeFormalinTvocMonitoringForm(Request $request)
    {
        $monthYear = $request->month_year;
        $location = $request->location;
        $department = $request->department;

        if (!$monthYear) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Month & Year is required'
                ]);
            }
            return back()->with('error', 'Month & Year is required');
        }

        // Collect all daily data fields
        $dailyData = [];
        foreach ($request->all() as $key => $value) {
            if (preg_match('/^(formalin_am|tvoc_am|sign_am|formalin_pm|tvoc_pm|sign_pm|remarks)_\d+$/', $key)) {
                if ($value !== null && $value !== '') {
                    $dailyData[$key] = $value;
                }
            }
        }

        $payload = [
            'doc_no'      => $request->doc_no,
            'month_year'  => $monthYear,
            'location'    => $location,
            'department'  => $department,
            'daily_data'  => $dailyData ?: null,
        ];

        $existing = FormalinTvocMonitoringForm::where('month_year', $monthYear)
            ->where('location', $location)
            ->where('department', $department)
            ->first();

        if ($existing) {
            $existing->update(array_merge($payload, [
                'updated_by' => auth()->id(),
            ]));
        } else {
            FormalinTvocMonitoringForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Formalin & TVOC Monitoring Form saved successfully'
            ]);
        }

        return back()->with('success', 'Formalin & TVOC Monitoring Form saved successfully');
    }

    /**
     * LOAD Formalin & TVOC Monitoring data based on filters
     */
    public function loadFormalinTvocMonitoringForm(Request $request)
    {
        if (!$request->filled('month_year')) {
            return response()->json(['success' => false, 'data' => null]);
        }

        $query = FormalinTvocMonitoringForm::where('month_year', $request->month_year);

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        $data = $query->first();

        $locations = FormalinTvocMonitoringForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        $departments = FormalinTvocMonitoringForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        return response()->json([
            'success' => $data ? true : false,
            'data' => $data,
            'locations' => $locations,
            'departments' => $departments
        ]);
    }

    /**
     * HP: Histopathology Requisition Form
     * TDPL/HP/FOM-008
     * Stores each submission as a new record (no filters/load)
     */
    protected function storeHistopathologyRequisitionForm(Request $request)
    {
        $data = [
            'doc_no'              => $request->doc_no,
            'sin_no'              => $request->sin_no,
            'patient_name'        => $request->name,
            'dob'                 => $request->dob ?: null,
            'sex'                 => $request->sex,
            'mobile'              => $request->mobile,
            'client_name'         => $request->client_name,
            'client_code'         => $request->client_code,
            'ref_doctor'          => $request->ref_doctor,
            'ref_date'            => $request->ref_date ?: null,
            'specimen_site'       => $request->specimen_site,
            'clinical_history'    => $request->clinical_history,
            'additional_data'     => $request->additional_data,
            'clinical_diagnosis'  => $request->clinical_diagnosis,
            'specimen_large'      => $request->has('specimen_large'),
            'specimen_medium'     => $request->has('specimen_medium'),
            'specimen_small'      => $request->has('specimen_small'),
            'specimen_misc'       => $request->specimen_misc,
            'ihc_markers'         => $request->ihc_markers,
            'special_stains'      => $request->special_stains,
            'fixation'            => $request->fixation,
            'type_selected'       => $request->input('type_selected', []),
            'test_code_small'     => $request->test_code_small,
            'test_code_medium'    => $request->test_code_medium,
            'test_code_large'     => $request->test_code_large,
            'test_code_complex'   => $request->test_code_complex,
            'small_other'         => $request->small_other,
            'medium_other'        => $request->medium_other,
            'large_other'         => $request->large_other,
            'complex_other'       => $request->complex_other,
            'created_by'          => auth()->id(),
        ];

        HistopathologyRequisitionForm::create($data);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Histopathology Requisition Form saved successfully'
            ]);
        }

        return back()->with('success', 'Histopathology Requisition Form saved successfully');
    }

    /**
     * HP: Slides & Blocks Return Form
     * TDPL/HP/FOM-009
     * Stores each submission as a new record (no filters/load)
     */
    protected function storeSlidesBlocksReturnForm(Request $request)
    {
        $data = [
            'doc_no'              => $request->doc_no,
            'date'                => $request->date,
            'place'               => $request->place,
            'patient_name'        => $request->patient_name,
            'old_barcode'         => $request->old_barcode,
            'new_barcode'         => $request->new_barcode,
            'client_code'         => $request->client_code,
            'department'          => $request->department,
            'slides_blocks'       => $request->slides_blocks,
            'employee_name'       => $request->employee_name,
            'employee_signature'  => $request->employee_signature,
            'receiver_name'       => $request->receiver_name,
            'receiver_signature'  => $request->receiver_signature,
            'id_proof'            => $request->id_proof,
            'mobile'              => $request->mobile,
            'created_by'          => auth()->id(),
        ];

        SlidesBlocksReturnForm::create($data);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Slides & Blocks Return Form saved successfully'
            ]);
        }

        return back()->with('success', 'Slides & Blocks Return Form saved successfully');
    }

    /**
     * HP: Histopathology Work Register
     * TDPL/HP/REG-001
     * Stores each row as a separate record (row-based pattern)
     */
    protected function storeHistopathologyWorkRegister(Request $request)
    {
        $department = $request->department;
        $location = $request->location;
        $savedIds = [];

        $fields = ['hp_no', 'patient_name', 'age_sex', 'sin_no', 'specimen', 'diagnosis', 'hod_sign'];

        if (is_array($request->row_date)) {
            $rowCount = count($request->row_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                if (empty($request->row_date[$i])) {
                    continue;
                }

                $rowDate = $request->row_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no'     => $request->doc_no,
                    'department' => $department,
                    'location'   => $location,
                    'row_date'   => $rowDate,
                ];

                foreach ($fields as $field) {
                    $fieldArray = $request->input($field);
                    $data[$field] = $fieldArray[$i] ?? null;
                }

                if ($rowId) {
                    HistopathologyWorkRegister::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    $existingRecord = HistopathologyWorkRegister::where('row_date', $rowDate)
                        ->where('hp_no', $data['hp_no'])
                        ->where('department', $department)
                        ->where('location', $location)
                        ->first();

                    if ($existingRecord) {
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                        $savedIds[] = $existingRecord->id;
                    } else {
                        $newRecord = HistopathologyWorkRegister::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                        $savedIds[] = $newRecord->id;
                    }
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = HistopathologyWorkRegister::whereIn('id', $savedIds)
                ->orderBy('row_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Histopathology Work Register saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Histopathology Work Register saved successfully');
    }

    /**
     * LOAD Histopathology Work Register data based on filters
     */
    public function loadHistopathologyWorkRegister(Request $request)
    {
        $departments = HistopathologyWorkRegister::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = HistopathologyWorkRegister::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => [],
                'departments' => $departments,
                'locations' => $locations
            ]);
        }

        $query = HistopathologyWorkRegister::query();

        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('row_date', $request->from_date);
        }

        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('row_date', $request->to_date);
        }

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('row_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $data = $query->orderBy('row_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * HP: Histopathology Clinical Correlation Register
     * TDPL/HP/REG-002
     * Stores each row as a separate record (row-based pattern)
     */
    protected function storeHpClinicalCorrelationRegister(Request $request)
    {
        $department = $request->department;
        $location = $request->location;
        $savedIds = [];

        $fields = ['sin_no', 'patient_name', 'age_sex', 'clinical_history', 'site', 'hp_impression', 'cyto_impression', 'correlation', 'remarks', 'hod_sign'];

        if (is_array($request->row_date)) {
            $rowCount = count($request->row_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                if (empty($request->row_date[$i])) {
                    continue;
                }

                $rowDate = $request->row_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no'     => $request->doc_no,
                    'department' => $department,
                    'location'   => $location,
                    'row_date'   => $rowDate,
                ];

                foreach ($fields as $field) {
                    $fieldArray = $request->input($field);
                    $data[$field] = $fieldArray[$i] ?? null;
                }

                if ($rowId) {
                    HpClinicalCorrelationRegister::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    $existingRecord = HpClinicalCorrelationRegister::where('row_date', $rowDate)
                        ->where('sin_no', $data['sin_no'])
                        ->where('department', $department)
                        ->where('location', $location)
                        ->first();

                    if ($existingRecord) {
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                        $savedIds[] = $existingRecord->id;
                    } else {
                        $newRecord = HpClinicalCorrelationRegister::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                        $savedIds[] = $newRecord->id;
                    }
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = HpClinicalCorrelationRegister::whereIn('id', $savedIds)
                ->orderBy('row_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Histopathology Clinical Correlation Register saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Histopathology Clinical Correlation Register saved successfully');
    }

    /**
     * LOAD Histopathology Clinical Correlation Register data based on filters
     */
    public function loadHpClinicalCorrelationRegister(Request $request)
    {
        $departments = HpClinicalCorrelationRegister::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = HpClinicalCorrelationRegister::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => [],
                'departments' => $departments,
                'locations' => $locations
            ]);
        }

        $query = HpClinicalCorrelationRegister::query();

        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('row_date', $request->from_date);
        }

        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('row_date', $request->to_date);
        }

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('row_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $data = $query->orderBy('row_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * HP: Slides and Blocks Return Register
     * TDPL/HP/REG-003
     * Stores each row as a separate record (row-based pattern)
     */
    protected function storeSlidesBlocksReturnRegister(Request $request)
    {
        $department = $request->department;
        $location = $request->location;
        $savedIds = [];

        $fields = ['sin_no', 'patient_name', 'age_sex', 'hp_details', 'handover_sign', 'received_by', 'remarks', 'hod_sign'];

        if (is_array($request->row_date)) {
            $rowCount = count($request->row_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                if (empty($request->row_date[$i])) {
                    continue;
                }

                $rowDate = $request->row_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no'     => $request->doc_no,
                    'department' => $department,
                    'location'   => $location,
                    'row_date'   => $rowDate,
                ];

                foreach ($fields as $field) {
                    $fieldArray = $request->input($field);
                    $data[$field] = $fieldArray[$i] ?? null;
                }

                if ($rowId) {
                    SlidesBlocksReturnRegister::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    $existingRecord = SlidesBlocksReturnRegister::where('row_date', $rowDate)
                        ->where('sin_no', $data['sin_no'])
                        ->where('department', $department)
                        ->where('location', $location)
                        ->first();

                    if ($existingRecord) {
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                        $savedIds[] = $existingRecord->id;
                    } else {
                        $newRecord = SlidesBlocksReturnRegister::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                        $savedIds[] = $newRecord->id;
                    }
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = SlidesBlocksReturnRegister::whereIn('id', $savedIds)
                ->orderBy('row_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Slides and Blocks Return Register saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Slides and Blocks Return Register saved successfully');
    }

    /**
     * LOAD Slides and Blocks Return Register data based on filters
     */
    public function loadSlidesBlocksReturnRegister(Request $request)
    {
        $departments = SlidesBlocksReturnRegister::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = SlidesBlocksReturnRegister::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => [],
                'departments' => $departments,
                'locations' => $locations
            ]);
        }

        $query = SlidesBlocksReturnRegister::query();

        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('row_date', $request->from_date);
        }

        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('row_date', $request->to_date);
        }

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('row_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $data = $query->orderBy('row_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * HP: Sample Labelling Errors Register
     * TDPL/HP/REG-004
     * Stores each row as a separate record (row-based pattern)
     */
    protected function storeSampleLabellingErrorsRegister(Request $request)
    {
        $department = $request->department;
        $location = $request->location;
        $savedIds = [];

        $fields = ['sin_no', 'label_error', 'error_by', 'corrective_action', 'status', 'sign'];

        if (is_array($request->row_date)) {
            $rowCount = count($request->row_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                if (empty($request->row_date[$i])) {
                    continue;
                }

                $rowDate = $request->row_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no'     => $request->doc_no,
                    'department' => $department,
                    'location'   => $location,
                    'row_date'   => $rowDate,
                ];

                foreach ($fields as $field) {
                    $fieldArray = $request->input($field);
                    $data[$field] = $fieldArray[$i] ?? null;
                }

                if ($rowId) {
                    SampleLabellingErrorsRegister::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    $existingRecord = SampleLabellingErrorsRegister::where('row_date', $rowDate)
                        ->where('sin_no', $data['sin_no'])
                        ->where('department', $department)
                        ->where('location', $location)
                        ->first();

                    if ($existingRecord) {
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                        $savedIds[] = $existingRecord->id;
                    } else {
                        $newRecord = SampleLabellingErrorsRegister::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                        $savedIds[] = $newRecord->id;
                    }
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = SampleLabellingErrorsRegister::whereIn('id', $savedIds)
                ->orderBy('row_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Sample Labelling Errors Register saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Sample Labelling Errors Register saved successfully');
    }

    /**
     * LOAD Sample Labelling Errors Register data based on filters
     */
    public function loadSampleLabellingErrorsRegister(Request $request)
    {
        $departments = SampleLabellingErrorsRegister::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = SampleLabellingErrorsRegister::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => [],
                'departments' => $departments,
                'locations' => $locations
            ]);
        }

        $query = SampleLabellingErrorsRegister::query();

        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('row_date', $request->from_date);
        }

        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('row_date', $request->to_date);
        }

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('row_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $data = $query->orderBy('row_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * HP: Decalcification Register
     * TDPL/HP/REG-005
     * Stores each row as a separate record (row-based pattern)
     */
    protected function storeDecalcificationRegister(Request $request)
    {
        $department = $request->department;
        $location = $request->location;
        $savedIds = [];

        $fields = ['sin', 'hp_no', 'patient_name', 'age_sex', 'site_of_biopsy', 'start_date', 'completed_date', 'reagent', 'remarks'];

        if (is_array($request->row_date)) {
            $rowCount = count($request->row_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                if (empty($request->row_date[$i])) {
                    continue;
                }

                $rowDate = $request->row_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no'     => $request->doc_no,
                    'department' => $department,
                    'location'   => $location,
                    'row_date'   => $rowDate,
                ];

                foreach ($fields as $field) {
                    $fieldArray = $request->input($field);
                    $val = $fieldArray[$i] ?? null;
                    $data[$field] = ($val === '' ? null : $val);
                }

                if ($rowId) {
                    DecalcificationRegister::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    $existingRecord = DecalcificationRegister::where('row_date', $rowDate)
                        ->where('sin', $data['sin'])
                        ->where('department', $department)
                        ->where('location', $location)
                        ->first();

                    if ($existingRecord) {
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                        $savedIds[] = $existingRecord->id;
                    } else {
                        $newRecord = DecalcificationRegister::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                        $savedIds[] = $newRecord->id;
                    }
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = DecalcificationRegister::whereIn('id', $savedIds)
                ->orderBy('row_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Decalcification Register saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Decalcification Register saved successfully');
    }

    /**
     * LOAD Decalcification Register data based on filters
     */
    public function loadDecalcificationRegister(Request $request)
    {
        $departments = DecalcificationRegister::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = DecalcificationRegister::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => [],
                'departments' => $departments,
                'locations' => $locations
            ]);
        }

        $query = DecalcificationRegister::query();

        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('row_date', $request->from_date);
        }

        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('row_date', $request->to_date);
        }

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('row_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $data = $query->orderBy('row_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * HP: Slides Storage Register
     * TDPL/HP/REG-006
     * Stores all rows as JSON in a single record per submission (no filters/load)
     */
    protected function storeSlidesStorageRegister(Request $request)
    {
        $rows = $request->input('rows', []);

        // Filter out empty rows (no cabinet_number)
        $filteredRows = [];
        foreach ($rows as $row) {
            if (!empty($row['cabinet_number'])) {
                $filteredRows[] = $row;
            }
        }

        if (empty($filteredRows)) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No data to save. Please fill at least one row.'
                ]);
            }
            return back()->with('error', 'No data to save.');
        }

        SlidesStorageRegister::create([
            'doc_no'     => $request->doc_no,
            'rows_data'  => $filteredRows,
            'created_by' => auth()->id(),
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Slides Storage Register saved successfully'
            ]);
        }

        return back()->with('success', 'Slides Storage Register saved successfully');
    }

    /**
     * HP: Blocks Storage Register
     * TDPL/HP/REG-007
     * Stores all rows as JSON in a single record per submission (no filters/load)
     */
    protected function storeBlocksStorageRegister(Request $request)
    {
        $rows = $request->input('rows', []);

        $filteredRows = [];
        foreach ($rows as $row) {
            if (!empty($row['cabinet_number'])) {
                $filteredRows[] = $row;
            }
        }

        if (empty($filteredRows)) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No data to save. Please fill at least one row.'
                ]);
            }
            return back()->with('error', 'No data to save.');
        }

        BlocksStorageRegister::create([
            'doc_no'     => $request->doc_no,
            'rows_data'  => $filteredRows,
            'created_by' => auth()->id(),
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Blocks Storage Register saved successfully'
            ]);
        }

        return back()->with('success', 'Blocks Storage Register saved successfully');
    }

    /**
     * HP: Histopathology Grossing Register
     * TDPL/HP/REG-008
     * Stores each row as a separate record (row-based pattern)
     */
    protected function storeHpGrossingRegister(Request $request)
    {
        $department = $request->department;
        $location = $request->location;
        $savedIds = [];

        $fields = ['hp_number', 'alphabets', 'doctor_name_date', 'technician_signature', 'hod_signature', 'remarks'];

        if (is_array($request->row_date)) {
            $rowCount = count($request->row_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                if (empty($request->row_date[$i])) {
                    continue;
                }

                $rowDate = $request->row_date[$i];
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no'     => $request->doc_no,
                    'department' => $department,
                    'location'   => $location,
                    'row_date'   => $rowDate,
                ];

                foreach ($fields as $field) {
                    $fieldArray = $request->input($field);
                    $data[$field] = $fieldArray[$i] ?? null;
                }

                if ($rowId) {
                    HpGrossingRegister::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    $existingRecord = HpGrossingRegister::where('row_date', $rowDate)
                        ->where('hp_number', $data['hp_number'])
                        ->where('department', $department)
                        ->where('location', $location)
                        ->first();

                    if ($existingRecord) {
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                        $savedIds[] = $existingRecord->id;
                    } else {
                        $newRecord = HpGrossingRegister::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                        $savedIds[] = $newRecord->id;
                    }
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = HpGrossingRegister::whereIn('id', $savedIds)
                ->orderBy('row_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Histopathology Grossing Register saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Histopathology Grossing Register saved successfully');
    }

    /**
     * LOAD Histopathology Grossing Register data based on filters
     */
    public function loadHpGrossingRegister(Request $request)
    {
        $departments = HpGrossingRegister::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = HpGrossingRegister::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => [],
                'departments' => $departments,
                'locations' => $locations
            ]);
        }

        $query = HpGrossingRegister::query();

        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('row_date', $request->from_date);
        }

        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('row_date', $request->to_date);
        }

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('row_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $data = $query->orderBy('row_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }
}
