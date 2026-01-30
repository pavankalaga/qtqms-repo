<?php

namespace App\Http\Controllers\NewForms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FirstAidKitMonitoringForm;
use App\Models\NeedleStickInjuryLog;
use App\Models\SampleRejectionForm;
use App\Models\AccidentReportingForm;
use App\Models\AnalyteCalibrationForm;
use App\Models\BiomedicalWasteDisposalForm;
use App\Models\PhysicianFeedbackForm;
use App\Models\CriticalCallOutForm;
use App\Models\EqasSampleProcessingForm;
use App\Models\DailyCleaningChecklistForm;
use App\Models\DailyCleanlinessLogForm;
use App\Models\DailyIqcDataMonitoringForm;
use App\Models\ApprovedReferralLabForm;
use App\Models\DistilledWaterPlantChecklistForm;
use App\Models\EquipmentStartupShutdownForm;
use App\Models\EyeWashMonitoringForm;
use App\Models\InterLaboratoryComparisonForm;
use App\Models\LaboratoryIncidentForm;
use App\Models\EmployeeSuggestionForm;
use App\Models\NewReagentLotVerificationForm;
use App\Models\NonConformityCorrectiveActionForm;
use App\Models\RefrigeratorTemperatureForm;
use App\Models\RepeatTestForm;
use App\Models\NiuTranscriptionCheckForm;
use App\Models\MeetingAgendaForm;
use App\Models\RoomTemperatureHumidityForm;
use App\Models\AmendmentReportMonitoringForm;
use App\Models\SodiumHypochloritePreparationForm;
use App\Models\DeepFreezerTemperatureMonitoringForm;
use App\Models\EqasCapaOutlierForm;
use App\Models\DailyIqcOutlierNcpaForm;
use App\Models\AuthorizedSoftwarePersonsForm;
use App\Models\AuthorizedInstrumentPersonnelForm;
use App\Models\MinutesOfMeetingForm;
use App\Models\TestRequisitionForm;
use App\Models\SplitSampleAnalysisForm;
use App\Models\SplitSampleAnalysisRow;
use App\Models\ReagentConsumablesConsumptionForm;
use App\Models\ShiftHandoverRegister;
use App\Models\DepartmentSampleStorageRegister;
use App\Models\SampleIntegrityRegister;
use App\Models\InterDepartmentSampleTransferRegister;

class GEFormsController extends Controller
{
    /**
     * MAIN STORE ROUTER
     */
    public function store(Request $request)
    {
        $docNo = $request->doc_no;

        // Expected: TDPL/GE/FOM-001
        $parts = explode('/', $docNo);
        $formCode = $parts[2] ?? null; // FOM-001, FOM-002, etc.

        switch ($formCode) {
            case 'FOM-001':
                return $this->storeFirstAidKitMonitoring($request);

            case 'FOM-002':
                return $this->storeNeedleStickInjuryLog($request);

            case 'FOM-003':
                return $this->storeSampleRejectionForm($request);

            case 'FOM-004':
                return $this->storeAccidentReportingForm($request);

            case 'FOM-005':
                return $this->storeAnalyteCalibrationForm($request);

            case 'FOM-006':
                return $this->storeBiomedicalWasteDisposalForm($request);

            case 'FOM-007':
                return $this->storePhysicianFeedbackForm($request);

            case 'FOM-008':
                return $this->storeCriticalCallOutForm($request);

            case 'FOM-009':
                return $this->storeEqasSampleProcessingForm($request);

            case 'FOM-010':
                return $this->storeDailyCleaningChecklistForm($request);

            case 'FOM-011':
                return $this->storeDailyCleanlinessLogForm($request);

            case 'FOM-012':
                return $this->storeDailyIqcDataMonitoringForm($request);

            case 'FOM-014':
                return $this->storeDistilledWaterPlantChecklistForm($request);

            case 'FOM-015':
                return $this->storeEquipmentStartupShutdownForm($request);

            case 'FOM-016':
                return $this->storeEyeWashMonitoringForm($request);

            case 'FOM-029':
                return $this->storeApprovedReferralLabForm($request);

            case 'FOM-017':
                return $this->storeInterLaboratoryComparisonForm($request);

            case 'FOM-018':
                return $this->storeLaboratoryIncidentForm($request);

            case 'FOM-019':
                return $this->storeEmployeeSuggestionForm($request);

            case 'FOM-020':
                return $this->storeNewReagentLotVerificationForm($request);

            case 'FOM-021':
                return $this->storeNonConformityCorrectiveActionForm($request);

            case 'FOM-022':
                return $this->storeRefrigeratorTemperatureForm($request);

            case 'FOM-023':
                return $this->storeRepeatTestForm($request);

            case 'FOM-025':
                return $this->storeNiuTranscriptionCheckForm($request);

            case 'FOM-027':
                return $this->storeMeetingAgendaForm($request);

            case 'FOM-030':
                return $this->storeRoomTemperatureHumidityForm($request);

            case 'FOM-031':
                return $this->storeAmendmentReportMonitoringForm($request);

            case 'FOM-033':
                return $this->storeSodiumHypochloritePreparationForm($request);

            case 'FOM-034':
                return $this->storeDeepFreezerTemperatureMonitoringForm($request);

            case 'FOM-035':
                return $this->storeEqasCapaOutlierForm($request);

            case 'FOM-036':
                return $this->storeDailyIqcOutlierNcpaForm($request);

            case 'FOM-037':
                return $this->storeAuthorizedSoftwarePersonsForm($request);

            case 'FOM-038':
                return $this->storeAuthorizedInstrumentPersonnelForm($request);

            case 'FOM-039':
                return $this->storeMinutesOfMeetingForm($request);

            case 'FOM-040':
                return $this->storeTestRequisitionForm($request);

            case 'FOM-044':
                return $this->storeSplitSampleAnalysisForm($request);

            case 'FOM-047':
                return $this->storeReagentConsumablesConsumptionForm($request);

            case 'REG-001':
                return $this->storeShiftHandoverRegister($request);

            case 'REG-002':
                return $this->storeDepartmentSampleStorageRegister($request);

            case 'REG-003':
                return $this->storeSampleIntegrityRegister($request);

            case 'REG-005':
                return $this->storeInterDepartmentSampleTransferRegister($request);

            default:
                return back()->with('error', 'Unknown GE form');
        }
    }

    /**
     * GE: First Aid Kit Monitoring Form
     * TDPL/GE/FOM-001
     * Supports AJAX inline edit (returns JSON)
     */
    protected function storeFirstAidKitMonitoring(Request $request)
    {
        $payload = [
            'doc_no'            => $request->doc_no,
            'month_year'        => $request->month_year,
            'location'          => $request->location,
            'department'        => $request->department,
            'items_available'   => $request->items_available,
            'expiry_date_1'     => $request->expiry_date_1,
            'replaced_item'     => $request->replaced_item,
            'quantity_replaced' => $request->quantity_replaced,
            'expiry_date_2'     => $request->expiry_date_2,
            'replaced_on'       => $request->replaced_on,
            'replaced_by'       => $request->replaced_by,
            'remarks'           => $request->remarks,
            'verified_by'       => $request->verified_by,
        ];

        $record = null;

        if ($request->filled('first_aid_kit_monitoring_form_id')) {
            // UPDATE existing record
            FirstAidKitMonitoringForm::where('id', $request->first_aid_kit_monitoring_form_id)
                ->update(array_merge($payload, [
                    'updated_by' => auth()->id(),
                ]));
            $record = FirstAidKitMonitoringForm::find($request->first_aid_kit_monitoring_form_id);
        } else {
            // CREATE new record
            $record = FirstAidKitMonitoringForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'First Aid Kit Monitoring Form saved successfully',
                'data' => $record
            ]);
        }

        return back()->with('success', 'First Aid Kit Monitoring Form saved successfully');
    }

    /**
     * LOAD data based on filters (month_year, location, department)
     * Called via AJAX onchange
     */
    public function loadFirstAidKitMonitoring(Request $request)
    {
        $query = FirstAidKitMonitoringForm::query();

        if ($request->filled('month_year')) {
            $query->where('month_year', $request->month_year);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        $data = $query->latest()->first();

        if ($data) {
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No data found for the selected filters'
        ]);
    }

    /**
     * Get distinct locations and departments for datalist dropdowns
     */
    public function getFilterOptions()
    {
        $locations = FirstAidKitMonitoringForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        $departments = FirstAidKitMonitoringForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        return response()->json([
            'locations' => $locations,
            'departments' => $departments
        ]);
    }

    /**
     * GE: Needle Stick Injury Log Form
     * TDPL/GE/FOM-002
     * Supports AJAX inline edit (returns JSON)
     */
    protected function storeNeedleStickInjuryLog(Request $request)
    {
        $payload = [
            'doc_no'              => $request->doc_no,
            'injured_person'      => $request->injured_person,
            'exposure_datetime'   => $request->exposure_datetime,
            'sequence_of_events'  => $request->sequence_of_events,
            'details_of_exposure' => $request->details_of_exposure,
            'counseling_details'  => $request->counseling_details,
            'source_person_info'  => $request->source_person_info,
            'preventive_steps'    => $request->preventive_steps,
            'recorded_by'         => $request->recorded_by,
            'recorded_date'       => $request->recorded_date,
        ];

        $record = null;

        if ($request->filled('needle_stick_injury_log_id')) {
            // UPDATE existing record
            NeedleStickInjuryLog::where('id', $request->needle_stick_injury_log_id)
                ->update(array_merge($payload, [
                    'updated_by' => auth()->id(),
                ]));
            $record = NeedleStickInjuryLog::find($request->needle_stick_injury_log_id);
        } else {
            // CREATE new record
            $record = NeedleStickInjuryLog::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Needle Stick Injury Log saved successfully',
                'data' => $record
            ]);
        }

        return back()->with('success', 'Needle Stick Injury Log saved successfully');
    }

    /**
     * GE: Sample Rejection Form
     * TDPL/GE/FOM-003
     * Supports AJAX inline edit (returns JSON)
     */
    protected function storeSampleRejectionForm(Request $request)
    {
        $payload = [
            'doc_no'              => $request->doc_no,
            'month_year'          => $request->month_year,
            'location'            => $request->location,
            'department'          => $request->department,
            'date_time'           => $request->date_time,
            'patient_barcode'     => $request->patient_barcode,
            'parameter'           => $request->parameter,
            'collected_by'        => $request->collected_by,
            'sample_type'         => $request->sample_type,
            'reason_rejection'    => $request->reason_rejection,
            'informed_by_name'    => $request->informed_by_name,
            'informed_by_sign'    => $request->informed_by_sign,
            'informed_to_csd'     => $request->informed_to_csd,
            'fresh_sample_yes_no' => $request->fresh_sample_yes_no,
            'new_barcode'         => $request->new_barcode,
        ];

        $record = null;

        if ($request->filled('sample_rejection_form_id')) {
            // UPDATE existing record
            SampleRejectionForm::where('id', $request->sample_rejection_form_id)
                ->update(array_merge($payload, [
                    'updated_by' => auth()->id(),
                ]));
            $record = SampleRejectionForm::find($request->sample_rejection_form_id);
        } else {
            // CREATE new record
            $record = SampleRejectionForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Sample Rejection Form saved successfully',
                'data' => $record
            ]);
        }

        return back()->with('success', 'Sample Rejection Form saved successfully');
    }

    /**
     * LOAD Sample Rejection Form data based on filters
     * Called via AJAX onchange
     */
    public function loadSampleRejectionForm(Request $request)
    {
        $query = SampleRejectionForm::query();

        if ($request->filled('month_year')) {
            $query->where('month_year', $request->month_year);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        $data = $query->latest()->first();

        if ($data) {
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No data found for the selected filters'
        ]);
    }

    /**
     * GE: Accident Reporting Form
     * TDPL/GE/FOM-004
     * Handles multiple rows with array-style inputs
     * Note: from_date/to_date are filter-only (not saved to DB)
     */
    protected function storeAccidentReportingForm(Request $request)
    {
        $rowCount = count($request->date_time ?? []);
        $location = $request->location;

        for ($i = 0; $i < $rowCount; $i++) {

            // Skip empty rows (no date_time)
            if (empty($request->date_time[$i])) {
                continue;
            }

            $data = [
                'doc_no'              => $request->doc_no,
                'location'            => $location,
                'date_time'           => $request->date_time[$i],
                'person_involved'     => $request->person_involved[$i] ?? null,
                'injuries_sustained'  => $request->injuries_sustained[$i] ?? null,
                'emergency_first_aid' => $request->emergency_first_aid[$i] ?? null,
                'first_aid_by'        => $request->first_aid_by[$i] ?? null,
                'follow_up_action'    => $request->follow_up_action[$i] ?? null,
                'preventive_action'   => $request->preventive_action[$i] ?? null,
            ];

            $rowId = $request->row_id[$i] ?? null;

            if ($rowId) {
                // UPDATE existing record
                AccidentReportingForm::where('id', $rowId)->update(array_merge($data, [
                    'updated_by' => auth()->id(),
                ]));
            } else {
                // CREATE new record
                AccidentReportingForm::create(array_merge($data, [
                    'created_by' => auth()->id(),
                ]));
            }
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Accident Reporting Form saved successfully'
            ]);
        }

        return back()->with('success', 'Accident Reporting Form saved successfully');
    }

    /**
     * LOAD Accident Reporting Form data based on filters
     * Returns MULTIPLE records for date range
     * Filters: from_date, to_date (date range on date_time), location
     */
    public function loadAccidentReportingForm(Request $request)
    {
        // At least one date filter required
        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json(['success' => false, 'data' => []]);
        }

        $query = AccidentReportingForm::query();

        // FROM only - load records for that specific date
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('date_time', $request->from_date);
        }

        // TO only - load records for that specific date
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('date_time', $request->to_date);
        }

        // FROM and TO - load records in range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('date_time', [
                $request->from_date . ' 00:00:00',
                $request->to_date . ' 23:59:59'
            ]);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        // Return multiple records ordered by date_time
        $data = $query->orderBy('date_time', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data
        ]);
    }

    /**
     * DELETE Accident Reporting Form record
     */
    public function deleteAccidentReportingForm($id)
    {
        $record = AccidentReportingForm::find($id);

        if ($record) {
            $record->delete();
            return response()->json([
                'success' => true,
                'message' => 'Record deleted successfully'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Record not found'
        ]);
    }

    /**
     * GE: Analyte Calibration Form
     * TDPL/GE/FOM-005
     * Handles multiple rows with array-style inputs
     */
    protected function storeAnalyteCalibrationForm(Request $request)
    {
        $rowCount = count($request->calibration_date ?? []);
        $location = $request->location;
        $department = $request->department;

        for ($i = 0; $i < $rowCount; $i++) {

            // Skip empty rows (no calibration_date)
            if (empty($request->calibration_date[$i])) {
                continue;
            }

            $data = [
                'doc_no'           => $request->doc_no,
                'location'         => $location,
                'department'       => $department,
                'calibration_date' => $request->calibration_date[$i],
                'parameters'       => $request->parameters[$i] ?? null,
                'calibrator_used'  => $request->calibrator_used[$i] ?? null,
                'lot_no'           => $request->lot_no[$i] ?? null,
                'level1'           => $request->level1[$i] ?? null,
                'level1_status'    => $request->level1_status[$i] ?? null,
                'level2'           => $request->level2[$i] ?? null,
                'level2_status'    => $request->level2_status[$i] ?? null,
                'level3'           => $request->level3[$i] ?? null,
                'level3_status'    => $request->level3_status[$i] ?? null,
                'lab_staff_sign'   => $request->lab_staff_sign[$i] ?? null,
                'supervisor_sign'  => $request->supervisor_sign[$i] ?? null,
            ];

            $rowId = $request->row_id[$i] ?? null;

            if ($rowId) {
                // UPDATE existing record
                AnalyteCalibrationForm::where('id', $rowId)->update(array_merge($data, [
                    'updated_by' => auth()->id(),
                ]));
            } else {
                // CREATE new record
                AnalyteCalibrationForm::create(array_merge($data, [
                    'created_by' => auth()->id(),
                ]));
            }
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Analyte Calibration Form saved successfully'
            ]);
        }

        return back()->with('success', 'Analyte Calibration Form saved successfully');
    }

    /**
     * LOAD Analyte Calibration Form data based on filters
     * Returns MULTIPLE records for date range
     */
    public function loadAnalyteCalibrationForm(Request $request)
    {
        // At least one date filter required
        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json(['success' => false, 'data' => []]);
        }

        $query = AnalyteCalibrationForm::query();

        // FROM only - load records for that specific date
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('calibration_date', $request->from_date);
        }

        // TO only - load records for that specific date
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('calibration_date', $request->to_date);
        }

        // FROM and TO - load records in range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('calibration_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        // Return multiple records ordered by calibration_date
        $data = $query->orderBy('calibration_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data
        ]);
    }

    /**
     * GE: Biomedical Waste Disposal Form
     * TDPL/GE/FOM-006
     * Stores daily data as JSON (one record per month)
     */
    protected function storeBiomedicalWasteDisposalForm(Request $request)
    {
        $monthYear = $request->month_year;
        $agencyName = $request->agency_name;

        if (!$monthYear) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Month & Year is required'
                ]);
            }
            return back()->with('error', 'Month & Year is required');
        }

        // Build daily data from rows
        $dailyData = [];
        if (is_array($request->rows)) {
            foreach ($request->rows as $day => $row) {
                $cleanRow = array_filter($row, fn($v) => $v !== null && $v !== '');
                if (!empty($cleanRow)) {
                    $dailyData[$day] = $cleanRow;
                }
            }
        }

        $payload = [
            'doc_no'      => $request->doc_no,
            'month_year'  => $monthYear,
            'agency_name' => $agencyName,
            'daily_data'  => $dailyData ?: null,
        ];

        // Check if record exists for this month/agency
        $existing = BiomedicalWasteDisposalForm::where('month_year', $monthYear)
            ->where('agency_name', $agencyName)
            ->first();

        if ($existing) {
            // UPDATE existing record
            $existing->update(array_merge($payload, [
                'updated_by' => auth()->id(),
            ]));
        } else {
            // CREATE new record
            BiomedicalWasteDisposalForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Biomedical Waste Disposal Form saved successfully'
            ]);
        }

        return back()->with('success', 'Biomedical Waste Disposal Form saved successfully');
    }

    /**
     * LOAD Biomedical Waste Disposal Form data based on month_year filter
     */
    public function loadBiomedicalWasteDisposalForm(Request $request)
    {
        if (!$request->filled('month_year')) {
            return response()->json(['success' => false, 'data' => null]);
        }

        $query = BiomedicalWasteDisposalForm::where('month_year', $request->month_year);

        if ($request->filled('agency_name')) {
            $query->where('agency_name', $request->agency_name);
        }

        $data = $query->first();

        return response()->json([
            'success' => $data ? true : false,
            'data' => $data
        ]);
    }

    /**
     * GE: Physician Feedback Form
     * TDPL/GE/FOM-007
     * Stores ratings as JSON
     */
    protected function storePhysicianFeedbackForm(Request $request)
    {
        $monthYear = $request->month_year;
        $clientCode = $request->client_code;

        if (!$monthYear) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Month & Year is required'
                ]);
            }
            return back()->with('error', 'Month & Year is required');
        }

        // Build ratings from radio buttons
        $ratings = [];
        if (is_array($request->rating)) {
            foreach ($request->rating as $index => $value) {
                if ($value !== null && $value !== '') {
                    $ratings[$index] = $value;
                }
            }
        }

        $payload = [
            'doc_no'           => $request->doc_no,
            'month_year'       => $monthYear,
            'client_code'      => $clientCode,
            'ratings'          => $ratings ?: null,
            'comments'         => $request->comments,
            'doctor_name'      => $request->doctor_name,
            'doctor_signature' => $request->doctor_signature,
        ];

        // Check if record exists for this month/client
        $existing = PhysicianFeedbackForm::where('month_year', $monthYear)
            ->where('client_code', $clientCode)
            ->first();

        if ($existing) {
            // UPDATE existing record
            $existing->update(array_merge($payload, [
                'updated_by' => auth()->id(),
            ]));
        } else {
            // CREATE new record
            PhysicianFeedbackForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Physician Feedback Form saved successfully'
            ]);
        }

        return back()->with('success', 'Physician Feedback Form saved successfully');
    }

    /**
     * LOAD Physician Feedback Form data based on month_year filter
     */
    public function loadPhysicianFeedbackForm(Request $request)
    {
        if (!$request->filled('month_year')) {
            return response()->json(['success' => false, 'data' => null]);
        }

        $query = PhysicianFeedbackForm::where('month_year', $request->month_year);

        if ($request->filled('client_code')) {
            $query->where('client_code', $request->client_code);
        }

        $data = $query->first();

        return response()->json([
            'success' => $data ? true : false,
            'data' => $data
        ]);
    }

    /**
     * GE: Critical Call-Out Form
     * TDPL/GE/FOM-008
     * Handles multiple rows with array-style inputs
     */
    protected function storeCriticalCallOutForm(Request $request)
    {
        $rowCount = count($request->call_date ?? []);

        for ($i = 0; $i < $rowCount; $i++) {

            // Skip empty rows (no call_date)
            if (empty($request->call_date[$i])) {
                continue;
            }

            $data = [
                'doc_no'           => $request->doc_no,
                'call_date'        => $request->call_date[$i],
                'patient_id'       => $request->patient_id[$i] ?? null,
                'test_parameter'   => $request->test_parameter[$i] ?? null,
                'initial_value'    => $request->initial_value[$i] ?? null,
                'cross_check_value'=> $request->cross_check_value[$i] ?? null,
                'reporting_time'   => $request->reporting_time[$i] ?? null,
                'informed'         => $request->informed[$i] ?? null,
                'readback_value'   => $request->readback_value[$i] ?? null,
                'informing_time'   => $request->informing_time[$i] ?? null,
                'person_sign'      => $request->person_sign[$i] ?? null,
            ];

            $rowId = $request->row_id[$i] ?? null;

            if ($rowId) {
                // UPDATE existing record
                CriticalCallOutForm::where('id', $rowId)->update(array_merge($data, [
                    'updated_by' => auth()->id(),
                ]));
            } else {
                // CREATE new record
                CriticalCallOutForm::create(array_merge($data, [
                    'created_by' => auth()->id(),
                ]));
            }
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Critical Call-Out Form saved successfully'
            ]);
        }

        return back()->with('success', 'Critical Call-Out Form saved successfully');
    }

    /**
     * LOAD Critical Call-Out Form data based on filters
     * Returns MULTIPLE records for date range
     */
    public function loadCriticalCallOutForm(Request $request)
    {
        // At least one date filter required
        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json(['success' => false, 'data' => []]);
        }

        $query = CriticalCallOutForm::query();

        // FROM only - load records for that specific date
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('call_date', $request->from_date);
        }

        // TO only - load records for that specific date
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('call_date', $request->to_date);
        }

        // FROM and TO - load records in range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('call_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        // Return multiple records ordered by call_date
        $data = $query->orderBy('call_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data
        ]);
    }

    /**
     * GE: EQAS Sample Processing Form
     * TDPL/GE/FOM-009
     * Single record form with inline edit support
     */
    protected function storeEqasSampleProcessingForm(Request $request)
    {
        $payload = [
            'doc_no'                  => $request->doc_no,
            'eqas_provider'           => $request->eqas_provider,
            'eqas_lab_id'             => $request->eqas_lab_id,
            'department_name'         => $request->department_name,
            'sample_temperature'      => $request->sample_temperature,
            'sample_no'               => $request->sample_no,
            'accession_no'            => $request->accession_no,
            'reconstituted_by'        => $request->reconstituted_by,
            'reconstitution_date'     => $request->reconstitution_date,
            'processed_by'            => $request->processed_by,
            'reviewed_by'             => $request->reviewed_by,
            'qa_shared'               => $request->qa_shared,
            'result_dispatched_date'  => $request->result_dispatched_date,
            'evaluation_received_date'=> $request->evaluation_received_date,
        ];

        $record = null;

        if ($request->filled('eqas_sample_processing_form_id')) {
            // UPDATE existing record
            EqasSampleProcessingForm::where('id', $request->eqas_sample_processing_form_id)
                ->update(array_merge($payload, [
                    'updated_by' => auth()->id(),
                ]));
            $record = EqasSampleProcessingForm::find($request->eqas_sample_processing_form_id);
        } else {
            // CREATE new record
            $record = EqasSampleProcessingForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'EQAS Sample Processing Form saved successfully',
                'data' => $record
            ]);
        }

        return back()->with('success', 'EQAS Sample Processing Form saved successfully');
    }

    /**
     * LOAD EQAS Sample Processing Form data based on filters
     */
    public function loadEqasSampleProcessingForm(Request $request)
    {
        $query = EqasSampleProcessingForm::query();

        if ($request->filled('eqas_provider')) {
            $query->where('eqas_provider', $request->eqas_provider);
        }

        if ($request->filled('sample_no')) {
            $query->where('sample_no', $request->sample_no);
        }

        if ($request->filled('department_name')) {
            $query->where('department_name', $request->department_name);
        }

        $data = $query->latest()->first();

        if ($data) {
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No data found for the selected filters'
        ]);
    }

    /**
     * GE: Daily Cleaning Checklist Form
     * TDPL/GE/FOM-010
     * Stores daily data as JSON (one record per month/department/location)
     */
    protected function storeDailyCleaningChecklistForm(Request $request)
    {
        $monthYear = $request->month_year;
        $department = $request->department;
        $location = $request->location;

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
            // Match patterns like: floor_0_1, dustbins_1_15, lab_staff_signature_1, etc.
            if (preg_match('/^(floor|dustbins|counters|equipment)_\d+_\d+$/', $key) ||
                preg_match('/^lab_(staff|supervisor)_signature_\d+$/', $key)) {
                if ($value !== null && $value !== '') {
                    $dailyData[$key] = $value;
                }
            }
        }

        $payload = [
            'doc_no'     => $request->doc_no,
            'month_year' => $monthYear,
            'department' => $department,
            'location'   => $location,
            'daily_data' => $dailyData ?: null,
        ];

        // Check if record exists for this month/department/location
        $existing = DailyCleaningChecklistForm::where('month_year', $monthYear)
            ->where('department', $department)
            ->where('location', $location)
            ->first();

        if ($existing) {
            // UPDATE existing record
            $existing->update(array_merge($payload, [
                'updated_by' => auth()->id(),
            ]));
        } else {
            // CREATE new record
            DailyCleaningChecklistForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Daily Cleaning Checklist saved successfully'
            ]);
        }

        return back()->with('success', 'Daily Cleaning Checklist saved successfully');
    }

    /**
     * LOAD Daily Cleaning Checklist Form data based on month_year filter
     */
    public function loadDailyCleaningChecklistForm(Request $request)
    {
        if (!$request->filled('month_year')) {
            return response()->json(['success' => false, 'data' => null]);
        }

        $query = DailyCleaningChecklistForm::where('month_year', $request->month_year);

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $data = $query->first();

        // Get distinct departments and locations for datalist
        $departments = DailyCleaningChecklistForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = DailyCleaningChecklistForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        return response()->json([
            'success' => $data ? true : false,
            'data' => $data,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * GE: Daily Cleanliness Log for Rest Room
     * TDPL/GE/FOM-011
     * Stores daily data as JSON (one record per month/floor/location)
     */
    protected function storeDailyCleanlinessLogForm(Request $request)
    {
        $monthYear = $request->month_year;
        $floor = $request->floor;
        $location = $request->location;

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
            // Match patterns like: floor_cleaned_morning_1, hand_wash_afternoon_15, lab_staff_signature_1, etc.
            if (preg_match('/^(floor_cleaned|hand_wash|wash_basin)_(morning|afternoon|evening)_\d+$/', $key) ||
                preg_match('/^lab_(staff|supervisor)_signature_\d+$/', $key)) {
                if ($value !== null && $value !== '') {
                    $dailyData[$key] = $value;
                }
            }
        }

        $payload = [
            'doc_no'     => $request->doc_no,
            'month_year' => $monthYear,
            'floor'      => $floor,
            'location'   => $location,
            'daily_data' => $dailyData ?: null,
        ];

        // Check if record exists for this month/floor/location
        $existing = DailyCleanlinessLogForm::where('month_year', $monthYear)
            ->where('floor', $floor)
            ->where('location', $location)
            ->first();

        if ($existing) {
            // UPDATE existing record
            $existing->update(array_merge($payload, [
                'updated_by' => auth()->id(),
            ]));
        } else {
            // CREATE new record
            DailyCleanlinessLogForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Daily Cleanliness Log saved successfully'
            ]);
        }

        return back()->with('success', 'Daily Cleanliness Log saved successfully');
    }

    /**
     * LOAD Daily Cleanliness Log Form data based on month_year filter
     */
    public function loadDailyCleanlinessLogForm(Request $request)
    {
        if (!$request->filled('month_year')) {
            return response()->json(['success' => false, 'data' => null]);
        }

        $query = DailyCleanlinessLogForm::where('month_year', $request->month_year);

        if ($request->filled('floor')) {
            $query->where('floor', $request->floor);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $data = $query->first();

        // Get distinct floors and locations for datalist
        $floors = DailyCleanlinessLogForm::whereNotNull('floor')
            ->where('floor', '!=', '')
            ->distinct()
            ->pluck('floor')
            ->toArray();

        $locations = DailyCleanlinessLogForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        return response()->json([
            'success' => $data ? true : false,
            'data' => $data,
            'floors' => $floors,
            'locations' => $locations
        ]);
    }

    /**
     * GE: Daily IQC Data Monitoring Form
     * TDPL/GE/FOM-012
     * Stores daily data as JSON (one record per month/department/instrument)
     */
    protected function storeDailyIqcDataMonitoringForm(Request $request)
    {
        $monthYear = $request->month_year;
        $department = $request->department;
        $instrumentNo = $request->instrument_no;

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
            // Match patterns for range rows and parameter rows
            if (preg_match('/^range_(low|mean|high)_\d+$/', $key) ||
                preg_match('/^param_\d+_\d+$/', $key) ||
                preg_match('/^done_by_\d+$/', $key) ||
                preg_match('/^reviewed_by_\d+$/', $key)) {
                if ($value !== null && $value !== '') {
                    $dailyData[$key] = $value;
                }
            }
        }

        $payload = [
            'doc_no'          => $request->doc_no,
            'month_year'      => $monthYear,
            'department'      => $department,
            'level'           => $request->level,
            'instrument_no'   => $instrumentNo,
            'control_lot_no'  => $request->control_lot_no,
            'control_expiry'  => $request->control_expiry,
            'control_lot_no_2'=> $request->control_lot_no_2,
            'control_expiry_2'=> $request->control_expiry_2,
            'daily_data'      => $dailyData ?: null,
        ];

        // Check if record exists for this month/department/instrument
        $existing = DailyIqcDataMonitoringForm::where('month_year', $monthYear)
            ->where('department', $department)
            ->where('instrument_no', $instrumentNo)
            ->first();

        if ($existing) {
            // UPDATE existing record
            $existing->update(array_merge($payload, [
                'updated_by' => auth()->id(),
            ]));
        } else {
            // CREATE new record
            DailyIqcDataMonitoringForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Daily IQC Data Monitoring Form saved successfully'
            ]);
        }

        return back()->with('success', 'Daily IQC Data Monitoring Form saved successfully');
    }

    /**
     * LOAD Daily IQC Data Monitoring Form data based on filters
     */
    public function loadDailyIqcDataMonitoringForm(Request $request)
    {
        if (!$request->filled('month_year')) {
            return response()->json(['success' => false, 'data' => null]);
        }

        $query = DailyIqcDataMonitoringForm::where('month_year', $request->month_year);

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('instrument_no')) {
            $query->where('instrument_no', $request->instrument_no);
        }

        $data = $query->first();

        // Get distinct values for datalists
        $departments = DailyIqcDataMonitoringForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $levels = DailyIqcDataMonitoringForm::whereNotNull('level')
            ->where('level', '!=', '')
            ->distinct()
            ->pluck('level')
            ->toArray();

        $instrumentNos = DailyIqcDataMonitoringForm::whereNotNull('instrument_no')
            ->where('instrument_no', '!=', '')
            ->distinct()
            ->pluck('instrument_no')
            ->toArray();

        $controlLotNos = DailyIqcDataMonitoringForm::whereNotNull('control_lot_no')
            ->where('control_lot_no', '!=', '')
            ->distinct()
            ->pluck('control_lot_no')
            ->toArray();

        return response()->json([
            'success' => $data ? true : false,
            'data' => $data,
            'departments' => $departments,
            'levels' => $levels,
            'instrument_nos' => $instrumentNos,
            'control_lot_nos' => $controlLotNos
        ]);
    }

    /**
     * GE: Approved Referral Laboratories Consultants Form
     * TDPL/GE/FOM-029
     * Stores daily data as JSON (one record per month/location)
     */
    protected function storeApprovedReferralLabForm(Request $request)
    {
        $monthYear = $request->month_year;
        $location = $request->location;

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
            if (preg_match('/^(lab_name|row_location|mou_date|user_code)_\d+$/', $key)) {
                if ($value !== null && $value !== '') {
                    $dailyData[$key] = $value;
                }
            }
        }

        $payload = [
            'doc_no'     => $request->doc_no,
            'month_year' => $monthYear,
            'location'   => $location,
            'daily_data' => $dailyData ?: null,
        ];

        // Check if record exists for this month/location
        $existing = ApprovedReferralLabForm::where('month_year', $monthYear)
            ->where('location', $location)
            ->first();

        if ($existing) {
            // UPDATE existing record
            $existing->update(array_merge($payload, [
                'updated_by' => auth()->id(),
            ]));
        } else {
            // CREATE new record
            ApprovedReferralLabForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Approved Referral Laboratories Form saved successfully'
            ]);
        }

        return back()->with('success', 'Approved Referral Laboratories Form saved successfully');
    }

    /**
     * LOAD Approved Referral Laboratories Form data based on filters
     */
    public function loadApprovedReferralLabForm(Request $request)
    {
        if (!$request->filled('month_year')) {
            return response()->json(['success' => false, 'data' => null]);
        }

        $query = ApprovedReferralLabForm::where('month_year', $request->month_year);

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $data = $query->first();

        // Get distinct locations for datalist
        $locations = ApprovedReferralLabForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        return response()->json([
            'success' => $data ? true : false,
            'data' => $data,
            'locations' => $locations
        ]);
    }

    /**
     * GE: Distilled Water Plant Checklist
     * TDPL/GE/FOM-014
     * Stores daily data as JSON (one record per month/location/department)
     */
    protected function storeDistilledWaterPlantChecklistForm(Request $request)
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
            if (preg_match('/^(motor_working|tds|filter_check|water_leakage|done_by)_\d+$/', $key)) {
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
            'lab_incharge'=> $request->lab_incharge,
            'daily_data'  => $dailyData ?: null,
        ];

        // Check if record exists for this month/location/department
        $existing = DistilledWaterPlantChecklistForm::where('month_year', $monthYear)
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
            DistilledWaterPlantChecklistForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Distilled Water Plant Checklist saved successfully'
            ]);
        }

        return back()->with('success', 'Distilled Water Plant Checklist saved successfully');
    }

    /**
     * LOAD Distilled Water Plant Checklist data based on filters
     */
    public function loadDistilledWaterPlantChecklistForm(Request $request)
    {
        if (!$request->filled('month_year')) {
            return response()->json(['success' => false, 'data' => null]);
        }

        $query = DistilledWaterPlantChecklistForm::where('month_year', $request->month_year);

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        $data = $query->first();

        // Get distinct values for datalists
        $locations = DistilledWaterPlantChecklistForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        $departments = DistilledWaterPlantChecklistForm::whereNotNull('department')
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
     * GE: Equipment Startup and Shutdown Form
     * TDPL/GE/FOM-015
     * Stores daily data as JSON (one record per month/department/instrument)
     */
    protected function storeEquipmentStartupShutdownForm(Request $request)
    {
        $monthYear = $request->month_year;
        $department = $request->department;
        $instrumentSerial = $request->instrument_serial;

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
            if (preg_match('/^(date|start_time|shutdown_time)_\d+$/', $key)) {
                if ($value !== null && $value !== '') {
                    $dailyData[$key] = $value;
                }
            }
        }

        $payload = [
            'doc_no'           => $request->doc_no,
            'month_year'       => $monthYear,
            'instrument_name'  => $request->instrument_name,
            'department'       => $department,
            'instrument_serial'=> $instrumentSerial,
            'daily_data'       => $dailyData ?: null,
        ];

        // Check if record exists for this month/department/instrument
        $existing = EquipmentStartupShutdownForm::where('month_year', $monthYear)
            ->where('department', $department)
            ->where('instrument_serial', $instrumentSerial)
            ->first();

        if ($existing) {
            // UPDATE existing record
            $existing->update(array_merge($payload, [
                'updated_by' => auth()->id(),
            ]));
        } else {
            // CREATE new record
            EquipmentStartupShutdownForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Equipment Startup and Shutdown Form saved successfully'
            ]);
        }

        return back()->with('success', 'Equipment Startup and Shutdown Form saved successfully');
    }

    /**
     * LOAD Equipment Startup and Shutdown Form data based on filters
     */
    public function loadEquipmentStartupShutdownForm(Request $request)
    {
        if (!$request->filled('month_year')) {
            return response()->json(['success' => false, 'data' => null]);
        }

        $query = EquipmentStartupShutdownForm::where('month_year', $request->month_year);

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('instrument_serial')) {
            $query->where('instrument_serial', $request->instrument_serial);
        }

        $data = $query->first();

        // Get distinct values for datalists
        $instrumentNames = EquipmentStartupShutdownForm::whereNotNull('instrument_name')
            ->where('instrument_name', '!=', '')
            ->distinct()
            ->pluck('instrument_name')
            ->toArray();

        $departments = EquipmentStartupShutdownForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $instrumentSerials = EquipmentStartupShutdownForm::whereNotNull('instrument_serial')
            ->where('instrument_serial', '!=', '')
            ->distinct()
            ->pluck('instrument_serial')
            ->toArray();

        return response()->json([
            'success' => $data ? true : false,
            'data' => $data,
            'instrument_names' => $instrumentNames,
            'departments' => $departments,
            'instrument_serials' => $instrumentSerials
        ]);
    }

    /**
     * GE: Eye Wash Monitoring Form
     * TDPL/GE/FOM-016
     * Stores daily data as JSON (one record per month/department)
     */
    protected function storeEyeWashMonitoringForm(Request $request)
    {
        $monthYear = $request->month_year;
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
            if (preg_match('/^(water_changed|changed_by|signature|remarks)_\d+$/', $key)) {
                if ($value !== null && $value !== '') {
                    $dailyData[$key] = $value;
                }
            }
        }

        $payload = [
            'doc_no'     => $request->doc_no,
            'month_year' => $monthYear,
            'department' => $department,
            'daily_data' => $dailyData ?: null,
        ];

        // Check if record exists for this month/department
        $existing = EyeWashMonitoringForm::where('month_year', $monthYear)
            ->where('department', $department)
            ->first();

        if ($existing) {
            // UPDATE existing record
            $existing->update(array_merge($payload, [
                'updated_by' => auth()->id(),
            ]));
        } else {
            // CREATE new record
            EyeWashMonitoringForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Eye Wash Monitoring Form saved successfully'
            ]);
        }

        return back()->with('success', 'Eye Wash Monitoring Form saved successfully');
    }

    /**
     * LOAD Eye Wash Monitoring Form data based on filters
     */
    public function loadEyeWashMonitoringForm(Request $request)
    {
        if (!$request->filled('month_year')) {
            return response()->json(['success' => false, 'data' => null]);
        }

        $query = EyeWashMonitoringForm::where('month_year', $request->month_year);

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        $data = $query->first();

        // Get distinct departments for datalist
        $departments = EyeWashMonitoringForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        return response()->json([
            'success' => $data ? true : false,
            'data' => $data,
            'departments' => $departments
        ]);
    }

    /**
     * GE: Inter-Laboratory Comparison Form
     * TDPL/GE/FOM-017
     * Handles multiple rows with array-style inputs
     * Prevents duplicate rows on submit
     */
    protected function storeInterLaboratoryComparisonForm(Request $request)
    {
        $labA = $request->lab_a;
        $labB = $request->lab_b;

        // Handle array-style rows
        if (is_array($request->comparison_date)) {
            $rowCount = count($request->comparison_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows (no comparison_date)
                if (empty($request->comparison_date[$i])) {
                    continue;
                }

                $comparisonDate = $request->comparison_date[$i];
                $regNo = $request->reg_no[$i] ?? null;
                $testParameter = $request->test_parameter[$i] ?? null;
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no'            => $request->doc_no,
                    'lab_a'             => $labA,
                    'lab_b'             => $labB,
                    'comparison_date'   => $comparisonDate,
                    'reg_no'            => $regNo,
                    'test_parameter'    => $testParameter,
                    'result_a'          => $request->result_a[$i] ?? null,
                    'result_b'          => $request->result_b[$i] ?? null,
                    'difference_percent'=> $request->difference_percent[$i] ?? null,
                    'status'            => $request->status[$i] ?? null,
                    'done_by'           => $request->done_by[$i] ?? null,
                    'reviewed_by'       => $request->reviewed_by[$i] ?? null,
                ];

                if ($rowId) {
                    // UPDATE existing record
                    InterLaboratoryComparisonForm::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                } else {
                    // Check for duplicate before creating (based on date, reg_no, test_parameter)
                    $existingRecord = InterLaboratoryComparisonForm::where('comparison_date', $comparisonDate)
                        ->where('reg_no', $regNo)
                        ->where('test_parameter', $testParameter)
                        ->where('lab_a', $labA)
                        ->where('lab_b', $labB)
                        ->first();

                    if ($existingRecord) {
                        // Update existing instead of creating duplicate
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                    } else {
                        // CREATE new record
                        InterLaboratoryComparisonForm::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                    }
                }
            }
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Inter-Laboratory Comparison Form saved successfully'
            ]);
        }

        return back()->with('success', 'Inter-Laboratory Comparison Form saved successfully');
    }

    /**
     * LOAD Inter-Laboratory Comparison Form data based on filters
     * Returns MULTIPLE records for date range
     * Filters: from_date, to_date (date range on comparison_date), lab_a, lab_b
     */
    public function loadInterLaboratoryComparisonForm(Request $request)
    {
        // At least one filter required
        if (!$request->filled('from_date') && !$request->filled('to_date') &&
            !$request->filled('lab_a') && !$request->filled('lab_b')) {

            // Return distinct values for datalists even when no filter
            $labAs = InterLaboratoryComparisonForm::whereNotNull('lab_a')
                ->where('lab_a', '!=', '')
                ->distinct()
                ->pluck('lab_a')
                ->toArray();

            $labBs = InterLaboratoryComparisonForm::whereNotNull('lab_b')
                ->where('lab_b', '!=', '')
                ->distinct()
                ->pluck('lab_b')
                ->toArray();

            return response()->json([
                'success' => false,
                'data' => [],
                'lab_as' => $labAs,
                'lab_bs' => $labBs
            ]);
        }

        $query = InterLaboratoryComparisonForm::query();

        // FROM only - load records for that specific date
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('comparison_date', $request->from_date);
        }

        // TO only - load records for that specific date
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('comparison_date', $request->to_date);
        }

        // FROM and TO - load records in range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('comparison_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        if ($request->filled('lab_a')) {
            $query->where('lab_a', $request->lab_a);
        }

        if ($request->filled('lab_b')) {
            $query->where('lab_b', $request->lab_b);
        }

        // Return multiple records ordered by comparison_date
        $data = $query->orderBy('comparison_date', 'desc')->get();

        // Get distinct values for datalists
        $labAs = InterLaboratoryComparisonForm::whereNotNull('lab_a')
            ->where('lab_a', '!=', '')
            ->distinct()
            ->pluck('lab_a')
            ->toArray();

        $labBs = InterLaboratoryComparisonForm::whereNotNull('lab_b')
            ->where('lab_b', '!=', '')
            ->distinct()
            ->pluck('lab_b')
            ->toArray();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data,
            'lab_as' => $labAs,
            'lab_bs' => $labBs
        ]);
    }

    /**
     * DELETE Inter-Laboratory Comparison Form record
     */
    public function deleteInterLaboratoryComparisonForm($id)
    {
        $record = InterLaboratoryComparisonForm::find($id);

        if ($record) {
            $record->delete();
            return response()->json([
                'success' => true,
                'message' => 'Record deleted successfully'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Record not found'
        ]);
    }

    /**
     * GE: Laboratory Incident Form
     * TDPL/GE/FOM-018
     * Single record form with inline edit support
     */
    protected function storeLaboratoryIncidentForm(Request $request)
    {
        $payload = [
            'doc_no'                    => $request->doc_no,
            'incident_date_patient_id'  => $request->incident_date_patient_id,
            'report_filed_by'           => $request->report_filed_by,
            'complaint_identification'  => $request->complaint_identification,
            'department_involved'       => $request->department_involved,
            'incident_description'      => $request->incident_description,
            'damage_description'        => $request->damage_description,
            'root_cause_description'    => $request->root_cause_description,
            'corrective_action'         => $request->corrective_action,
            'management_decision'       => $request->management_decision,
            'signature_quality_manager' => $request->signature_quality_manager,
            'signature_lab_head'        => $request->signature_lab_head,
        ];

        $record = null;

        if ($request->filled('laboratory_incident_form_id')) {
            // UPDATE existing record
            LaboratoryIncidentForm::where('id', $request->laboratory_incident_form_id)
                ->update(array_merge($payload, [
                    'updated_by' => auth()->id(),
                ]));
            $record = LaboratoryIncidentForm::find($request->laboratory_incident_form_id);
        } else {
            // CREATE new record
            $record = LaboratoryIncidentForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Laboratory Incident Form saved successfully',
                'data' => $record
            ]);
        }

        return back()->with('success', 'Laboratory Incident Form saved successfully');
    }

    /**
     * GE: Employee Suggestion for Improvement Form
     * TDPL/GE/FOM-019
     * Single record form with inline edit support
     */
    protected function storeEmployeeSuggestionForm(Request $request)
    {
        $payload = [
            'doc_no'                      => $request->doc_no,
            'employee_name'               => $request->employee_name,
            'suggestion_date'             => $request->suggestion_date,
            'employee_id'                 => $request->employee_id,
            'staff_suggestions'           => $request->staff_suggestions,
            'suggested_requirements'      => $request->suggested_requirements,
            'employee_signature'          => $request->employee_signature,
            'corrective_action_management'=> $request->corrective_action_management,
            'lab_supervisor'              => $request->lab_supervisor,
            'lab_director_signature'      => $request->lab_director_signature,
        ];

        $record = null;

        if ($request->filled('employee_suggestion_form_id')) {
            // UPDATE existing record
            EmployeeSuggestionForm::where('id', $request->employee_suggestion_form_id)
                ->update(array_merge($payload, [
                    'updated_by' => auth()->id(),
                ]));
            $record = EmployeeSuggestionForm::find($request->employee_suggestion_form_id);
        } else {
            // CREATE new record
            $record = EmployeeSuggestionForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Employee Suggestion Form saved successfully',
                'data' => $record
            ]);
        }

        return back()->with('success', 'Employee Suggestion Form saved successfully');
    }

    /**
     * GE: New Reagent Lot Verification Form
     * TDPL/GE/FOM-020
     * Handles multiple rows with array-style inputs
     * Prevents duplicate rows on submit
     */
    protected function storeNewReagentLotVerificationForm(Request $request)
    {
        $location = $request->location;
        $department = $request->department;
        $savedIds = [];

        // Handle array-style rows
        if (is_array($request->verification_date)) {
            $rowCount = count($request->verification_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows (no verification_date)
                if (empty($request->verification_date[$i])) {
                    continue;
                }

                $verificationDate = $request->verification_date[$i];
                $reagent = $request->reagent[$i] ?? null;
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no'            => $request->doc_no,
                    'location'          => $location,
                    'department'        => $department,
                    'verification_date' => $verificationDate,
                    'reagent'           => $reagent,
                    'old_lot'           => $request->old_lot[$i] ?? null,
                    'old_expiry'        => $request->old_expiry[$i] ?? null,
                    'new_lot'           => $request->new_lot[$i] ?? null,
                    'new_expiry'        => $request->new_expiry[$i] ?? null,
                    'analytes'          => $request->analytes[$i] ?? null,
                    'materials_used'    => $request->materials_used[$i] ?? null,
                    'specimen_source'   => $request->specimen_source[$i] ?? null,
                    'old_result'        => $request->old_result[$i] ?? null,
                    'new_result'        => $request->new_result[$i] ?? null,
                    'variation'         => $request->variation[$i] ?? null,
                    'criteria'          => $request->criteria[$i] ?? null,
                    'acceptable'        => $request->acceptable[$i] ?? null,
                    'lab_tech_signature'=> $request->lab_tech_signature[$i] ?? null,
                    'verified_by'       => $request->verified_by[$i] ?? null,
                ];

                if ($rowId) {
                    // UPDATE existing record
                    NewReagentLotVerificationForm::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    // Check for duplicate before creating (based on date, reagent, location, department)
                    $existingRecord = NewReagentLotVerificationForm::where('verification_date', $verificationDate)
                        ->where('reagent', $reagent)
                        ->where('location', $location)
                        ->where('department', $department)
                        ->first();

                    if ($existingRecord) {
                        // Update existing instead of creating duplicate
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                        $savedIds[] = $existingRecord->id;
                    } else {
                        // CREATE new record
                        $newRecord = NewReagentLotVerificationForm::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                        $savedIds[] = $newRecord->id;
                    }
                }
            }
        }

        // Return JSON for AJAX requests with saved records
        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = NewReagentLotVerificationForm::whereIn('id', $savedIds)
                ->orderBy('verification_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'New Reagent Lot Verification Form saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'New Reagent Lot Verification Form saved successfully');
    }

    /**
     * LOAD New Reagent Lot Verification Form data based on filters
     * Returns MULTIPLE records for date range
     * Filters: from_date, to_date (date range on verification_date), location, department
     */
    public function loadNewReagentLotVerificationForm(Request $request)
    {
        // Get distinct values for datalists
        $locations = NewReagentLotVerificationForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        $departments = NewReagentLotVerificationForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        // At least one date filter required
        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => [],
                'locations' => $locations,
                'departments' => $departments
            ]);
        }

        $query = NewReagentLotVerificationForm::query();

        // FROM only - load records for that specific date
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('verification_date', $request->from_date);
        }

        // TO only - load records for that specific date
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('verification_date', $request->to_date);
        }

        // FROM and TO - load records in range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('verification_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        // Return multiple records ordered by verification_date
        $data = $query->orderBy('verification_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data,
            'locations' => $locations,
            'departments' => $departments
        ]);
    }

    /**
     * STORE Non-Conformity & Corrective Action Form (FOM-021)
     * Handles multiple rows with array-style inputs
     * Prevents duplicate rows on submit
     */
    protected function storeNonConformityCorrectiveActionForm(Request $request)
    {
        $location = $request->location;
        $department = $request->department;
        $savedIds = [];

        // Handle array-style rows
        if (is_array($request->nc_date)) {
            $rowCount = count($request->nc_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows (no nc_date)
                if (empty($request->nc_date[$i])) {
                    continue;
                }

                $ncDate = $request->nc_date[$i];
                $nonConformity = $request->non_conformity[$i] ?? null;
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no'            => $request->doc_no,
                    'location'          => $location,
                    'department'        => $department,
                    'nc_date'           => $ncDate,
                    'non_conformity'    => $nonConformity,
                    'responsible_person'=> $request->responsible_person[$i] ?? null,
                    'root_cause'        => $request->root_cause[$i] ?? null,
                    'corrective_action' => $request->corrective_action[$i] ?? null,
                    'preventive_action' => $request->preventive_action[$i] ?? null,
                    'closure_date'      => $request->closure_date[$i] ?? null,
                    'signature'         => $request->signature[$i] ?? null,
                ];

                if ($rowId) {
                    // UPDATE existing record
                    NonConformityCorrectiveActionForm::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    // Check for duplicate before creating (based on date, non_conformity, location, department)
                    $existingRecord = NonConformityCorrectiveActionForm::where('nc_date', $ncDate)
                        ->where('non_conformity', $nonConformity)
                        ->where('location', $location)
                        ->where('department', $department)
                        ->first();

                    if ($existingRecord) {
                        // Update existing instead of creating duplicate
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                        $savedIds[] = $existingRecord->id;
                    } else {
                        // CREATE new record
                        $newRecord = NonConformityCorrectiveActionForm::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                        $savedIds[] = $newRecord->id;
                    }
                }
            }
        }

        // Return JSON for AJAX requests with saved records
        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = NonConformityCorrectiveActionForm::whereIn('id', $savedIds)
                ->orderBy('nc_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Non-Conformity & Corrective Action Form saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Non-Conformity & Corrective Action Form saved successfully');
    }

    /**
     * LOAD Non-Conformity & Corrective Action Form data based on filters
     * Returns MULTIPLE records for date range
     * Filters: from_date, to_date (date range on nc_date), location, department
     */
    public function loadNonConformityCorrectiveActionForm(Request $request)
    {
        // Get distinct values for datalists
        $locations = NonConformityCorrectiveActionForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        $departments = NonConformityCorrectiveActionForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        // At least one date filter required
        if (!$request->filled('from_date') && !$request->filled('to_date')) {
            return response()->json([
                'success' => false,
                'data' => [],
                'locations' => $locations,
                'departments' => $departments
            ]);
        }

        $query = NonConformityCorrectiveActionForm::query();

        // FROM only - load records for that specific date
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('nc_date', $request->from_date);
        }

        // TO only - load records for that specific date
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('nc_date', $request->to_date);
        }

        // FROM and TO - load records in range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('nc_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        // Return multiple records ordered by nc_date
        $data = $query->orderBy('nc_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data,
            'locations' => $locations,
            'departments' => $departments
        ]);
    }

    /**
     * STORE Refrigerator Temperature Form (FOM-022)
     * Stores monthly data with 31 days of temperature readings
     */
    protected function storeRefrigeratorTemperatureForm(Request $request)
    {
        $monthYear = $request->month_year;
        $department = $request->department;
        $instrumentId = $request->instrument_id;

        if (!$monthYear) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Month/Year is required'
                ]);
            }
            return back()->with('error', 'Month/Year is required');
        }

        // Collect daily data
        $dailyData = [];
        for ($i = 1; $i <= 31; $i++) {
            $morningTemp = $request->input("morning_temp_{$i}");
            $morningSign = $request->input("morning_sign_{$i}");
            $eveningTemp = $request->input("evening_temp_{$i}");
            $eveningSign = $request->input("evening_sign_{$i}");

            if ($morningTemp || $morningSign || $eveningTemp || $eveningSign) {
                $dailyData["morning_temp_{$i}"] = $morningTemp;
                $dailyData["morning_sign_{$i}"] = $morningSign;
                $dailyData["evening_temp_{$i}"] = $eveningTemp;
                $dailyData["evening_sign_{$i}"] = $eveningSign;
            }
        }

        // Find existing or create new record
        $record = RefrigeratorTemperatureForm::where('month_year', $monthYear)
            ->where('department', $department)
            ->where('instrument_id', $instrumentId)
            ->first();

        if ($record) {
            $record->update([
                'daily_data' => $dailyData,
                'updated_by' => auth()->id(),
            ]);
        } else {
            $record = RefrigeratorTemperatureForm::create([
                'doc_no' => $request->doc_no,
                'month_year' => $monthYear,
                'department' => $department,
                'instrument_id' => $instrumentId,
                'daily_data' => $dailyData,
                'created_by' => auth()->id(),
            ]);
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Refrigerator Temperature Form saved successfully',
                'data' => $record
            ]);
        }

        return back()->with('success', 'Refrigerator Temperature Form saved successfully');
    }

    /**
     * LOAD Refrigerator Temperature Form data based on filters
     */
    public function loadRefrigeratorTemperatureForm(Request $request)
    {
        // Get distinct values for datalists
        $departments = RefrigeratorTemperatureForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $instrumentIds = RefrigeratorTemperatureForm::whereNotNull('instrument_id')
            ->where('instrument_id', '!=', '')
            ->distinct()
            ->pluck('instrument_id')
            ->toArray();

        // Month year is required
        if (!$request->filled('month_year')) {
            return response()->json([
                'success' => false,
                'data' => null,
                'departments' => $departments,
                'instrument_ids' => $instrumentIds
            ]);
        }

        $query = RefrigeratorTemperatureForm::where('month_year', $request->month_year);

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('instrument_id')) {
            $query->where('instrument_id', $request->instrument_id);
        }

        $record = $query->first();

        return response()->json([
            'success' => $record !== null,
            'data' => $record,
            'departments' => $departments,
            'instrument_ids' => $instrumentIds
        ]);
    }

    /**
     * STORE Repeat Test Form (FOM-023)
     * Handles multiple rows with array-style inputs
     * Prevents duplicate rows on submit
     */
    protected function storeRepeatTestForm(Request $request)
    {
        $department = $request->department;
        $location = $request->location;
        $savedIds = [];

        // Handle array-style rows
        if (is_array($request->test_date)) {
            $rowCount = count($request->test_date);
            $rowIds = $request->row_id ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                // Skip empty rows (no test_date)
                if (empty($request->test_date[$i])) {
                    continue;
                }

                $testDate = $request->test_date[$i];
                $visitId = $request->visit_id[$i] ?? null;
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no'        => $request->doc_no,
                    'department'    => $department,
                    'location'      => $location,
                    'test_date'     => $testDate,
                    'visit_id'      => $visitId,
                    'parameter'     => $request->parameter[$i] ?? null,
                    'reason'        => $request->reason[$i] ?? null,
                    'authorised_by' => $request->authorised_by[$i] ?? null,
                    'result_a'      => $request->result_a[$i] ?? null,
                    'result_b'      => $request->result_b[$i] ?? null,
                    'result_c'      => $request->result_c[$i] ?? null,
                    'lims_entry'    => $request->lims_entry[$i] ?? null,
                    'reviewed_by'   => $request->reviewed_by[$i] ?? null,
                ];

                if ($rowId) {
                    // UPDATE existing record
                    RepeatTestForm::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    // Check for duplicate before creating (based on date, visit_id, department, location)
                    $existingRecord = RepeatTestForm::where('test_date', $testDate)
                        ->where('visit_id', $visitId)
                        ->where('department', $department)
                        ->where('location', $location)
                        ->first();

                    if ($existingRecord) {
                        // Update existing instead of creating duplicate
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                        $savedIds[] = $existingRecord->id;
                    } else {
                        // CREATE new record
                        $newRecord = RepeatTestForm::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                        $savedIds[] = $newRecord->id;
                    }
                }
            }
        }

        // Return JSON for AJAX requests with saved records
        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = RepeatTestForm::whereIn('id', $savedIds)
                ->orderBy('test_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Repeat Test Form saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Repeat Test Form saved successfully');
    }

    /**
     * LOAD Repeat Test Form data based on filters
     * Returns MULTIPLE records for date range
     * Filters: from_date, to_date (date range on test_date), department, location
     */
    public function loadRepeatTestForm(Request $request)
    {
        // Get distinct values for datalists
        $departments = RepeatTestForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = RepeatTestForm::whereNotNull('location')
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

        $query = RepeatTestForm::query();

        // FROM only - load records for that specific date
        if ($request->filled('from_date') && !$request->filled('to_date')) {
            $query->whereDate('test_date', $request->from_date);
        }

        // TO only - load records for that specific date
        if (!$request->filled('from_date') && $request->filled('to_date')) {
            $query->whereDate('test_date', $request->to_date);
        }

        // FROM and TO - load records in range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('test_date', [
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

        // Return multiple records ordered by test_date
        $data = $query->orderBy('test_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * STORE NiU-Transcription Check Form (FOM-025)
     * Handles multiple rows with array-style inputs
     * Prevents duplicate rows on submit
     */
    protected function storeNiuTranscriptionCheckForm(Request $request)
    {
        $department = $request->department;
        $location = $request->location;
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
                $visitNo = $request->visit_no[$i] ?? null;
                $rowId = $rowIds[$i] ?? null;

                $data = [
                    'doc_no'           => $request->doc_no,
                    'department'       => $department,
                    'location'         => $location,
                    'check_date'       => $checkDate,
                    'visit_no'         => $visitNo,
                    'worksheet_result' => $request->worksheet_result[$i] ?? null,
                    'lis_result'       => $request->lis_result[$i] ?? null,
                    'entered_by'       => $request->entered_by[$i] ?? null,
                    'verified_by'      => $request->verified_by[$i] ?? null,
                ];

                if ($rowId) {
                    // UPDATE existing record
                    NiuTranscriptionCheckForm::where('id', $rowId)->update(array_merge($data, [
                        'updated_by' => auth()->id(),
                    ]));
                    $savedIds[] = $rowId;
                } else {
                    // Check for duplicate before creating (based on date, visit_no, department, location)
                    $existingRecord = NiuTranscriptionCheckForm::where('check_date', $checkDate)
                        ->where('visit_no', $visitNo)
                        ->where('department', $department)
                        ->where('location', $location)
                        ->first();

                    if ($existingRecord) {
                        // Update existing instead of creating duplicate
                        $existingRecord->update(array_merge($data, [
                            'updated_by' => auth()->id(),
                        ]));
                        $savedIds[] = $existingRecord->id;
                    } else {
                        // CREATE new record
                        $newRecord = NiuTranscriptionCheckForm::create(array_merge($data, [
                            'created_by' => auth()->id(),
                        ]));
                        $savedIds[] = $newRecord->id;
                    }
                }
            }
        }

        // Return JSON for AJAX requests with saved records
        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = NiuTranscriptionCheckForm::whereIn('id', $savedIds)
                ->orderBy('check_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'NiU-Transcription Check Form saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'NiU-Transcription Check Form saved successfully');
    }

    /**
     * LOAD NiU-Transcription Check Form data based on filters
     * Returns MULTIPLE records for date range
     * Filters: from_date, to_date (date range on check_date), department, location
     */
    public function loadNiuTranscriptionCheckForm(Request $request)
    {
        // Get distinct values for datalists
        $departments = NiuTranscriptionCheckForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = NiuTranscriptionCheckForm::whereNotNull('location')
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

        $query = NiuTranscriptionCheckForm::query();

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

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        // Return multiple records ordered by check_date
        $data = $query->orderBy('check_date', 'desc')->get();

        return response()->json([
            'success' => $data->count() > 0,
            'data' => $data,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * STORE Meeting Agenda Form (FOM-027)
     */
    protected function storeMeetingAgendaForm(Request $request)
    {
        $recordId = $request->meeting_agenda_form_id;

        $data = [
            'doc_no'            => $request->doc_no,
            'meeting_date'      => $request->meeting_date,
            'meeting_time'      => $request->meeting_time,
            'meeting_location'  => $request->meeting_location,
            'meeting_duration'  => $request->meeting_duration,
            'chairperson'       => $request->chairperson,
            'recorder'          => $request->recorder,
            'attendees'         => $request->attendees,
            'meeting_topic'     => $request->meeting_topic,
            'agenda_items'      => $request->agenda_items,
            'confirmation_date' => $request->confirmation_date,
            'sender_name'       => $request->sender_name,
            'sender_designation'=> $request->sender_designation,
            'sender_contact'    => $request->sender_contact,
        ];

        if ($recordId) {
            // UPDATE existing record
            MeetingAgendaForm::where('id', $recordId)->update(array_merge($data, [
                'updated_by' => auth()->id(),
            ]));
            $record = MeetingAgendaForm::find($recordId);
        } else {
            // CREATE new record
            $record = MeetingAgendaForm::create(array_merge($data, [
                'created_by' => auth()->id(),
            ]));
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Meeting Agenda Form saved successfully',
                'data' => $record
            ]);
        }

        return back()->with('success', 'Meeting Agenda Form saved successfully');
    }

    /**
     * STORE Room Temperature and Humidity Form (FOM-030)
     * Stores monthly data with 31 days of readings
     */
    protected function storeRoomTemperatureHumidityForm(Request $request)
    {
        $monthYear = $request->month_year;
        $department = $request->department;
        $instrumentId = $request->instrument_id;

        if (!$monthYear) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Month/Year is required'
                ]);
            }
            return back()->with('error', 'Month/Year is required');
        }

        // Collect daily data
        $dailyData = [];
        for ($i = 1; $i <= 31; $i++) {
            $morningHumidity = $request->input("morning_humidity_{$i}");
            $morningTemp = $request->input("morning_temp_{$i}");
            $morningSign = $request->input("morning_sign_{$i}");
            $eveningHumidity = $request->input("evening_humidity_{$i}");
            $eveningTemp = $request->input("evening_temp_{$i}");
            $eveningSign = $request->input("evening_sign_{$i}");

            if ($morningHumidity || $morningTemp || $morningSign || $eveningHumidity || $eveningTemp || $eveningSign) {
                $dailyData["morning_humidity_{$i}"] = $morningHumidity;
                $dailyData["morning_temp_{$i}"] = $morningTemp;
                $dailyData["morning_sign_{$i}"] = $morningSign;
                $dailyData["evening_humidity_{$i}"] = $eveningHumidity;
                $dailyData["evening_temp_{$i}"] = $eveningTemp;
                $dailyData["evening_sign_{$i}"] = $eveningSign;
            }
        }

        // Find existing or create new record
        $record = RoomTemperatureHumidityForm::where('month_year', $monthYear)
            ->where('department', $department)
            ->where('instrument_id', $instrumentId)
            ->first();

        if ($record) {
            $record->update([
                'daily_data' => $dailyData,
                'updated_by' => auth()->id(),
            ]);
        } else {
            $record = RoomTemperatureHumidityForm::create([
                'doc_no' => $request->doc_no,
                'month_year' => $monthYear,
                'department' => $department,
                'instrument_id' => $instrumentId,
                'daily_data' => $dailyData,
                'created_by' => auth()->id(),
            ]);
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Room Temperature and Humidity Form saved successfully',
                'data' => $record
            ]);
        }

        return back()->with('success', 'Room Temperature and Humidity Form saved successfully');
    }

    /**
     * LOAD Room Temperature and Humidity Form data based on filters
     */
    public function loadRoomTemperatureHumidityForm(Request $request)
    {
        // Get distinct values for datalists
        $departments = RoomTemperatureHumidityForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $instrumentIds = RoomTemperatureHumidityForm::whereNotNull('instrument_id')
            ->where('instrument_id', '!=', '')
            ->distinct()
            ->pluck('instrument_id')
            ->toArray();

        // Month year is required
        if (!$request->filled('month_year')) {
            return response()->json([
                'success' => false,
                'data' => null,
                'departments' => $departments,
                'instrument_ids' => $instrumentIds
            ]);
        }

        $query = RoomTemperatureHumidityForm::where('month_year', $request->month_year);

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('instrument_id')) {
            $query->where('instrument_id', $request->instrument_id);
        }

        $record = $query->first();

        return response()->json([
            'success' => $record !== null,
            'data' => $record,
            'departments' => $departments,
            'instrument_ids' => $instrumentIds
        ]);
    }

    /**
     * GE: Amendment Report Monitoring Form
     * TDPL/GE/FOM-031
     * Dynamic rows with date range filter
     */
    protected function storeAmendmentReportMonitoringForm(Request $request)
    {
        $amendmentDates = $request->input('amendment_date', []);
        $visitNos = $request->input('visit_no', []);
        $parameters = $request->input('parameter', []);
        $amendmentReasons = $request->input('amendment_reason', []);
        $doneByList = $request->input('amendment_done_by', []);
        $originalResults = $request->input('original_result', []);
        $finalResultsLims = $request->input('final_result_lims', []);
        $rowIds = $request->input('row_id', []);

        $location = $request->input('location');
        $department = $request->input('department');

        $savedIds = [];

        foreach ($amendmentDates as $index => $date) {
            // Skip empty rows
            if (empty($date) && empty($visitNos[$index] ?? '') && empty($parameters[$index] ?? '')) {
                continue;
            }

            $rowId = $rowIds[$index] ?? null;

            $data = [
                'doc_no' => 'TDPL/GE/FOM-031',
                'amendment_date' => $date ?: null,
                'visit_no' => $visitNos[$index] ?? null,
                'parameter' => $parameters[$index] ?? null,
                'amendment_reason' => $amendmentReasons[$index] ?? null,
                'amendment_done_by' => $doneByList[$index] ?? null,
                'original_result' => $originalResults[$index] ?? null,
                'final_result_lims' => $finalResultsLims[$index] ?? null,
                'location' => $location,
                'department' => $department,
                'updated_by' => auth()->id(),
            ];

            if ($rowId) {
                // Update existing record
                $record = AmendmentReportMonitoringForm::find($rowId);
                if ($record) {
                    $record->update($data);
                    $savedIds[] = $record->id;
                }
            } else {
                // Create new record (remove duplicates)
                $existing = AmendmentReportMonitoringForm::where('amendment_date', $date)
                    ->where('visit_no', $visitNos[$index] ?? null)
                    ->where('parameter', $parameters[$index] ?? null)
                    ->where('location', $location)
                    ->where('department', $department)
                    ->first();

                if ($existing) {
                    $existing->update($data);
                    $savedIds[] = $existing->id;
                } else {
                    $data['created_by'] = auth()->id();
                    $record = AmendmentReportMonitoringForm::create($data);
                    $savedIds[] = $record->id;
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = AmendmentReportMonitoringForm::whereIn('id', $savedIds)
                ->orderBy('amendment_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Form saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Amendment Report Monitoring Form saved successfully');
    }

    /**
     * Load Amendment Report Monitoring Form records (AJAX)
     */
    public function loadAmendmentReportMonitoringForm(Request $request)
    {
        // Get distinct values for datalists
        $departments = AmendmentReportMonitoringForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = AmendmentReportMonitoringForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        // Build query for records
        $query = AmendmentReportMonitoringForm::query();

        // Date filter logic:
        // - If only from_date selected -> load only that specific date
        // - If both from_date and to_date selected -> load range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            // Both dates: load range
            $query->where('amendment_date', '>=', $request->from_date);
            $query->where('amendment_date', '<=', $request->to_date);
        } elseif ($request->filled('from_date')) {
            // Only from_date: load that specific date only
            $query->where('amendment_date', '=', $request->from_date);
        } elseif ($request->filled('to_date')) {
            // Only to_date: load that specific date only
            $query->where('amendment_date', '=', $request->to_date);
        }

        // Department filter
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        // Location filter
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $records = $query->orderBy('amendment_date', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $records,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * GE: Daily Preparation of 1% Sodium Hypochlorite Solution Form
     * TDPL/GE/FOM-033
     * Monthly form with 31 fixed rows, stores daily_data in JSON
     */
    protected function storeSodiumHypochloritePreparationForm(Request $request)
    {
        $monthYear = $request->month_year;
        $location = $request->location;
        $department = $request->department;

        if (!$monthYear) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Month/Year is required'
                ], 422);
            }
            return back()->with('error', 'Month/Year is required');
        }

        // Collect daily data for 31 days
        $dailyData = [];
        for ($i = 1; $i <= 31; $i++) {
            $dailyData["original_concentration_{$i}"] = $request->input("original_concentration_{$i}");
            $dailyData["quantity_prepared_{$i}"] = $request->input("quantity_prepared_{$i}");
            $dailyData["prepared_by_{$i}"] = $request->input("prepared_by_{$i}");
            $dailyData["verified_by_{$i}"] = $request->input("verified_by_{$i}");
        }

        // Use updateOrCreate to prevent duplicates
        $record = SodiumHypochloritePreparationForm::updateOrCreate(
            [
                'month_year' => $monthYear,
                'location' => $location,
                'department' => $department,
            ],
            [
                'doc_no' => 'TDPL/GE/FOM-033',
                'daily_data' => $dailyData,
                'updated_by' => auth()->id(),
            ]
        );

        if ($record->wasRecentlyCreated) {
            $record->created_by = auth()->id();
            $record->save();
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Form saved successfully'
            ]);
        }

        return back()->with('success', 'Daily Preparation of 1% Sodium Hypochlorite Solution Form saved successfully');
    }

    /**
     * Load Sodium Hypochlorite Preparation Form records (AJAX)
     */
    public function loadSodiumHypochloritePreparationForm(Request $request)
    {
        // Get distinct values for datalists
        $locations = SodiumHypochloritePreparationForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        $departments = SodiumHypochloritePreparationForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        if (!$request->filled('month_year')) {
            return response()->json([
                'success' => false,
                'data' => null,
                'locations' => $locations,
                'departments' => $departments
            ]);
        }

        $query = SodiumHypochloritePreparationForm::where('month_year', $request->month_year);

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        $record = $query->first();

        return response()->json([
            'success' => $record !== null,
            'data' => $record,
            'locations' => $locations,
            'departments' => $departments
        ]);
    }

    /**
     * GE: Deep Freezer Temperature Monitoring Form
     * TDPL/GE/FOM-034
     * Monthly form with 31 fixed rows, stores daily_data in JSON
     */
    protected function storeDeepFreezerTemperatureMonitoringForm(Request $request)
    {
        $monthYear = $request->month_year;
        $department = $request->department;
        $instrumentId = $request->instrument_id;

        if (!$monthYear) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Month/Year is required'
                ], 422);
            }
            return back()->with('error', 'Month/Year is required');
        }

        // Collect daily data for 31 days
        $dailyData = [];
        for ($i = 1; $i <= 31; $i++) {
            $dailyData["morning_temp_{$i}"] = $request->input("morning_temp_{$i}");
            $dailyData["morning_sign_{$i}"] = $request->input("morning_sign_{$i}");
            $dailyData["evening_temp_{$i}"] = $request->input("evening_temp_{$i}");
            $dailyData["evening_sign_{$i}"] = $request->input("evening_sign_{$i}");
        }

        // Use updateOrCreate to prevent duplicates
        $record = DeepFreezerTemperatureMonitoringForm::updateOrCreate(
            [
                'month_year' => $monthYear,
                'department' => $department,
                'instrument_id' => $instrumentId,
            ],
            [
                'doc_no' => 'TDPL/GE/FOM-034',
                'daily_data' => $dailyData,
                'updated_by' => auth()->id(),
            ]
        );

        if ($record->wasRecentlyCreated) {
            $record->created_by = auth()->id();
            $record->save();
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Form saved successfully'
            ]);
        }

        return back()->with('success', 'Deep Freezer Temperature Monitoring Form saved successfully');
    }

    /**
     * Load Deep Freezer Temperature Monitoring Form records (AJAX)
     */
    public function loadDeepFreezerTemperatureMonitoringForm(Request $request)
    {
        // Get distinct values for datalists
        $departments = DeepFreezerTemperatureMonitoringForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $instrumentIds = DeepFreezerTemperatureMonitoringForm::whereNotNull('instrument_id')
            ->where('instrument_id', '!=', '')
            ->distinct()
            ->pluck('instrument_id')
            ->toArray();

        if (!$request->filled('month_year')) {
            return response()->json([
                'success' => false,
                'data' => null,
                'departments' => $departments,
                'instrument_ids' => $instrumentIds
            ]);
        }

        $query = DeepFreezerTemperatureMonitoringForm::where('month_year', $request->month_year);

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('instrument_id')) {
            $query->where('instrument_id', $request->instrument_id);
        }

        $record = $query->first();

        return response()->json([
            'success' => $record !== null,
            'data' => $record,
            'departments' => $departments,
            'instrument_ids' => $instrumentIds
        ]);
    }

    /**
     * GE: Corrective Action & Preventive Action Form for EQAS Outliers
     * TDPL/GE/FOM-035
     * Single record form with complex fields
     */
    protected function storeEqasCapaOutlierForm(Request $request)
    {
        // Collect root cause checklist data
        $rootCauseChecklist = [];
        $rootCauseItems = [
            'iqc_status',
            'preventive_maintenance_status',
            'calibration_status',
            'reagent_status',
            'clerical_error',
            'technical_problem',
            'eqas_sample_problem'
        ];

        foreach ($rootCauseItems as $index => $item) {
            $rootCauseChecklist[$item] = [
                'acceptable' => $request->input("root_cause_{$index}_acceptable") ? true : false,
                'unacceptable' => $request->input("root_cause_{$index}_unacceptable") ? true : false,
            ];
        }

        // Collect re-assay results data
        $reassayResults = [];
        for ($i = 1; $i <= 4; $i++) {
            $reassayResults[$i] = [
                'analyte' => $request->input("analyte_{$i}"),
                'previous_result' => $request->input("previous_result_{$i}"),
                'reassayed_result' => $request->input("reassayed_result_{$i}"),
                'acceptability_limit' => $request->input("acceptability_limit_{$i}"),
            ];
        }

        $data = [
            'doc_no' => 'TDPL/GE/FOM-035',
            'month_year' => $request->month_year,
            'department' => $request->department,
            'location' => $request->location,
            'corrective_action_date' => $request->corrective_action_date ?: null,
            'survey_name' => $request->survey_name,
            'sample_details' => $request->sample_details,
            'sample_run_date' => $request->sample_run_date ?: null,
            'outlier_results' => $request->outlier_results,
            'eqas_trends' => $request->eqas_trends,
            'root_cause_summary' => $request->root_cause_summary,
            'root_cause_checklist' => $rootCauseChecklist,
            'other_root_cause' => $request->other_root_cause,
            'immediate_action' => $request->immediate_action,
            'reassay_results' => $reassayResults,
            'reassay_comment' => $request->reassay_comment,
            'preventive_action' => $request->preventive_action,
            'conclusion' => $request->conclusion,
            'action_taken_by' => $request->action_taken_by,
            'action_approved_by' => $request->action_approved_by,
            'updated_by' => auth()->id(),
        ];

        // Check if editing existing record
        $recordId = $request->input('record_id');

        if ($recordId) {
            $record = EqasCapaOutlierForm::find($recordId);
            if ($record) {
                $record->update($data);
            }
        } else {
            $data['created_by'] = auth()->id();
            $record = EqasCapaOutlierForm::create($data);
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Form saved successfully',
                'data' => $record
            ]);
        }

        return back()->with('success', 'Corrective Action & Preventive Action Form for EQAS Outliers saved successfully');
    }

    /**
     * Load EQAS CAPA Outlier Form records (AJAX)
     */
    public function loadEqasCapaOutlierForm(Request $request)
    {
        // Get distinct values for datalists
        $departments = EqasCapaOutlierForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = EqasCapaOutlierForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        // Build query for records
        $query = EqasCapaOutlierForm::query();

        // Date filter - if only from_date, load that specific date
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->where('corrective_action_date', '>=', $request->from_date);
            $query->where('corrective_action_date', '<=', $request->to_date);
        } elseif ($request->filled('from_date')) {
            $query->where('corrective_action_date', '=', $request->from_date);
        } elseif ($request->filled('to_date')) {
            $query->where('corrective_action_date', '=', $request->to_date);
        }

        // Department filter
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        // Location filter
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $records = $query->orderBy('corrective_action_date', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $records,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * GE: Daily IQC Outlier Non-Conformity & Preventive Action Form
     * TDPL/GE/FOM-036
     * Dynamic rows with date range filter
     */
    protected function storeDailyIqcOutlierNcpaForm(Request $request)
    {
        $outlierDates = $request->input('outlier_date', []);
        $outlierParameters = $request->input('outlier_parameter', []);
        $nonConformities = $request->input('non_conformity', []);
        $rootCauses = $request->input('root_cause', []);
        $correctiveActions = $request->input('corrective_action', []);
        $preventiveActions = $request->input('preventive_action', []);
        $closureDates = $request->input('closure_date', []);
        $signatures = $request->input('signature', []);
        $rowIds = $request->input('row_id', []);

        $location = $request->input('location');
        $department = $request->input('department');

        $savedIds = [];

        foreach ($outlierDates as $index => $date) {
            // Skip empty rows
            if (empty($date) && empty($outlierParameters[$index] ?? '') && empty($nonConformities[$index] ?? '')) {
                continue;
            }

            $rowId = $rowIds[$index] ?? null;

            $data = [
                'doc_no' => 'TDPL/GE/FOM-036',
                'outlier_date' => $date ?: null,
                'outlier_parameter' => $outlierParameters[$index] ?? null,
                'non_conformity' => $nonConformities[$index] ?? null,
                'root_cause' => $rootCauses[$index] ?? null,
                'corrective_action' => $correctiveActions[$index] ?? null,
                'preventive_action' => $preventiveActions[$index] ?? null,
                'closure_date' => $closureDates[$index] ?? null,
                'signature' => $signatures[$index] ?? null,
                'location' => $location,
                'department' => $department,
                'updated_by' => auth()->id(),
            ];

            if ($rowId) {
                // Update existing record
                $record = DailyIqcOutlierNcpaForm::find($rowId);
                if ($record) {
                    $record->update($data);
                    $savedIds[] = $record->id;
                }
            } else {
                // Create new record (remove duplicates)
                $existing = DailyIqcOutlierNcpaForm::where('outlier_date', $date)
                    ->where('outlier_parameter', $outlierParameters[$index] ?? null)
                    ->where('location', $location)
                    ->where('department', $department)
                    ->first();

                if ($existing) {
                    $existing->update($data);
                    $savedIds[] = $existing->id;
                } else {
                    $data['created_by'] = auth()->id();
                    $record = DailyIqcOutlierNcpaForm::create($data);
                    $savedIds[] = $record->id;
                }
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            $savedRecords = DailyIqcOutlierNcpaForm::whereIn('id', $savedIds)
                ->orderBy('outlier_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Form saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', 'Daily IQC Outlier Non-Conformity & Preventive Action Form saved successfully');
    }

    /**
     * Load Daily IQC Outlier NCPA Form records (AJAX)
     */
    public function loadDailyIqcOutlierNcpaForm(Request $request)
    {
        // Get distinct values for datalists
        $departments = DailyIqcOutlierNcpaForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = DailyIqcOutlierNcpaForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        // Build query for records
        $query = DailyIqcOutlierNcpaForm::query();

        // Date filter logic
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->where('outlier_date', '>=', $request->from_date);
            $query->where('outlier_date', '<=', $request->to_date);
        } elseif ($request->filled('from_date')) {
            $query->where('outlier_date', '=', $request->from_date);
        } elseif ($request->filled('to_date')) {
            $query->where('outlier_date', '=', $request->to_date);
        }

        // Department filter
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        // Location filter
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $records = $query->orderBy('outlier_date', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $records,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * GE: Authorized Persons on Software Form
     * TDPL/GE/FOM-037
     * Fixed rows form with 15 entries, stores daily_data in JSON
     */
    protected function storeAuthorizedSoftwarePersonsForm(Request $request)
    {
        $monthYear = $request->month_year;
        $location = $request->location;
        $department = $request->department;

        if (!$monthYear) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Month/Year is required'
                ], 422);
            }
            return back()->with('error', 'Month/Year is required');
        }

        // Collect data for 15 rows
        $dailyData = [];
        for ($i = 1; $i <= 15; $i++) {
            $dailyData["software_name_{$i}"] = $request->input("software_name_{$i}");
            $dailyData["authorized_person_{$i}"] = $request->input("authorized_person_{$i}");
            $dailyData["signature_{$i}"] = $request->input("signature_{$i}");
        }

        // Use updateOrCreate to prevent duplicates
        $record = AuthorizedSoftwarePersonsForm::updateOrCreate(
            [
                'month_year' => $monthYear,
                'location' => $location,
                'department' => $department,
            ],
            [
                'doc_no' => 'TDPL/GE/FOM-037',
                'daily_data' => $dailyData,
                'updated_by' => auth()->id(),
            ]
        );

        if ($record->wasRecentlyCreated) {
            $record->created_by = auth()->id();
            $record->save();
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Form saved successfully'
            ]);
        }

        return back()->with('success', 'Authorized Persons on Software Form saved successfully');
    }

    /**
     * Load Authorized Software Persons Form records (AJAX)
     */
    public function loadAuthorizedSoftwarePersonsForm(Request $request)
    {
        // Get distinct values for datalists
        $locations = AuthorizedSoftwarePersonsForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        $departments = AuthorizedSoftwarePersonsForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        if (!$request->filled('month_year')) {
            return response()->json([
                'success' => false,
                'data' => null,
                'locations' => $locations,
                'departments' => $departments
            ]);
        }

        $query = AuthorizedSoftwarePersonsForm::where('month_year', $request->month_year);

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        $record = $query->first();

        return response()->json([
            'success' => $record !== null,
            'data' => $record,
            'locations' => $locations,
            'departments' => $departments
        ]);
    }

    /**
     * GE: Authorized Personnel for Handling the Instruments Form
     * TDPL/GE/FOM-038
     * Fixed rows form with 30 entries, stores daily_data in JSON
     */
    protected function storeAuthorizedInstrumentPersonnelForm(Request $request)
    {
        $monthYear = $request->month_year;
        $location = $request->location;
        $department = $request->department;

        if (!$monthYear) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Month/Year is required'
                ], 422);
            }
            return back()->with('error', 'Month/Year is required');
        }

        // Collect data for 30 rows
        $dailyData = [];
        for ($i = 1; $i <= 30; $i++) {
            $dailyData["employee_name_{$i}"] = $request->input("employee_name_{$i}");
            $dailyData["instruments_{$i}"] = $request->input("instruments_{$i}");
            $dailyData["designation_{$i}"] = $request->input("designation_{$i}");
            $dailyData["signature_{$i}"] = $request->input("signature_{$i}");
        }

        // Use updateOrCreate to prevent duplicates
        $record = AuthorizedInstrumentPersonnelForm::updateOrCreate(
            [
                'month_year' => $monthYear,
                'location' => $location,
                'department' => $department,
            ],
            [
                'doc_no' => 'TDPL/GE/FOM-038',
                'daily_data' => $dailyData,
                'updated_by' => auth()->id(),
            ]
        );

        if ($record->wasRecentlyCreated) {
            $record->created_by = auth()->id();
            $record->save();
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Form saved successfully'
            ]);
        }

        return back()->with('success', 'Authorized Personnel for Handling the Instruments Form saved successfully');
    }

    /**
     * Load Authorized Instrument Personnel Form records (AJAX)
     */
    public function loadAuthorizedInstrumentPersonnelForm(Request $request)
    {
        // Get distinct values for datalists
        $locations = AuthorizedInstrumentPersonnelForm::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        $departments = AuthorizedInstrumentPersonnelForm::whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department')
            ->toArray();

        if (!$request->filled('month_year')) {
            return response()->json([
                'success' => false,
                'data' => null,
                'locations' => $locations,
                'departments' => $departments
            ]);
        }

        $query = AuthorizedInstrumentPersonnelForm::where('month_year', $request->month_year);

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        $record = $query->first();

        return response()->json([
            'success' => $record !== null,
            'data' => $record,
            'locations' => $locations,
            'departments' => $departments
        ]);
    }

    /**
     * GE: Minutes of Meeting Form
     * TDPL/GE/FOM-039
     * Event-based form with meeting date as unique identifier
     */
    protected function storeMinutesOfMeetingForm(Request $request)
    {
        $meetingDate = $request->meeting_date;

        if (!$meetingDate) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Meeting Date is required'
                ], 422);
            }
            return back()->with('error', 'Meeting Date is required');
        }

        // Collect present attendees (3 entries)
        $presentAttendees = [];
        for ($i = 1; $i <= 3; $i++) {
            $presentAttendees[] = $request->input("present_name_{$i}");
        }

        // Collect absent attendees with reasons (2 entries)
        $absentAttendees = [];
        for ($i = 1; $i <= 2; $i++) {
            $absentAttendees[] = [
                'name' => $request->input("absent_name_{$i}"),
                'reason' => $request->input("absent_reason_{$i}")
            ];
        }

        // Collect previous meeting actions (4 rows)
        $previousMeetingActions = [];
        for ($i = 1; $i <= 4; $i++) {
            $previousMeetingActions[] = [
                'action' => $request->input("prev_action_{$i}"),
                'responsible_person' => $request->input("prev_responsible_{$i}"),
                'target_date' => $request->input("prev_target_date_{$i}"),
                'status' => $request->input("prev_status_{$i}")
            ];
        }

        // Collect present meeting actions (4 rows)
        $presentMeetingActions = [];
        for ($i = 1; $i <= 4; $i++) {
            $presentMeetingActions[] = [
                'action' => $request->input("curr_action_{$i}"),
                'responsible_person' => $request->input("curr_responsible_{$i}"),
                'target_date' => $request->input("curr_target_date_{$i}"),
                'status' => $request->input("curr_status_{$i}")
            ];
        }

        // Determine overall performance
        $overallPerformance = null;
        if ($request->input('satisfactory')) {
            $overallPerformance = 'Satisfactory';
        } elseif ($request->input('needs_improvement')) {
            $overallPerformance = 'Needs Improvement';
        }

        // Use updateOrCreate to prevent duplicates based on meeting date
        $record = MinutesOfMeetingForm::updateOrCreate(
            [
                'meeting_date' => $meetingDate,
            ],
            [
                'doc_no' => 'TDPL/GE/FOM-039',
                'venue' => $request->venue,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'present_attendees' => $presentAttendees,
                'absent_attendees' => $absentAttendees,
                'previous_meeting_actions' => $previousMeetingActions,
                'summary_discussions' => $request->summary_discussions,
                'decisions_made' => $request->decisions_made,
                'present_meeting_actions' => $presentMeetingActions,
                'overall_performance' => $overallPerformance,
                'additional_remarks' => $request->additional_remarks,
                'next_review_date' => $request->next_review_date,
                'chairperson_name' => $request->chairperson_name,
                'chairperson_date' => $request->chairperson_date,
                'recorder_name' => $request->recorder_name,
                'recorder_date' => $request->recorder_date,
                'updated_by' => auth()->id(),
            ]
        );

        if ($record->wasRecentlyCreated) {
            $record->created_by = auth()->id();
            $record->save();
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Minutes of Meeting saved successfully'
            ]);
        }

        return back()->with('success', 'Minutes of Meeting Form saved successfully');
    }

    /**
     * Load Minutes of Meeting Form records (AJAX)
     */
    public function loadMinutesOfMeetingForm(Request $request)
    {
        if (!$request->filled('meeting_date')) {
            return response()->json([
                'success' => false,
                'data' => null
            ]);
        }

        $record = MinutesOfMeetingForm::where('meeting_date', $request->meeting_date)->first();

        return response()->json([
            'success' => $record !== null,
            'data' => $record
        ]);
    }

    /**
     * GE: Test Requisition Form
     * TDPL/GE/FOM-040
     * Transactional form - each submission creates new record
     */
    protected function storeTestRequisitionForm(Request $request)
    {
        // Collect test details for 6 rows
        $testDetails = [];
        for ($i = 1; $i <= 6; $i++) {
            $testDetails[] = [
                'test_code' => $request->input("test_code_{$i}"),
                'test_description' => $request->input("test_description_{$i}"),
                'sample_type' => $request->input("sample_type_{$i}"),
                'barcode_sin' => $request->input("barcode_sin_{$i}")
            ];
        }

        $payload = [
            'doc_no' => 'TDPL/GE/FOM-040',
            'requisition_date' => $request->requisition_date,
            'client_name' => $request->client_name,
            'client_code' => $request->client_code,
            'patient_name' => $request->patient_name,
            'mobile_no' => $request->mobile_no,
            'email_id' => $request->email_id,
            'date_of_birth' => $request->date_of_birth,
            'age_years' => $request->age_years,
            'age_months' => $request->age_months,
            'age_days' => $request->age_days,
            'gender' => $request->gender,
            'referring_doctor' => $request->referring_doctor,
            'address_contact' => $request->address_contact,
            'sample_drawn_date' => $request->sample_drawn_date,
            'sample_drawn_time' => $request->sample_drawn_time,
            'sample_drawn_ampm' => $request->sample_drawn_ampm,
            'lmp_date' => $request->lmp_date,
            'sample_shipment_date' => $request->sample_shipment_date,
            'no_of_containers' => $request->no_of_containers,
            'test_details' => $testDetails,
            'clinical_history' => $request->clinical_history,
            'temp_sent_18_24' => $request->temp_sent_18_24,
            'temp_sent_2_8' => $request->temp_sent_2_8,
            'temp_sent_below_0' => $request->temp_sent_below_0,
            'temp_received_18_24' => $request->temp_received_18_24,
            'temp_received_2_8' => $request->temp_received_2_8,
            'temp_received_below_0' => $request->temp_received_below_0,
            'specimen_received_datetime' => $request->specimen_received_datetime,
            'no_of_samples' => $request->no_of_samples,
            'transported_by' => $request->transported_by,
            'received_by' => $request->received_by,
            'received_time' => $request->received_time,
            'updated_by' => auth()->id(),
        ];

        $record = null;

        if ($request->filled('test_requisition_form_id')) {
            // UPDATE existing record
            TestRequisitionForm::where('id', $request->test_requisition_form_id)
                ->update($payload);
            $record = TestRequisitionForm::find($request->test_requisition_form_id);
        } else {
            // CREATE new record
            $record = TestRequisitionForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Test Requisition Form saved successfully',
                'data' => $record
            ]);
        }

        return back()->with('success', 'Test Requisition Form saved successfully');
    }

    /**
     * Load Test Requisition Form records (AJAX)
     */
    public function loadTestRequisitionForm(Request $request)
    {
        $query = TestRequisitionForm::query();

        // Date range filter
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('requisition_date', [$request->from_date, $request->to_date]);
        } elseif ($request->filled('from_date')) {
            $query->where('requisition_date', $request->from_date);
        }

        // Patient name filter
        if ($request->filled('patient_name')) {
            $query->where('patient_name', 'like', '%' . $request->patient_name . '%');
        }

        $records = $query->orderBy('requisition_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $records
        ]);
    }

    /**
     * GE: Split Sample Analysis Form
     * TDPL/GE/FOM-044
     * Stores form with multiple rows (parent-child relationship)
     */
    protected function storeSplitSampleAnalysisForm(Request $request)
    {
        $department = $request->department;
        $location = $request->location;

        // Create or update parent form
        $formId = $request->split_sample_analysis_form_id;

        $payload = [
            'doc_no'     => $request->doc_no,
            'department' => $department,
            'location'   => $location,
        ];

        if ($formId) {
            // UPDATE existing form
            $form = SplitSampleAnalysisForm::find($formId);
            if ($form) {
                $form->update(array_merge($payload, [
                    'updated_by' => auth()->id(),
                ]));
                // Delete old rows and insert new ones
                $form->rows()->delete();
            }
        } else {
            // CREATE new form
            $form = SplitSampleAnalysisForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        // Save rows
        if ($form && is_array($request->rows)) {
            foreach ($request->rows as $rowNumber => $row) {
                // Only save rows that have at least test_name filled
                if (!empty($row['test_name'])) {
                    SplitSampleAnalysisRow::create([
                        'split_sample_analysis_form_id' => $form->id,
                        'row_number'   => $rowNumber,
                        'test_name'    => $row['test_name'] ?? null,
                        'tech1_result' => $row['tech1_result'] ?? null,
                        'tech2_result' => $row['tech2_result'] ?? null,
                        'correlation'  => $row['correlation'] ?? null,
                        'remarks'      => $row['remarks'] ?? null,
                        'signature'    => $row['signature'] ?? null,
                    ]);
                }
            }
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Split Sample Analysis Form saved successfully',
                'form_id' => $form->id ?? null
            ]);
        }

        return back()->with('success', 'Split Sample Analysis Form saved successfully');
    }

    /**
     * LOAD Split Sample Analysis Form data based on filters
     */
    public function loadSplitSampleAnalysisForm(Request $request)
    {
        $query = SplitSampleAnalysisForm::with('rows');

        // Date range filter
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('created_at', [
                $request->from_date . ' 00:00:00',
                $request->to_date . ' 23:59:59'
            ]);
        }

        // Department filter
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        // Location filter
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        // Correlation filter (search in rows)
        if ($request->filled('correlation')) {
            $query->whereHas('rows', function ($q) use ($request) {
                $q->where('correlation', $request->correlation);
            });
        }

        // Test name search (search in rows)
        if ($request->filled('test_name')) {
            $query->whereHas('rows', function ($q) use ($request) {
                $q->where('test_name', 'like', '%' . $request->test_name . '%');
            });
        }

        $records = $query->orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $records
        ]);
    }

    /**
     * GE: Reagent & Consumables Consumption Form
     * TDPL/GE/FOM-047
     * Each row is saved as individual record for better filtering
     * Follows same pattern as NiU-Transcription Check Form
     */
    protected function storeReagentConsumablesConsumptionForm(Request $request)
    {
        $department = $request->department;
        $location = $request->location;

        $consumptionDates = $request->input('consumption_date', []);
        $reagentNames = $request->input('reagent_name', []);
        $quantities = $request->input('quantity', []);
        $lotNos = $request->input('lot_no', []);
        $expiryDates = $request->input('expiry_date', []);
        $rowIds = $request->input('row_id', []);

        $savedRecords = [];

        foreach ($consumptionDates as $index => $consumptionDate) {
            $reagentName = $reagentNames[$index] ?? null;
            $quantity = $quantities[$index] ?? null;
            $lotNo = $lotNos[$index] ?? null;
            $expiryDate = $expiryDates[$index] ?? null;
            $rowId = $rowIds[$index] ?? null;

            // Skip empty rows
            if (empty($consumptionDate) && empty($reagentName)) {
                continue;
            }

            $payload = [
                'doc_no'           => $request->doc_no,
                'department'       => $department,
                'location'         => $location,
                'consumption_date' => $consumptionDate ?: null,
                'reagent_name'     => $reagentName,
                'quantity'         => $quantity,
                'lot_no'           => $lotNo,
                'expiry_date'      => $expiryDate ?: null,
            ];

            if ($rowId) {
                // UPDATE existing record
                $record = ReagentConsumablesConsumptionForm::find($rowId);
                if ($record) {
                    $record->update(array_merge($payload, ['updated_by' => auth()->id()]));
                    $savedRecords[] = $record->fresh();
                }
            } else {
                // CREATE new record
                $record = ReagentConsumablesConsumptionForm::create(array_merge($payload, ['created_by' => auth()->id()]));
                $savedRecords[] = $record;
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => count($savedRecords) . ' record(s) saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', count($savedRecords) . ' record(s) saved successfully');
    }

    /**
     * LOAD Reagent & Consumables Consumption Form data based on filters
     * Follows same pattern as NiU-Transcription Check Form
     */
    public function loadReagentConsumablesConsumptionForm(Request $request)
    {
        $query = ReagentConsumablesConsumptionForm::query();

        // Date filter logic:
        // - If only from_date: load records for that specific date only
        // - If both from_date and to_date: load records in that range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            // Range filter
            $query->whereBetween('consumption_date', [
                $request->from_date,
                $request->to_date
            ]);
        } elseif ($request->filled('from_date')) {
            // Single date filter - only that date
            $query->whereDate('consumption_date', $request->from_date);
        } elseif ($request->filled('to_date')) {
            // Only to_date selected - load records up to that date
            $query->whereDate('consumption_date', $request->to_date);
        }

        // Department filter
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        // Location filter
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        // Reagent name search
        if ($request->filled('reagent_name')) {
            $query->where('reagent_name', 'like', '%' . $request->reagent_name . '%');
        }

        // Lot number search
        if ($request->filled('lot_no')) {
            $query->where('lot_no', 'like', '%' . $request->lot_no . '%');
        }

        $records = $query->orderBy('consumption_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Get unique departments and locations for datalist updates
        $departments = ReagentConsumablesConsumptionForm::whereNotNull('department')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = ReagentConsumablesConsumptionForm::whereNotNull('location')
            ->distinct()
            ->pluck('location')
            ->toArray();

        return response()->json([
            'success' => true,
            'data' => $records,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * GE: Shift Handover Register
     * TDPL/GE/REG-001
     * Follows same pattern as NiU-Transcription Check Form
     */
    protected function storeShiftHandoverRegister(Request $request)
    {
        $department = $request->department;
        $location = $request->location;

        $handoverDates = $request->input('handover_date', []);
        $barcodes = $request->input('barcode', []);
        $testNames = $request->input('test_name', []);
        $noOfSamples = $request->input('no_of_samples', []);
        $pendingReasons = $request->input('pending_reason', []);
        $handoverBys = $request->input('handover_by', []);
        $receivedBys = $request->input('received_by', []);
        $remarksArr = $request->input('remarks', []);
        $rowIds = $request->input('row_id', []);

        $savedRecords = [];

        foreach ($handoverDates as $index => $handoverDate) {
            $barcode = $barcodes[$index] ?? null;
            $testName = $testNames[$index] ?? null;
            $samples = $noOfSamples[$index] ?? null;
            $pendingReason = $pendingReasons[$index] ?? null;
            $handoverBy = $handoverBys[$index] ?? null;
            $receivedBy = $receivedBys[$index] ?? null;
            $remark = $remarksArr[$index] ?? null;
            $rowId = $rowIds[$index] ?? null;

            // Skip empty rows
            if (empty($handoverDate) && empty($barcode) && empty($testName)) {
                continue;
            }

            $payload = [
                'doc_no'         => $request->doc_no,
                'department'     => $department,
                'location'       => $location,
                'handover_date'  => $handoverDate ?: null,
                'barcode'        => $barcode,
                'test_name'      => $testName,
                'no_of_samples'  => $samples,
                'pending_reason' => $pendingReason,
                'handover_by'    => $handoverBy,
                'received_by'    => $receivedBy,
                'remarks'        => $remark,
            ];

            if ($rowId) {
                // UPDATE existing record
                $record = ShiftHandoverRegister::find($rowId);
                if ($record) {
                    $record->update(array_merge($payload, ['updated_by' => auth()->id()]));
                    $savedRecords[] = $record->fresh();
                }
            } else {
                // CREATE new record
                $record = ShiftHandoverRegister::create(array_merge($payload, ['created_by' => auth()->id()]));
                $savedRecords[] = $record;
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => count($savedRecords) . ' record(s) saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', count($savedRecords) . ' record(s) saved successfully');
    }

    /**
     * LOAD Shift Handover Register data based on filters
     */
    public function loadShiftHandoverRegister(Request $request)
    {
        $query = ShiftHandoverRegister::query();

        // Date filter logic:
        // - If only from_date: load records for that specific date only
        // - If both from_date and to_date: load records in that range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('handover_date', [
                $request->from_date,
                $request->to_date
            ]);
        } elseif ($request->filled('from_date')) {
            $query->whereDate('handover_date', $request->from_date);
        } elseif ($request->filled('to_date')) {
            $query->whereDate('handover_date', $request->to_date);
        }

        // Department filter
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        // Location filter
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        // Barcode search
        if ($request->filled('barcode')) {
            $query->where('barcode', 'like', '%' . $request->barcode . '%');
        }

        // Test name search
        if ($request->filled('test_name')) {
            $query->where('test_name', 'like', '%' . $request->test_name . '%');
        }

        $records = $query->orderBy('handover_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Get unique departments and locations for datalist updates
        $departments = ShiftHandoverRegister::whereNotNull('department')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = ShiftHandoverRegister::whereNotNull('location')
            ->distinct()
            ->pluck('location')
            ->toArray();

        return response()->json([
            'success' => true,
            'data' => $records,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * GE: Department Sample Storage & Discard Register
     * TDPL/GE/REG-002
     * Follows same pattern as NiU-Transcription Check Form
     */
    protected function storeDepartmentSampleStorageRegister(Request $request)
    {
        $department = $request->department;
        $location = $request->location;

        $barcodes = $request->input('barcode', []);
        $sampleReceivedDates = $request->input('sample_received_date', []);
        $sampleDiscardDates = $request->input('sample_discard_date', []);
        $discardBys = $request->input('discard_by', []);
        $reviewedBys = $request->input('reviewed_by', []);
        $rowIds = $request->input('row_id', []);

        $savedRecords = [];

        foreach ($barcodes as $index => $barcode) {
            $sampleReceivedDate = $sampleReceivedDates[$index] ?? null;
            $sampleDiscardDate = $sampleDiscardDates[$index] ?? null;
            $discardBy = $discardBys[$index] ?? null;
            $reviewedBy = $reviewedBys[$index] ?? null;
            $rowId = $rowIds[$index] ?? null;

            // Skip empty rows
            if (empty($barcode) && empty($sampleReceivedDate)) {
                continue;
            }

            $payload = [
                'doc_no'              => $request->doc_no,
                'department'          => $department,
                'location'            => $location,
                'barcode'             => $barcode,
                'sample_received_date' => $sampleReceivedDate ?: null,
                'sample_discard_date'  => $sampleDiscardDate ?: null,
                'discard_by'          => $discardBy,
                'reviewed_by'         => $reviewedBy,
            ];

            if ($rowId) {
                // UPDATE existing record
                $record = DepartmentSampleStorageRegister::find($rowId);
                if ($record) {
                    $record->update(array_merge($payload, ['updated_by' => auth()->id()]));
                    $savedRecords[] = $record->fresh();
                }
            } else {
                // CREATE new record
                $record = DepartmentSampleStorageRegister::create(array_merge($payload, ['created_by' => auth()->id()]));
                $savedRecords[] = $record;
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => count($savedRecords) . ' record(s) saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', count($savedRecords) . ' record(s) saved successfully');
    }

    /**
     * LOAD Department Sample Storage & Discard Register data based on filters
     */
    public function loadDepartmentSampleStorageRegister(Request $request)
    {
        $query = DepartmentSampleStorageRegister::query();

        // Date filter logic:
        // - If only from_date: load records for that specific date only
        // - If both from_date and to_date: load records in that range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('sample_received_date', [
                $request->from_date,
                $request->to_date
            ]);
        } elseif ($request->filled('from_date')) {
            $query->whereDate('sample_received_date', $request->from_date);
        } elseif ($request->filled('to_date')) {
            $query->whereDate('sample_received_date', $request->to_date);
        }

        // Department filter
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        // Location filter
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        // Barcode search
        if ($request->filled('barcode')) {
            $query->where('barcode', 'like', '%' . $request->barcode . '%');
        }

        $records = $query->orderBy('sample_received_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Get unique departments and locations for datalist updates
        $departments = DepartmentSampleStorageRegister::whereNotNull('department')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = DepartmentSampleStorageRegister::whereNotNull('location')
            ->distinct()
            ->pluck('location')
            ->toArray();

        return response()->json([
            'success' => true,
            'data' => $records,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * GE: Sample Integrity Register
     * TDPL/GE/REG-003
     * Follows same pattern as NiU-Transcription Check Form
     */
    protected function storeSampleIntegrityRegister(Request $request)
    {
        $department = $request->department;
        $location = $request->location;

        $checkDates = $request->input('check_date', []);
        $sampleIds = $request->input('sample_id', []);
        $testParameters = $request->input('test_parameter', []);
        $initialResults = $request->input('initial_result', []);
        $nextDayResults = $request->input('next_day_result', []);
        $percentDifferences = $request->input('percent_difference', []);
        $isVariationAccepted = $request->input('is_variation_accepted', []);
        $doneBys = $request->input('done_by', []);
        $verifiedBys = $request->input('verified_by', []);
        $rowIds = $request->input('row_id', []);

        $savedRecords = [];

        foreach ($checkDates as $index => $checkDate) {
            $sampleId = $sampleIds[$index] ?? null;
            $testParameter = $testParameters[$index] ?? null;
            $initialResult = $initialResults[$index] ?? null;
            $nextDayResult = $nextDayResults[$index] ?? null;
            $percentDiff = $percentDifferences[$index] ?? null;
            $variationAccepted = $isVariationAccepted[$index] ?? null;
            $doneBy = $doneBys[$index] ?? null;
            $verifiedBy = $verifiedBys[$index] ?? null;
            $rowId = $rowIds[$index] ?? null;

            // Skip empty rows
            if (empty($checkDate) && empty($sampleId)) {
                continue;
            }

            // Calculate % difference if both results are provided
            if (is_numeric($initialResult) && is_numeric($nextDayResult) && $initialResult != 0) {
                $percentDiff = round((($initialResult - $nextDayResult) / $initialResult) * 100, 2);
            }

            $payload = [
                'doc_no'               => $request->doc_no,
                'department'           => $department,
                'location'             => $location,
                'check_date'           => $checkDate ?: null,
                'sample_id'            => $sampleId,
                'test_parameter'       => $testParameter,
                'initial_result'       => $initialResult,
                'next_day_result'      => $nextDayResult,
                'percent_difference'   => $percentDiff,
                'is_variation_accepted' => $variationAccepted,
                'done_by'              => $doneBy,
                'verified_by'          => $verifiedBy,
            ];

            if ($rowId) {
                // UPDATE existing record
                $record = SampleIntegrityRegister::find($rowId);
                if ($record) {
                    $record->update(array_merge($payload, ['updated_by' => auth()->id()]));
                    $savedRecords[] = $record->fresh();
                }
            } else {
                // CREATE new record
                $record = SampleIntegrityRegister::create(array_merge($payload, ['created_by' => auth()->id()]));
                $savedRecords[] = $record;
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => count($savedRecords) . ' record(s) saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', count($savedRecords) . ' record(s) saved successfully');
    }

    /**
     * LOAD Sample Integrity Register data based on filters
     */
    public function loadSampleIntegrityRegister(Request $request)
    {
        $query = SampleIntegrityRegister::query();

        // Date filter logic:
        // - If only from_date: load records for that specific date only
        // - If both from_date and to_date: load records in that range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('check_date', [
                $request->from_date,
                $request->to_date
            ]);
        } elseif ($request->filled('from_date')) {
            $query->whereDate('check_date', $request->from_date);
        } elseif ($request->filled('to_date')) {
            $query->whereDate('check_date', $request->to_date);
        }

        // Department filter
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        // Location filter
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        // Sample ID search
        if ($request->filled('sample_id')) {
            $query->where('sample_id', 'like', '%' . $request->sample_id . '%');
        }

        // Variation accepted filter
        if ($request->filled('is_variation_accepted')) {
            $query->where('is_variation_accepted', $request->is_variation_accepted);
        }

        $records = $query->orderBy('check_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Get unique departments and locations for datalist updates
        $departments = SampleIntegrityRegister::whereNotNull('department')
            ->distinct()
            ->pluck('department')
            ->toArray();

        $locations = SampleIntegrityRegister::whereNotNull('location')
            ->distinct()
            ->pluck('location')
            ->toArray();

        return response()->json([
            'success' => true,
            'data' => $records,
            'departments' => $departments,
            'locations' => $locations
        ]);
    }

    /**
     * GE: Inter-Department Sample Transfer Register
     * TDPL/GE/REG-005
     * Follows same pattern as NiU-Transcription Check Form
     */
    protected function storeInterDepartmentSampleTransferRegister(Request $request)
    {
        $location = $request->location;

        $barcodes = $request->input('barcode', []);
        $receivedDatetimes = $request->input('sample_received_datetime', []);
        $parameters = $request->input('parameter', []);
        $fromDepartments = $request->input('from_department', []);
        $toDepartments = $request->input('to_department', []);
        $processedDatetimes = $request->input('sample_processed_datetime', []);
        $handedOverBys = $request->input('handed_over_by', []);
        $receivingSigns = $request->input('receiving_sign', []);
        $verifiedBys = $request->input('verified_by', []);
        $rowIds = $request->input('row_id', []);

        $savedRecords = [];

        foreach ($barcodes as $index => $barcode) {
            $receivedDatetime = $receivedDatetimes[$index] ?? null;
            $parameter = $parameters[$index] ?? null;
            $fromDepartment = $fromDepartments[$index] ?? null;
            $toDepartment = $toDepartments[$index] ?? null;
            $processedDatetime = $processedDatetimes[$index] ?? null;
            $handedOverBy = $handedOverBys[$index] ?? null;
            $receivingSign = $receivingSigns[$index] ?? null;
            $verifiedBy = $verifiedBys[$index] ?? null;
            $rowId = $rowIds[$index] ?? null;

            // Skip empty rows
            if (empty($barcode) && empty($receivedDatetime)) {
                continue;
            }

            $payload = [
                'doc_no'                    => $request->doc_no,
                'location'                  => $location,
                'barcode'                   => $barcode,
                'sample_received_datetime'  => $receivedDatetime ?: null,
                'parameter'                 => $parameter,
                'from_department'           => $fromDepartment,
                'to_department'             => $toDepartment,
                'sample_processed_datetime' => $processedDatetime ?: null,
                'handed_over_by'            => $handedOverBy,
                'receiving_sign'            => $receivingSign,
                'verified_by'               => $verifiedBy,
            ];

            if ($rowId) {
                // UPDATE existing record
                $record = InterDepartmentSampleTransferRegister::find($rowId);
                if ($record) {
                    $record->update(array_merge($payload, ['updated_by' => auth()->id()]));
                    $savedRecords[] = $record->fresh();
                }
            } else {
                // CREATE new record
                $record = InterDepartmentSampleTransferRegister::create(array_merge($payload, ['created_by' => auth()->id()]));
                $savedRecords[] = $record;
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => count($savedRecords) . ' record(s) saved successfully',
                'data' => $savedRecords
            ]);
        }

        return back()->with('success', count($savedRecords) . ' record(s) saved successfully');
    }

    /**
     * LOAD Inter-Department Sample Transfer Register data based on filters
     */
    public function loadInterDepartmentSampleTransferRegister(Request $request)
    {
        $query = InterDepartmentSampleTransferRegister::query();

        // Date filter logic:
        // - If only from_date: load records for that specific date only
        // - If both from_date and to_date: load records in that range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('sample_received_datetime', [
                $request->from_date . ' 00:00:00',
                $request->to_date . ' 23:59:59'
            ]);
        } elseif ($request->filled('from_date')) {
            $query->whereDate('sample_received_datetime', $request->from_date);
        } elseif ($request->filled('to_date')) {
            $query->whereDate('sample_received_datetime', $request->to_date);
        }

        // From Department filter
        if ($request->filled('from_department')) {
            $query->where('from_department', $request->from_department);
        }

        // To Department filter
        if ($request->filled('to_department')) {
            $query->where('to_department', $request->to_department);
        }

        // Location filter
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        // Barcode search
        if ($request->filled('barcode')) {
            $query->where('barcode', 'like', '%' . $request->barcode . '%');
        }

        $records = $query->orderBy('sample_received_datetime', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Get unique departments for datalist updates
        $fromDepartments = InterDepartmentSampleTransferRegister::whereNotNull('from_department')
            ->distinct()
            ->pluck('from_department')
            ->toArray();

        $toDepartments = InterDepartmentSampleTransferRegister::whereNotNull('to_department')
            ->distinct()
            ->pluck('to_department')
            ->toArray();

        $locations = InterDepartmentSampleTransferRegister::whereNotNull('location')
            ->distinct()
            ->pluck('location')
            ->toArray();

        return response()->json([
            'success' => true,
            'data' => $records,
            'from_departments' => $fromDepartments,
            'to_departments' => $toDepartments,
            'locations' => $locations
        ]);
    }
}
