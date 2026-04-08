<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonnelValidationRecord;
use App\Models\CorrectivePreventiveLog;
use App\Models\CriticalCallMonitoringLog;
use App\Models\DailyCleaningChecklist;
use App\Models\DocumentChecklist;
use App\Models\RestRoomCleanlinessLog;
use Illuminate\Support\Facades\Validator;
use App\Models\SodiumHypochloriteLog;
use App\Models\Instrument;
use App\Models\RefrigerationTemperatureLog;
use App\Models\DeepFreezerTemperatureLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GeneralFormsController extends Controller
{
    // Submit log data
    public function store10(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'department_name' => 'required|string',
            'test_validation' => 'nullable|string',
            'method' => 'nullable|string',
            'person_involved' => 'nullable|string',
            'logs' => 'required|array',
        ]);

        foreach ($request->logs as $log) {
            // Check if any of the fields have data
            $hasData = false;
            $fields = [
                'barcode_no',
                'visit_id_no',
                'result_a',
                'result_b',
                'acceptable_unacceptable',
            ];

            foreach ($fields as $field) {
                if (!empty($log[$field])) {
                    $hasData = true;
                    break;
                }
            }

            // Only save the log if at least one field has data
            if ($hasData) {
                PersonnelValidationRecord::create([
                    'date' => $request->date,
                    'department_name' => $request->department_name,
                    'test_validation' => $request->test_validation,
                    'method' => $request->method,
                    'person_involved' => $request->person_involved,
                    'barcode_no' => $log['barcode_no'] ?? null,
                    'visit_id_no' => $log['visit_id_no'] ?? null,
                    'result_a' => $log['result_a'] ?? null,
                    'result_b' => $log['result_b'] ?? null,
                    'acceptable_unacceptable' => $log['acceptable_unacceptable'] ?? null,
                ]);
            }
        }
        return response()->json(['message' => 'Log saved successfully!'], 200);
    }

    // Fetch log data
    public function fetch10(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $logs = PersonnelValidationRecord::where('date', $request->date)->get();

        return response()->json(['logs' => $logs], 200);
    }



    public function store11(Request $request)
    {
        $request->validate([
            'date_of_action' => 'required|date',
            'survey_name' => 'required|string',
            'sample_details' => 'nullable|string',
            'eqas_sample_run_date' => 'nullable|date',
            'outlier_results' => 'nullable|string',
            'eqas_trends' => 'nullable|string',
            'root_cause_analysis' => 'nullable|array',
            'other_specify' => 'nullable|string',
            'immediate_action_taken' => 'nullable|string',
            're_assayed_results' => 'nullable|array',
            'comment_on_re_assayed_results' => 'nullable|string',
            'preventive_action' => 'nullable|string',
            'documents_attached' => 'nullable|string',
            'conclusion' => 'nullable|string',
            'corrective_action_taken_by' => 'nullable|string',
            'corrective_action_reviewed_by' => 'nullable|string',
            'remark' => 'nullable|string',
        ]);

        CorrectivePreventiveLog::create($request->all());

        return response()->json(['message' => 'Log saved successfully!'], 200);
    }

    // Fetch log data
    public function fetch11(Request $request)
    {
        $request->validate([
            'date_of_action' => 'required|date',
        ]);

        $logs = CorrectivePreventiveLog::where('date_of_action', $request->date_of_action)->get();

        return response()->json(['logs' => $logs], 200);
    }


    public function storeCriticalCallLog(Request $request)
    {
        $validated = $request->validate([
            'month_year' => 'required|date_format:Y-m',
            'logs' => 'required|array|min:1',
            'logs.*.date' => 'required|date',
            'logs.*.patient_id' => 'nullable|string|max:255',
            'logs.*.test_parameter' => 'nullable|string|max:255',
            'logs.*.initial_value' => 'nullable|string|max:255',
            'logs.*.cross_check_value' => 'nullable|string|max:255',
            'logs.*.reporting_time' => 'nullable|string|max:255',
            'logs.*.concern_clinician_patient_informed' => 'nullable|string|max:255',
            'logs.*.readback_value' => 'nullable|string|max:255',
            'logs.*.time_of_informing' => 'nullable|string|max:255',
            'logs.*.signature_of_person_informing' => 'nullable|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            // First delete existing logs for this month/year
            CriticalCallMonitoringLog::where('month_year', 'like', $validated['month_year'] . '%')
                ->delete();

            // Then create new logs
            foreach ($validated['logs'] as $log) {
                // Only save if at least one field has data (other than date)
                if (collect($log)->except('date')->filter()->isNotEmpty()) {
                    CriticalCallMonitoringLog::create([
                        'month_year' => $validated['month_year'] . '-01',
                        'date' => $log['date'],
                        'patient_id' => $log['patient_id'] ?? null,
                        'test_parameter' => $log['test_parameter'] ?? null,
                        'initial_value' => $log['initial_value'] ?? null,
                        'cross_check_value' => $log['cross_check_value'] ?? null,
                        'reporting_time' => $log['reporting_time'] ?? null,
                        'concern_clinician_patient_informed' => $log['concern_clinician_patient_informed'] ?? null,
                        'readback_value' => $log['readback_value'] ?? null,
                        'time_of_informing' => $log['time_of_informing'] ?? null,
                        'signature_of_person_informing' => $log['signature_of_person_informing'] ?? null,
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Critical call monitoring logs saved successfully!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save logs: ' . $e->getMessage()
            ], 500);
        }
    }

    public function fetchCriticalCallLogs(Request $request)
    {
        $validated = $request->validate([
            'month_year' => 'required|date_format:Y-m'
        ]);

        try {
            $logs = CriticalCallMonitoringLog::where('month_year', 'like', $validated['month_year'] . '%')
                ->orderBy('date')
                ->get();

            return response()->json([
                'success' => true,
                'logs' => $logs
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch logs: ' . $e->getMessage()
            ], 500);
        }
    }

    // public function store13(Request $request)
    // {
    //     $request->validate([
    //         'month_year' => 'required|date',
    //         'floor_data' => 'nullable|array',
    //         'dustbins_data' => 'nullable|array',
    //         'counters_data' => 'nullable|array',
    //     ]);

    //     DailyCleaningChecklist::create($request->all());

    //     return response()->json(['message' => 'Log saved successfully!'], 200);
    // }

    // Fetch log data
    public function fetch13(Request $request)
    {
        $request->validate([
            'month_year' => 'required|date',
        ]);

        $logs = DailyCleaningChecklist::where('month_year', $request->month_year)->get();

        return response()->json(['logs' => $logs], 200);
    }

    public function store13(Request $request)
    {
        $request->validate([
            'month_year' => 'required|date',
            'floor_data' => 'nullable|array',
            'dustbins_data' => 'nullable|array',
            'counters_data' => 'nullable|array',
            'equipment_data' => 'nullable|array',
            'staff_signature' => 'nullable',
            'supervisor_signature' => 'nullable',
        ]);

        // Filter out null or empty values
        $filteredFloorData = $this->filterEmptyData($request->floor_data);
        $filteredDustbinsData = $this->filterEmptyData($request->dustbins_data);
        $filteredCountersData = $this->filterEmptyData($request->counters_data);
        $filteredEquipmentData = $this->filterEmptyData($request->equipment_data);
        $filteredStaffSignature = $this->filterEmptyData($request->staff_signature);
        $filteredSupervisorSignature = $this->filterEmptyData($request->supervisor_signature);

        // Check if this is an update or create
        if ($request->has('checklist_id') && !empty($request->checklist_id)) {
            // Update existing record
            $checklist = DailyCleaningChecklist::find($request->checklist_id);

            if (!$checklist) {
                return response()->json(['message' => 'Checklist not found.'], 404);
            }

            $checklist->update([
                'month_year' => $request->month_year,
                'floor_data' => $filteredFloorData,
                'dustbins_data' => $filteredDustbinsData,
                'counters_data' => $filteredCountersData,
                'equipment_data' => $filteredEquipmentData,
                'staff_signature' => $filteredStaffSignature,
                'supervisor_signature' => $filteredSupervisorSignature,
            ]);

            return response()->json(['message' => 'Checklist updated successfully!'], 200);
        } else {
            // Create new record
            DailyCleaningChecklist::create([
                'month_year' => $request->month_year,
                'floor_data' => $filteredFloorData,
                'dustbins_data' => $filteredDustbinsData,
                'counters_data' => $filteredCountersData,
                'equipment_data' => $filteredEquipmentData,
                'staff_signature' => $filteredStaffSignature,
                'supervisor_signature' => $filteredSupervisorSignature,
            ]);

            return response()->json(['message' => 'Log saved successfully!'], 200);
        }
    }


    // Helper function to filter out null or empty values from the data arrays
    private function filterEmptyData($data)
    {
        if (empty($data)) {
            return null;
        }

        $filteredData = [];

        foreach ($data as $row) {
            $filteredRow = [
                'question' => $row['question'],
                'days' => [],
            ];

            // Filter out days with null or empty values
            foreach ($row['days'] as $day => $value) {
                if (!empty($value)) {
                    $filteredRow['days'][$day] = $value;
                }
            }

            // Add the row only if at least one day has data
            if (!empty($filteredRow['days'])) {
                $filteredData[] = $filteredRow;
            }
        }

        return $filteredData;
    }


    // In your controller (e.g., DailyCleaningController.php)
    public function fetchDailyCleaningChecklist(Request $request)
    {
        $request->validate([
            'month_year' => 'required|date_format:Y-m-d'
        ]);

        $checklist = DailyCleaningChecklist::where('month_year', $request->month_year)
            ->first();

        if (!$checklist) {
            return response()->json([
                'success' => false,
                'message' => 'No data found for the selected month/year'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $checklist,
            'month_year' => $request->month_year
        ]);
    }



    public function documentChecklistStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date',
            'checklist_data' => 'required|array',
            'approval_data' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Ensure the data is properly encoded as JSON
            $checklistData = json_encode($request->checklist_data, JSON_UNESCAPED_UNICODE);
            $approvalData = json_encode($request->approval_data, JSON_UNESCAPED_UNICODE);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Invalid JSON data provided');
            }

            // Create or update the checklist
            $checklist = DocumentChecklist::updateOrCreate(
                ['month_year' => $request->month_year],
                [
                    'month_year' => $request->month_year,
                    'checklist_data' => $checklistData,
                    'approval_data' => $approvalData
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'Document checklist saved successfully',
                'data' => [
                    'month_year' => $checklist->month_year,
                    'checklist_data' => json_decode($checklist->checklist_data, true),
                    'approval_data' => json_decode($checklist->approval_data, true)
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error saving document checklist: ' . $e->getMessage()
            ], 500);
        }
    }


    public function documentChecklistFetch($monthYear)
    {
        try {
            $checklist = DocumentChecklist::where('month_year', $monthYear)->first();

            if (!$checklist) {
                return response()->json([
                    'success' => false,
                    'message' => 'No document checklist found for the specified month/year'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'month_year' => $checklist->month_year,
                    'checklist_data' => json_decode($checklist->checklist_data, true),
                    'approval_data' => json_decode($checklist->approval_data, true)
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error retrieving document checklist: ' . $e->getMessage()
            ], 500);
        }
    }




    public function sampleVolumeCheckstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'form_type' => 'required|in:document_checklist,sample_volume,competency_assessment',
            'month_year' => 'nullable|date',
            'form_data' => 'required|array'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $submission = FormSubmission::updateOrCreate(
                [
                    'form_type' => $request->form_type,
                    'month_year' => $request->month_year
                ],
                [
                    'form_data' => $request->form_data
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'Form saved successfully',
                'data' => $submission
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error saving form: ' . $e->getMessage()
            ], 500);
        }
    }

    public function sampleVolumeCheckfetch(Request $request, $formType, $monthYear = null)
    {
        try {
            $query = FormSubmission::where('form_type', $formType);

            if ($monthYear) {
                $query->where('month_year', $monthYear);
            }

            $submission = $query->first();

            if (!$submission) {
                return response()->json([
                    'success' => false,
                    'message' => 'No form data found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $submission
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error retrieving form: ' . $e->getMessage()
            ], 500);
        }
    }



    public function store14(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
            'logs' => 'required|array',
            'logs.*.date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    // Check if the date belongs to the selected month
                    $monthYear = $request->month_year;
                    $dateMonthYear = date('Y-m', strtotime($value));

                    if ($dateMonthYear !== $monthYear) {
                        $fail("The date $value doesn't belong to the selected month $monthYear.");
                    }
                }
            ],
        ], [
            'logs.*.date.date' => 'The :attribute is not a valid date.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $monthYear = $request->month_year;
        $logs = $request->logs;

        try {
            // Delete existing logs for this month to avoid duplicates
            RestRoomCleanlinessLog::where('month_year', $monthYear)->delete();

            foreach ($logs as $logData) {
                // Skip invalid dates
                if (!strtotime($logData['date'])) {
                    continue;
                }

                // Check if at least one field has data (not empty or null)
                $hasData = false;
                $fieldsToCheck = [
                    'floor_morning',
                    'floor_afternoon',
                    'floor_evening',
                    'hand_wash_morning',
                    'hand_wash_afternoon',
                    'hand_wash_evening',
                    'wc_morning',
                    'wc_afternoon',
                    'wc_evening'
                ];

                foreach ($fieldsToCheck as $field) {
                    if (!empty($logData[$field])) {
                        $hasData = true;
                        break;
                    }
                }

                // Only create record if there's data
                if ($hasData) {
                    RestRoomCleanlinessLog::create([
                        'log_date' => $logData['date'],
                        'month_year' => $monthYear,
                        'floor_morning' => $logData['floor_morning'] ?? null,
                        'floor_afternoon' => $logData['floor_afternoon'] ?? null,
                        'floor_evening' => $logData['floor_evening'] ?? null,
                        'hand_wash_morning' => $logData['hand_wash_morning'] ?? null,
                        'hand_wash_afternoon' => $logData['hand_wash_afternoon'] ?? null,
                        'hand_wash_evening' => $logData['hand_wash_evening'] ?? null,
                        'wc_morning' => $logData['wc_morning'] ?? null,
                        'wc_afternoon' => $logData['wc_afternoon'] ?? null,
                        'wc_evening' => $logData['wc_evening'] ?? null,
                    ]);
                }
            }

            return response()->json(['message' => 'Logs saved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to save logs: ' . $e->getMessage()], 500);
        }
    }
    public function getByMonthYear14(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $logs = RestRoomCleanlinessLog::where('month_year', $request->month_year)
            ->orderBy('log_date')
            ->get();

        return response()->json(['logs' => $logs], 200);
    }



    public function store15(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
            'logs' => 'required|array',
            'logs.*.date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    $monthYear = $request->month_year;
                    $dateMonthYear = date('Y-m', strtotime($value));

                    if ($dateMonthYear !== $monthYear) {
                        $fail("The date $value doesn't belong to the selected month $monthYear.");
                    }
                }
            ],
        ], [
            'logs.*.date.date' => 'The :attribute is not a valid date.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $labId = Auth::user()->lab_id;
        if (!$labId) {
            return response()->json(['error' => 'User lab not found'], 400);
        }

        $monthYear = $request->month_year;
        $logs = $request->logs;

        try {
            // Delete existing logs for this month
            SodiumHypochloriteLog::where('month_year', $monthYear)->delete();

            foreach ($logs as $logData) {
                if (!strtotime($logData['date'])) {
                    continue;
                }

                // Check if at least one field has data
                $hasData = false;
                $fieldsToCheck = [
                    'original_concentration',
                    'quantity_prepared',
                    'prepared_by',
                    'verified_by'
                ];

                foreach ($fieldsToCheck as $field) {
                    if (!empty($logData[$field])) {
                        $hasData = true;
                        break;
                    }
                }

                if ($hasData) {
                    SodiumHypochloriteLog::create([
                        'log_date' => $logData['date'],
                        'lab_id' => $labId,
                        'month_year' => $monthYear,
                        'original_concentration' => $logData['original_concentration'] ?? null,
                        'quantity_prepared' => $logData['quantity_prepared'] ?? null,
                        'prepared_by' => $logData['prepared_by'] ?? null,
                        'verified_by' => $logData['verified_by'] ?? null,
                    ]);
                }
            }

            return response()->json(['message' => 'Logs saved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to save logs: ' . $e->getMessage()], 500);
        }
    }

    public function getByMonthYear15(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $logs = SodiumHypochloriteLog::where('month_year', $request->month_year)
            ->where('lab_id', Auth::user()->lab_id)
            ->orderBy('log_date')
            ->get();

        return response()->json(['logs' => $logs], 200);
    }


    public function getInstruments()
    {
        if (Auth::user()->role == 1) {
            $instruments = DB::table('instruments')->get();
        } else {
            $instruments = DB::table('instruments')->where('lab_id', Auth::user()->lab_id)
                // ->where('type', 'refrigerator')
                ->get();
        }


        return response()->json(['instruments' => $instruments]);
    }

    public function store16(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
            'instrument_id' => 'required|exists:instruments,id',
            'logs' => 'required|array',
            'logs.*.date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    $monthYear = $request->month_year;
                    $dateMonthYear = date('Y-m', strtotime($value));

                    if ($dateMonthYear !== $monthYear) {
                        $fail("The date $value doesn't belong to the selected month $monthYear.");
                    }
                }
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $labId = Auth::user()->lab_id;
        $instrumentId = $request->instrument_id;
        $monthYear = $request->month_year;
        $logs = $request->logs;

        try {
            // Delete existing logs for this month and instrument
            RefrigerationTemperatureLog::where('month_year', $monthYear)
                ->where('instrument_id', $instrumentId)
                ->where('lab_id', $labId)
                ->where('form_type', 'refrigerator')
                ->delete();

            foreach ($logs as $logData) {
                if (!strtotime($logData['date'])) {
                    continue;
                }

                // Check if at least one field has data
                $hasData = false;
                $fieldsToCheck = [
                    'morning_temperature',
                    'morning_signature',
                    'evening_temperature',
                    'evening_signature'
                ];

                foreach ($fieldsToCheck as $field) {
                    if (!empty($logData[$field])) {
                        $hasData = true;
                        break;
                    }
                }

                if ($hasData) {
                    RefrigerationTemperatureLog::create([
                        'lab_id' => $labId,
                        'instrument_id' => $instrumentId,
                        'log_date' => $logData['date'],
                        'month_year' => $monthYear,
                        'morning_temperature' => $logData['morning_temperature'] ?? null,
                        'morning_signature' => $logData['morning_signature'] ?? null,
                        'evening_temperature' => $logData['evening_temperature'] ?? null,
                        'evening_signature' => $logData['evening_signature'] ?? null,
                        'form_type' => 'refrigerator'
                    ]);
                }
            }

            return response()->json(['message' => 'Temperature logs saved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to save logs: ' . $e->getMessage()], 500);
        }
    }

    public function getByMonthYear16(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
            'instrument_id' => 'required|exists:instruments,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $logs = RefrigerationTemperatureLog::where('month_year', $request->month_year)
            ->where('instrument_id', $request->instrument_id)
            ->where('lab_id', Auth::user()->lab_id)
            ->where('form_type', 'refrigerator')
            ->orderBy('log_date')
            ->get();

        return response()->json(['logs' => $logs], 200);
    }


    public function instrumentStore(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'instrument_id' => 'required',
            'location' => 'required',
        ]);

        $data = DB::table('instruments')->insert([
            'name' => $request->name,
            'instrument_id' => $request->instrument_id, // Fixed typo here
            'lab_id' => $request->location,
            'type' => $request->type,
        ]);

        if (!$data) {
            return response()->json(['error' => 'Failed to save instrument.'], 400);
        } else {
            return response()->json(['success' => 'Saved successfully!']);
        }
    }

    public function store17(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
            'instrument_id' => 'required|exists:instruments,id',
            'logs' => 'required|array',
            'logs.*.date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    $monthYear = $request->month_year;
                    $dateMonthYear = date('Y-m', strtotime($value));

                    if ($dateMonthYear !== $monthYear) {
                        $fail("The date $value doesn't belong to the selected month $monthYear.");
                    }
                }
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $labId = Auth::user()->lab_id;
        $instrumentId = $request->instrument_id;
        $monthYear = $request->month_year;
        $logs = $request->logs;

        try {
            // Delete existing logs for this month and instrument
            DeepFreezerTemperatureLog::where('month_year', $monthYear)
                ->where('instrument_id', $instrumentId)
                ->where('lab_id', $labId)
                ->delete();

            foreach ($logs as $logData) {
                if (!strtotime($logData['date'])) {
                    continue;
                }

                // Check if at least one field has data
                $hasData = false;
                $fieldsToCheck = [
                    'morning_temperature',
                    'morning_signature',
                    'evening_temperature',
                    'evening_signature'
                ];

                foreach ($fieldsToCheck as $field) {
                    if (!empty($logData[$field])) {
                        $hasData = true;
                        break;
                    }
                }

                if ($hasData) {
                    DeepFreezerTemperatureLog::create([
                        'lab_id' => $labId,
                        'instrument_id' => $instrumentId,
                        'log_date' => $logData['date'],
                        'month_year' => $monthYear,
                        'morning_temperature' => $logData['morning_temperature'] ?? null,
                        'morning_signature' => $logData['morning_signature'] ?? null,
                        'evening_temperature' => $logData['evening_temperature'] ?? null,
                        'evening_signature' => $logData['evening_signature'] ?? null,
                    ]);
                }
            }

            return response()->json(['message' => 'Temperature logs saved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to save logs: ' . $e->getMessage()], 500);
        }
    }
    public function getByMonthYear17(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
            'instrument_id' => 'required|exists:instruments,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $logs = DeepFreezerTemperatureLog::where('month_year', $request->month_year)
            ->where('instrument_id', $request->instrument_id)
            ->where('lab_id', Auth::user()->lab_id)
            ->orderBy('log_date')
            ->get();

        return response()->json(['logs' => $logs], 200);
    }

    public function store18(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
            'logs' => 'required|array',
            'logs.*.date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    $monthYear = $request->month_year;
                    $dateMonthYear = date('Y-m', strtotime($value));

                    if ($dateMonthYear !== $monthYear) {
                        $fail("The date $value doesn't belong to the selected month $monthYear.");
                    }
                }
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $labId = Auth::user()->lab_id;
        $monthYear = $request->month_year;
        $logs = $request->logs;

        try {
            // Delete existing logs for this month
            DB::table('transcription_check_logs')->where('month_year', $monthYear)
                ->where('lab_id', $labId)
                ->delete();

            foreach ($logs as $logData) {
                if (!strtotime($logData['date'])) {
                    continue;
                }

                // Check if at least one field has data
                $hasData = false;
                $fieldsToCheck = [
                    'visit_no',
                    'results_recorded',
                    'results_entered',
                    'entered_by',
                    'verified_by'
                ];

                foreach ($fieldsToCheck as $field) {
                    if (!empty($logData[$field])) {
                        $hasData = true;
                        break;
                    }
                }

                if ($hasData) {
                    DB::table('transcription_check_logs')->insert([
                        'lab_id' => $labId,
                        'log_date' => $logData['date'],
                        'month_year' => $monthYear,
                        'visit_no' => $logData['visit_no'] ?? null,
                        'results_recorded' => $logData['results_recorded'] ?? null,
                        'results_entered' => $logData['results_entered'] ?? null,
                        'entered_by' => $logData['entered_by'] ?? null,
                        'verified_by' => $logData['verified_by'] ?? null,
                    ]);
                }
            }

            return response()->json(['message' => 'Transcription logs saved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to save logs: ' . $e->getMessage()], 500);
        }
    }

    public function getByMonthYear18(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $logs = DB::table('transcription_check_logs')->where('month_year', $request->month_year)
            ->where('lab_id', Auth::user()->lab_id)
            ->orderBy('log_date')
            ->get();

        return response()->json(['logs' => $logs], 200);
    }

    public function store19(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
            'records' => 'required|array',
            'records.*.date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    $monthYear = $request->month_year;
                    $dateMonthYear = date('Y-m', strtotime($value));

                    if ($dateMonthYear !== $monthYear) {
                        $fail("The date $value doesn't belong to the selected month $monthYear.");
                    }
                }
            ],
            'records.*.equipment_name_id' => 'required',
            'records.*.problem_identified' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $labId = Auth::user()->lab_id;
        $monthYear = $request->month_year;
        $records = $request->records;

        try {
            // Delete existing records for this month
            DB::table('instrument_breakdown_records')->where('month_year', $monthYear)
                ->where('lab_id', $labId)
                ->delete();

            foreach ($records as $recordData) {
                if (!strtotime($recordData['date'])) {
                    continue;
                }

                DB::table('instrument_breakdown_records')->insert([
                    'lab_id' => $labId,
                    'log_date' => $recordData['date'],
                    'month_year' => $monthYear,
                    'equipment_name_id' => $recordData['equipment_name_id'],
                    'problem_identified' => $recordData['problem_identified'],
                    'breakdown_time' => $recordData['breakdown_time'] ?? null,
                    'action_taken' => $recordData['action_taken'] ?? null,
                    'engineer_name' => $recordData['engineer_name'] ?? null,
                    'total_down_time' => $recordData['total_down_time'] ?? null,
                    'remarks' => $recordData['remarks'] ?? null,
                    'signature' => $recordData['signature'] ?? null,
                ]);
            }

            return response()->json(['message' => 'Breakdown records saved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to save records: ' . $e->getMessage()], 500);
        }
    }

    public function getByMonthYear19(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $records = DB::table('instrument_breakdown_records')->where('month_year', $request->month_year)
            ->where('lab_id', Auth::user()->lab_id)
            ->orderBy('log_date')
            ->get();

        return response()->json(['records' => $records], 200);
    }




    public function store20(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
            'records.*.date' => 'required|date',
            'records.*.non_conformity' => 'required|string',
            'records.*.responsible_person' => 'required|string',
            'records.*.root_cause' => 'nullable|string',
            'records.*.corrective_action' => 'nullable|string',
            'records.*.preventive_action' => 'nullable|string',
            'records.*.closure_date' => 'nullable|date',
            'records.*.signature' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // Delete existing records for this month/year
        DB::table('non_conformity_logs')->where('month_year', $request->month_year . '-01')->delete();

        // Save new records
        foreach ($request->records as $record) {
            DB::table('non_conformity_logs')->insert([
                'month_year' => $request->month_year . '-01',
                'date' => $record['date'],
                'non_conformity' => $record['non_conformity'],
                'responsible_person' => $record['responsible_person'],
                'root_cause' => $record['root_cause'] ?? null,
                'corrective_action' => $record['corrective_action'] ?? null,
                'preventive_action' => $record['preventive_action'] ?? null,
                'closure_date' => $record['closure_date'] ?? null,
                'signature' => $record['signature'] ?? null,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Non-conformity logs saved successfully!'
        ]);
    }

    public function getByMonthYear20(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Invalid month/year format'
            ], 400);
        }

        $records = DB::table('non_conformity_logs')->where('month_year', $request->month_year . '-01')
            ->orderBy('date')
            ->get();

        return response()->json([
            'records' => $records
        ]);
    }



    public function store21(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
            'records' => 'required|array|min:1',
            'records.*.sr_no' => 'required|integer',
            'records.*.received_date' => 'required|date',
            'records.*.department' => 'required|string|max:255',
            'records.*.discard_date' => 'nullable|date',
            'records.*.discard_by' => 'required|string|max:255',
            'records.*.reviewed_by' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            // Delete existing records for this month/year
            DB::table('sample_discard_logs')
                ->where('month_year', $request->month_year . '-01')
                ->delete();

            // Save new records
            foreach ($request->records as $record) {
                DB::table('sample_discard_logs')->insert([
                    'month_year' => $request->month_year . '-01',
                    'sr_no' => $record['sr_no'],
                    'received_date' => $record['received_date'],
                    'department' => $record['department'],
                    'discard_date' => $record['discard_date'] ?? null,
                    'discard_by' => $record['discard_by'],
                    'reviewed_by' => $record['reviewed_by'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Sample discard logs saved successfully!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getByMonthYear21(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => 'Invalid month/year format'
            ], 400);
        }

        try {
            $records = DB::table('sample_discard_logs')
                ->where('month_year', $request->month_year . '-01')
                ->orderBy('received_date')
                ->get();

            return response()->json([
                'success' => true,
                'records' => $records
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }

    //IT forms

    public function storeIT1(Request $request)
    {
        // Clear existing data
        // LisAnalyzerData::truncate();
        DB::table('lis_tests_data')->truncate();

        // Save analyzer data
        // LisAnalyzerData::create([
        //     'department' => $request->analyzer['department'] ?? '',
        //     'analyzer_sr_no' => $request->analyzer['analyzer_sr_no'] ?? '',
        //     'analyzer_type' => $request->analyzer['analyzer_type'] ?? '',
        //     'validation' => $request->analyzer['validation'] ?? '',
        //     'remarks' => $request->analyzer['remarks'] ?? ''
        // ]);

        // Save tests data
        foreach ($request->tests as $test) {
            DB::table('lis_tests_data')->insert([
                'sr_no' => $test['sr_no'] ?? '',
                'device' => $test['device'] ?? '',
                'assay_code' => $test['assay_code'] ?? '',
                'test_name' => $test['test_name'] ?? '',
                'equipment' => $test['equipment'] ?? '',
                'lis' => $test['lis'] ?? ''
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully'
        ]);
    }

    public function fetchIT1()
    {
        //$analyzer = LisAnalyzerData::first();
        $tests = DB::table('lis_tests_data')->get();

        return response()->json([
            // 'analyzer' => $analyzer ?: null,
            'tests' => $tests ?: []
        ]);
    }


    public function storeIT2(Request $request)
    {
        $validator = validator($request->all(), [
            'date' => 'required|date',
            'employee_no' => 'required|string',
            'employee_name' => 'required|string',
            'department' => 'required|string',
            // 'email_id' => 'required|email',
            'lis_login_id' => 'required|string',
            'requested_by' => 'required|string',
            //'user_roles' => 'nullable|array',
            // 'authorized_by' => 'required|string',
            // 'reason' => 'required|string',
            //'it_department' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        DB::table('lis_user_requests')->insert([
            'date' => $request->date,
            'employee_no' => $request->employee_no,
            'employee_name' => $request->employee_name,
            'department' => $request->department,
            'email_id' => $request->email,
            'lis_login_id' => $request->lis_login_id,
            'requested_by' => $request->requested_by,
            'user_roles' => json_encode($request->user_roles),
            'authorized_by' => $request->authorized_by,
            'reason' => $request->reason,
            'it_department' => json_encode($request->it_department),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => true, 'message' => 'Request submitted successfully!']);
    }
    public function getLatest()
    {
        $latestRequest = DB::table('lis_user_requests')->latest()->first();

        return response()->json($latestRequest);
    }

    public function storeIT3(Request $request)
    {
        DB::table('lis_validate_data')->truncate();
        foreach ($request->tests as $test) {
            DB::table('lis_validate_data')->insert([
                'sr_no' => $test['sr_no'] ?? '',
                'device' => $test['device'] ?? '',
                'assay_code' => $test['assay_code'] ?? '',
                'test_name' => $test['test_name'] ?? '',
                'equipment' => $test['equipment'] ?? '',
                'lis' => $test['lis'] ?? ''
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully'
        ]);
    }

    public function fetchIT3()
    {
        $tests = DB::table('lis_validate_data')->get();
        return response()->json([
            'tests' => $tests ?: []
        ]);
    }





    public function storeMolBio1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'department' => 'required|string|max:255',
            //'month_year1' => 'required|date',
            'cabinet_id' => 'required|exists:instruments,id',
            'logs' => 'required|array',
            'logs.*.date' => 'required|date',
            'logs.*.clean_with_alcohol' => 'nullable|boolean',
            'logs.*.uv_light' => 'nullable|boolean',
            'logs.*.manometer_reading' => 'nullable|string|max:50',
            'logs.*.done_by_sign' => 'nullable|string|max:100',
            'logs.*.hypo_container_available' => 'nullable|boolean',
            'logs.*.settle_plate_test_date' => 'nullable|date',
            'logs.*.settle_plate_results' => 'nullable|string|max:100',
            'logs.*.uv_efficacy' => 'nullable|boolean',
            'logs.*.checked_by_sign' => 'nullable|string|max:100',
            'logs.*.remarks' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            foreach ($request->logs as $logData) {
                DB::table('bio_safety_maintenance_logs')->updateOrInsert(
                    [
                        'instrument_id' => $request->cabinet_id,
                        'log_date' => $logData['date'],
                    ],
                    [
                        'department' => $request->department,
                        'clean_with_alcohol' => $logData['clean_with_alcohol'] ?? false,
                        'uv_light' => $logData['uv_light'] ?? false,
                        'manometer_reading' => $logData['manometer_reading'],
                        'done_by_sign' => $logData['done_by_sign'],
                        'hypo_container_available' => $logData['hypo_container_available'] ?? false,
                        'settle_plate_test_date' => $logData['settle_plate_test_date'],
                        'settle_plate_results' => $logData['settle_plate_results'],
                        'uv_efficacy' => $logData['uv_efficacy'] ?? false,
                        'checked_by_sign' => $logData['checked_by_sign'],
                        'remarks' => $logData['remarks'],
                        'type' => 'mol',
                    ]
                );
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Maintenance logs saved successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save maintenance logs: ' . $e->getMessage()
            ], 500);
        }
    }

    public function fetchMolBio1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'month_year' => 'required|date',
            'cabinet_id' => 'required|exists:instruments,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $month = date('m', strtotime($request->month_year));
        $year = date('Y', strtotime($request->month_year));

        $logs = DB::table('bio_safety_maintenance_logs')->where('instrument_id', $request->cabinet_id)->where('type', 'mol')
            ->whereMonth('log_date', $month)
            ->whereYear('log_date', $year)
            ->orderBy('log_date')
            ->get();

        $department = $logs->first()->department ?? '';

        return response()->json([
            'success' => true,
            'department' => $department,
            'logs' => $logs
        ]);
    }



    // Fetch maintenance logs
    public function fetchMolBio2(Request $request)
    {
        try {
            $request->validate([
                'month' => 'required|date_format:Y-m',
                'equipment_id' => 'required|exists:instruments,instrument_id'
            ], [
                'month.required' => 'Please select a month and year',
                'month.date_format' => 'Invalid month format (YYYY-MM)',
                'equipment_id.required' => 'Please select a centrifuge',
                'equipment_id.exists' => 'Selected centrifuge does not exist'
            ]);

            $logs = DB::table('cooling_centrifuge_logs')
                ->where('month_year', $request->month)
                ->where('equipment_id', $request->equipment_id)
                ->get()
                ->map(function ($log) {
                    return [
                        'department' => $log->department,
                        'task' => $log->task,
                        'days_data' => json_decode($log->days_data, true) ?: [],
                        'bushes_checked_date' => $log->bushes_checked_date,
                        'bushes_checked_date_2' => $log->bushes_checked_date_2,
                        'next_due_date' => $log->next_due_date,
                        'monthly_signatures' => json_decode($log->monthly_signatures, true) ?: []
                    ];
                });

            return response()->json([
                'success' => true,
                'data' => $logs
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching cooling centrifuge logs: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }

    // Save maintenance logs
    public function storeMolBio2(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'month_year' => 'required|date_format:Y-m',
                'equipment_id' => 'required|exists:instruments,instrument_id',
                'department' => 'required|string',
                'logs' => 'required|array',
                'logs.*.task' => 'required|string',
                'logs.*.days_data' => 'required|array',
                'bushes_checked_date' => 'nullable|date',
                'bushes_checked_date_2' => 'nullable|date',
                'next_due_date' => 'nullable|date',
                'monthly_signatures' => 'nullable'
            ]);

            // First delete existing entries for this month/equipment
            DB::table('cooling_centrifuge_logs')
                ->where('month_year', $request->month_year)
                ->where('equipment_id', $request->equipment_id)
                ->delete();

            // Save daily maintenance logs
            foreach ($request->logs as $log) {
                DB::table('cooling_centrifuge_logs')->insert([
                    'month_year' => $request->month_year,
                    'equipment_id' => $request->equipment_id,
                    'department' => $request->department,
                    'task' => $log['task'],
                    'days_data' => json_encode($log['days_data']),
                    'bushes_checked_date' => $request->bushes_checked_date,
                    'bushes_checked_date_2' => $request->bushes_checked_date_2,
                    'next_due_date' => $request->next_due_date,
                    'monthly_signatures' => json_encode($request->monthly_signatures),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Maintenance logs saved successfully'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error saving cooling centrifuge logs: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage()
            ], 500);
        }
    }


    public function storeMicro1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'department' => 'required|string|max:255',
            //'month_year1' => 'required|date',
            'cabinet_id' => 'required|exists:instruments,id',
            'logs' => 'required|array',
            'logs.*.date' => 'required|date',
            'logs.*.clean_with_alcohol' => 'nullable|boolean',
            'logs.*.uv_light' => 'nullable|boolean',
            'logs.*.manometer_reading' => 'nullable|string|max:50',
            'logs.*.done_by_sign' => 'nullable|string|max:100',
            'logs.*.hypo_container_available' => 'nullable|boolean',
            'logs.*.settle_plate_test_date' => 'nullable|date',
            'logs.*.settle_plate_results' => 'nullable|string|max:100',
            'logs.*.uv_efficacy' => 'nullable|boolean',
            'logs.*.checked_by_sign' => 'nullable|string|max:100',
            'logs.*.remarks' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            foreach ($request->logs as $logData) {
                DB::table('bio_safety_maintenance_logs')->updateOrInsert(
                    [
                        'instrument_id' => $request->cabinet_id,
                        'log_date' => $logData['date'],
                    ],
                    [
                        'department' => $request->department,
                        'clean_with_alcohol' => $logData['clean_with_alcohol'] ?? false,
                        'uv_light' => $logData['uv_light'] ?? false,
                        'manometer_reading' => $logData['manometer_reading'],
                        'done_by_sign' => $logData['done_by_sign'],
                        'hypo_container_available' => $logData['hypo_container_available'] ?? false,
                        'settle_plate_test_date' => $logData['settle_plate_test_date'],
                        'settle_plate_results' => $logData['settle_plate_results'],
                        'uv_efficacy' => $logData['uv_efficacy'] ?? false,
                        'checked_by_sign' => $logData['checked_by_sign'],
                        'remarks' => $logData['remarks'],
                        'type' => 'micro',
                    ]
                );
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Maintenance logs saved successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save maintenance logs: ' . $e->getMessage()
            ], 500);
        }
    }

    public function fetchMicro1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'month_year' => 'required|date',
            'cabinet_id' => 'required|exists:instruments,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $month = date('m', strtotime($request->month_year));
        $year = date('Y', strtotime($request->month_year));

        $logs = DB::table('bio_safety_maintenance_logs')->where('instrument_id', $request->cabinet_id)->where('type', 'micro')
            ->whereMonth('log_date', $month)
            ->whereYear('log_date', $year)
            ->orderBy('log_date')
            ->get();

        $department = $logs->first()->department ?? '';

        return response()->json([
            'success' => true,
            'department' => $department,
            'logs' => $logs
        ]);
    }





    public function storeMicro2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department' => 'required|string|max:255',
            'month_year' => 'required|date_format:Y-m',
            'cabinet_id' => 'required|exists:instruments,id',
            'logs' => 'required|array',
            'logs.*.date' => 'required|date', // Changed from log_date to date
            'logs.*.clean_with_alcohol' => 'nullable|boolean',
            'logs.*.uv_light' => 'nullable|boolean',
            'logs.*.manometer_reading' => 'nullable|string|max:50',
            'logs.*.done_by_sign' => 'nullable|string|max:100',
            'logs.*.hypo_container_available' => 'nullable|boolean',
            'logs.*.settle_plate_test_date' => 'nullable|date',
            'logs.*.settle_plate_results' => 'nullable|string|max:100',
            'logs.*.uv_efficacy' => 'nullable|boolean',
            'logs.*.checked_by_sign' => 'nullable|string|max:100',
            'logs.*.remarks' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            // First delete existing entries for this month/equipment
            $month = Carbon::createFromFormat('Y-m', $request->month_year)->month;
            $year = Carbon::createFromFormat('Y-m', $request->month_year)->year;

            DB::table('bio_safety_maintenance_logs')
                ->where('instrument_id', $request->cabinet_id)
                ->where('type', 'laminar_air_flow')
                ->whereMonth('log_date', $month)
                ->whereYear('log_date', $year)
                ->delete();

            // Insert new logs
            foreach ($request->logs as $logData) {
                DB::table('bio_safety_maintenance_logs')->insert([
                    'instrument_id' => $request->cabinet_id,
                    'log_date' => $logData['date'], // Changed from log_date to date
                    'department' => $request->department,
                    'clean_with_alcohol' => $logData['clean_with_alcohol'] ?? false,
                    'uv_light' => $logData['uv_light'] ?? false,
                    'manometer_reading' => $logData['manometer_reading'],
                    'done_by_sign' => $logData['done_by_sign'],
                    'hypo_container_available' => $logData['hypo_container_available'] ?? false,
                    'settle_plate_test_date' => $logData['settle_plate_test_date'],
                    'settle_plate_results' => $logData['settle_plate_results'],
                    'uv_efficacy' => $logData['uv_efficacy'] ?? false,
                    'checked_by_sign' => $logData['checked_by_sign'],
                    'remarks' => $logData['remarks'],
                    'type' => 'laminar_air_flow',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Maintenance logs saved successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save maintenance logs: ' . $e->getMessage()
            ], 500);
        }
    }

    public function fetchMicro2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'month_year' => 'required|date',
            'cabinet_id' => 'required|exists:instruments,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $month = date('m', strtotime($request->month_year));
        $year = date('Y', strtotime($request->month_year));

        $logs = DB::table('bio_safety_maintenance_logs')->where('instrument_id', $request->cabinet_id)->where('type', 'laminar_air_flow')
            ->whereMonth('log_date', $month)
            ->whereYear('log_date', $year)
            ->orderBy('log_date')
            ->get();

        $department = $logs->first()->department ?? '';

        return response()->json([
            'success' => true,
            'department' => $department,
            'logs' => $logs
        ]);
    }



    public function storeMicro3(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
            'instrument_id' => 'required|exists:instruments,id',
            'logs' => 'required|array',
            'logs.*.date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    $monthYear = $request->month_year;
                    $dateMonthYear = date('Y-m', strtotime($value));

                    if ($dateMonthYear !== $monthYear) {
                        $fail("The date $value doesn't belong to the selected month $monthYear.");
                    }
                }
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $labId = Auth::user()->lab_id;
        $instrumentId = $request->instrument_id;
        $monthYear = $request->month_year;
        $logs = $request->logs;

        try {
            // Delete existing logs for this month and instrument
            RefrigerationTemperatureLog::where('month_year', $monthYear)
                ->where('instrument_id', $instrumentId)
                ->where('lab_id', $labId)
                ->where('form_type', 'Oven')
                ->delete();

            foreach ($logs as $logData) {
                if (!strtotime($logData['date'])) {
                    continue;
                }

                // Check if at least one field has data
                $hasData = false;
                $fieldsToCheck = [
                    'morning_temperature',
                    'morning_signature',
                    'evening_temperature',
                    'evening_signature'
                ];

                foreach ($fieldsToCheck as $field) {
                    if (!empty($logData[$field])) {
                        $hasData = true;
                        break;
                    }
                }

                if ($hasData) {
                    RefrigerationTemperatureLog::create([
                        'lab_id' => $labId,
                        'instrument_id' => $instrumentId,
                        'log_date' => $logData['date'],
                        'month_year' => $monthYear,
                        'morning_temperature' => $logData['morning_temperature'] ?? null,
                        'morning_signature' => $logData['morning_signature'] ?? null,
                        'evening_temperature' => $logData['evening_temperature'] ?? null,
                        'evening_signature' => $logData['evening_signature'] ?? null,
                        'form_type' => 'Oven'
                    ]);
                }
            }

            return response()->json(['message' => 'Temperature logs saved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to save logs: ' . $e->getMessage()], 500);
        }
    }

    public function fetchMicro3(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
            'instrument_id' => 'required|exists:instruments,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $logs = RefrigerationTemperatureLog::where('month_year', $request->month_year)
            ->where('instrument_id', $request->instrument_id)
            ->where('lab_id', Auth::user()->lab_id)
            ->where('form_type', 'Oven')
            ->orderBy('log_date')
            ->get();

        return response()->json(['logs' => $logs], 200);
    }
    //-------------------4

    public function fetchMicro4(Request $request)
    {
        try {
            $request->validate([
                'month' => 'required|date_format:Y-m',
                'equipment_id' => 'required|exists:instruments,instrument_id'
            ]);

            \Log::info('Fetching centrifuge maintenance log', [
                'month' => $request->month,
                'equipment_id' => $request->equipment_id
            ]);

            $date = Carbon::createFromFormat('Y-m', $request->month);
            $equipmentId = $request->equipment_id;

            $logs = DB::table('oven_maintenance_logs')
                ->where('month_year', $request->month) // Exact match on YYYY-MM format
                ->where('equipment_id', $equipmentId)
                ->where('form_type', 'oven_maintain')
                ->get()
                ->map(function ($log) {
                    return [
                        'department' => $log->department,
                        'task' => $log->task,
                        'days_data' => json_decode($log->days_data, true) ?: []
                    ];
                });

            \Log::info('Found logs:', ['count' => count($logs)]);

            return response()->json([
                'success' => true,
                'data' => $logs
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching centrifuge maintenance log: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching maintenance data: ' . $e->getMessage()
            ], 500);
        }
    }
    public function storeMicro4(Request $request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validate([
                'logs' => 'required|array',
                'logs.*.month_year' => 'required|date_format:Y-m',
                'logs.*.equipment_id' => 'required|exists:instruments,instrument_id',
                'logs.*.department' => 'required|string',
                'logs.*.task' => 'required|string',
                'logs.*.days_data' => 'required|array'
            ], [
                'logs.required' => 'No maintenance data provided',
                'logs.*.month_year.required' => 'Month/year is required for all entries',
                'logs.*.month_year.date_format' => 'Invalid month format (should be YYYY-MM)',
                'logs.*.equipment_id.required' => 'Equipment ID is required for all entries',
                'logs.*.equipment_id.exists' => 'Selected equipment does not exist',
                'logs.*.department.required' => 'Department is required for all entries',
                'logs.*.task.required' => 'Task description is required for all entries',
                'logs.*.days_data.required' => 'Daily data is required for all entries'
            ]);

            $savedCount = 0;

            foreach ($request->logs as $log) {
                DB::table('oven_maintenance_logs')->updateOrInsert(
                    [
                        'month_year' => $log['month_year'],
                        'equipment_id' => $log['equipment_id'],
                        'task' => $log['task']
                    ],
                    [
                        'department' => $log['department'],
                        'days_data' => json_encode($log['days_data']),
                        'created_at' => now(),
                        'updated_at' => now(),
                        'form_type' => 'oven_maintain',
                    ]
                );
                $savedCount++;
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => "Successfully saved $savedCount log entries",
                'saved_count' => $savedCount
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            \Log::error('Validation failed:', $e->errors());
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error saving log: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage(),
            ], 500);
        }
    }



    //------------/4

    public function fetchMicro8(Request $request)
    {
        try {
            $request->validate([
                'month' => 'required|date_format:Y-m',
                'equipment_id' => 'required|exists:instruments,instrument_id'
            ]);

            \Log::info('Fetching centrifuge maintenance log', [
                'month' => $request->month,
                'equipment_id' => $request->equipment_id
            ]);

            $date = Carbon::createFromFormat('Y-m', $request->month);
            $equipmentId = $request->equipment_id;

            $logs = DB::table('oven_maintenance_logs')
                ->where('month_year', $request->month) // Exact match on YYYY-MM format
                ->where('equipment_id', $equipmentId)
                ->where('form_type', 'back_alert')
                ->get()
                ->map(function ($log) {
                    return [
                        'department' => $log->department,
                        'task' => $log->task,
                        'days_data' => json_decode($log->days_data, true) ?: []
                    ];
                });

            \Log::info('Found logs:', ['count' => count($logs)]);

            return response()->json([
                'success' => true,
                'data' => $logs
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching centrifuge maintenance log: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching maintenance data: ' . $e->getMessage()
            ], 500);
        }
    }
    public function storeMicro8(Request $request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validate([
                'logs' => 'required|array',
                'logs.*.month_year' => 'required|date_format:Y-m',
                'logs.*.equipment_id' => 'required|exists:instruments,instrument_id',
                // 'logs.*.department' => 'required|string',
                'logs.*.task' => 'required|string',
                'logs.*.days_data' => 'required|array'
            ], [
                'logs.required' => 'No maintenance data provided',
                'logs.*.month_year.required' => 'Month/year is required for all entries',
                'logs.*.month_year.date_format' => 'Invalid month format (should be YYYY-MM)',
                'logs.*.equipment_id.required' => 'Equipment ID is required for all entries',
                'logs.*.equipment_id.exists' => 'Selected equipment does not exist',
                // 'logs.*.department.required' => 'Department is required for all entries',
                'logs.*.task.required' => 'Task description is required for all entries',
                'logs.*.days_data.required' => 'Daily data is required for all entries'
            ]);

            $savedCount = 0;

            foreach ($request->logs as $log) {
                DB::table('oven_maintenance_logs')->updateOrInsert(
                    [
                        'month_year' => $log['month_year'],
                        'equipment_id' => $log['equipment_id'],
                        'task' => $log['task']
                    ],
                    [
                        // 'department' => $log['department'],
                        'days_data' => json_encode($log['days_data']),
                        'created_at' => now(),
                        'updated_at' => now(),
                        'form_type' => 'back_alert',
                    ]
                );
                $savedCount++;
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => "Successfully saved $savedCount log entries",
                'saved_count' => $savedCount
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            \Log::error('Validation failed:', $e->errors());
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error saving log: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage(),
            ], 500);
        }
    }



    public function fetchMicro9(Request $request)
    {
        try {
            $request->validate([
                'month' => 'required|date_format:Y-m',
                'equipment_id' => 'required|exists:instruments,instrument_id'
            ]);

            \Log::info('Fetching centrifuge maintenance log', [
                'month' => $request->month,
                'equipment_id' => $request->equipment_id
            ]);

            $date = Carbon::createFromFormat('Y-m', $request->month);
            $equipmentId = $request->equipment_id;

            $logs = DB::table('oven_maintenance_logs')
                ->where('month_year', $request->month) // Exact match on YYYY-MM format
                ->where('equipment_id', $equipmentId)
                ->where('form_type', 'viteck_2')
                ->get()
                ->map(function ($log) {
                    return [
                        'department' => $log->department,
                        'task' => $log->task,
                        'days_data' => json_decode($log->days_data, true) ?: []
                    ];
                });

            \Log::info('Found logs:', ['count' => count($logs)]);

            return response()->json([
                'success' => true,
                'data' => $logs
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching centrifuge maintenance log: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching maintenance data: ' . $e->getMessage()
            ], 500);
        }
    }
    public function storeMicro9(Request $request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validate([
                'logs' => 'required|array',
                'logs.*.month_year' => 'required|date_format:Y-m',
                'logs.*.equipment_id' => 'required|exists:instruments,instrument_id',
                // 'logs.*.department' => 'required|string',
                'logs.*.task' => 'required|string',
                'logs.*.days_data' => 'required|array'
            ], [
                'logs.required' => 'No maintenance data provided',
                'logs.*.month_year.required' => 'Month/year is required for all entries',
                'logs.*.month_year.date_format' => 'Invalid month format (should be YYYY-MM)',
                'logs.*.equipment_id.required' => 'Equipment ID is required for all entries',
                'logs.*.equipment_id.exists' => 'Selected equipment does not exist',
                // 'logs.*.department.required' => 'Department is required for all entries',
                'logs.*.task.required' => 'Task description is required for all entries',
                'logs.*.days_data.required' => 'Daily data is required for all entries'
            ]);

            $savedCount = 0;

            foreach ($request->logs as $log) {
                DB::table('oven_maintenance_logs')->updateOrInsert(
                    [
                        'month_year' => $log['month_year'],
                        'equipment_id' => $log['equipment_id'],
                        'task' => $log['task']
                    ],
                    [
                        // 'department' => $log['department'],
                        'days_data' => json_encode($log['days_data']),
                        'created_at' => now(),
                        'updated_at' => now(),
                        'form_type' => 'viteck_2',
                    ]
                );
                $savedCount++;
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => "Successfully saved $savedCount log entries",
                'saved_count' => $savedCount
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            \Log::error('Validation failed:', $e->errors());
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error saving log: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage(),
            ], 500);
        }
    }

    //------------------------------------10
    public function fetchMicro10(Request $request)
    {
        try {
            $request->validate([
                'month' => 'required|date_format:Y-m',
                'equipment_id' => 'required|exists:instruments,instrument_id'
            ]);

            \Log::info('Fetching centrifuge maintenance log', [
                'month' => $request->month,
                'equipment_id' => $request->equipment_id
            ]);

            $date = Carbon::createFromFormat('Y-m', $request->month);
            $equipmentId = $request->equipment_id;

            $logs = DB::table('oven_maintenance_logs')
                ->where('month_year', $request->month) // Exact match on YYYY-MM format
                ->where('equipment_id', $equipmentId)
                ->where('form_type', 'autoclave')
                ->get()
                ->map(function ($log) {
                    return [
                        'department' => $log->department,
                        'task' => $log->task,
                        'days_data' => json_decode($log->days_data, true) ?: []
                    ];
                });

            \Log::info('Found logs:', ['count' => count($logs)]);

            return response()->json([
                'success' => true,
                'data' => $logs
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching centrifuge maintenance log: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching maintenance data: ' . $e->getMessage()
            ], 500);
        }
    }
    public function storeMicro10(Request $request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validate([
                'logs' => 'required|array',
                'logs.*.month_year' => 'required|date_format:Y-m',
                'logs.*.equipment_id' => 'required|exists:instruments,instrument_id',
                // 'logs.*.department' => 'required|string',
                'logs.*.task' => 'required|string',
                'logs.*.days_data' => 'required|array'
            ], [
                'logs.required' => 'No maintenance data provided',
                'logs.*.month_year.required' => 'Month/year is required for all entries',
                'logs.*.month_year.date_format' => 'Invalid month format (should be YYYY-MM)',
                'logs.*.equipment_id.required' => 'Equipment ID is required for all entries',
                'logs.*.equipment_id.exists' => 'Selected equipment does not exist',
                // 'logs.*.department.required' => 'Department is required for all entries',
                'logs.*.task.required' => 'Task description is required for all entries',
                'logs.*.days_data.required' => 'Daily data is required for all entries'
            ]);

            $savedCount = 0;

            foreach ($request->logs as $log) {
                DB::table('oven_maintenance_logs')->updateOrInsert(
                    [
                        'month_year' => $log['month_year'],
                        'equipment_id' => $log['equipment_id'],
                        'task' => $log['task']
                    ],
                    [
                        // 'department' => $log['department'],
                        'days_data' => json_encode($log['days_data']),
                        'created_at' => now(),
                        'updated_at' => now(),
                        'form_type' => 'autoclave',
                    ]
                );
                $savedCount++;
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => "Successfully saved $savedCount log entries",
                'saved_count' => $savedCount
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            \Log::error('Validation failed:', $e->errors());
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error saving log: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function getLogHisto1(Request $request)
    {
        try {
            $request->validate([
                'month' => 'required|date_format:Y-m',
                'equipment_id' => 'required|exists:instruments,instrument_id'
            ]);

            \Log::info('Fetching  maintenance log', [
                'month' => $request->month,
                'equipment_id' => $request->equipment_id
            ]);

            $date = Carbon::createFromFormat('Y-m', $request->month);
            $equipmentId = $request->equipment_id;

            $logs = DB::table('hot_plate_maintenance_logs')
                ->where('month_year', $request->month) // Exact match on YYYY-MM format
                ->where('equipment_id', $equipmentId)
                ->get()
                ->map(function ($log) {
                    return [
                        // 'department' => $log->department,
                        'task' => $log->task,
                        'days_data' => json_decode($log->days_data, true) ?: []
                    ];
                });

            \Log::info('Found logs:', ['count' => count($logs)]);

            return response()->json([
                'success' => true,
                'data' => $logs
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching centrifuge maintenance log: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching maintenance data: ' . $e->getMessage()
            ], 500);
        }
    }
    public function storeHisto1(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'logs' => 'required|array',
                'logs.*.month_year' => 'required|date_format:Y-m',
                'logs.*.equipment_id' => 'required|exists:instruments,instrument_id',
                // 'logs.*.department' => 'required|string',
                'logs.*.task' => 'required|string',
                'logs.*.days_data' => 'required|array'
            ]);

            $savedCount = 0;

            foreach ($request->logs as $log) {
                DB::table('hot_plate_maintenance_logs')->updateOrInsert(
                    [
                        'month_year' => $log['month_year'],
                        'equipment_id' => $log['equipment_id'],
                        'task' => $log['task']
                    ],
                    [
                        // 'department' => $log['department'],
                        'days_data' => json_encode($log['days_data']),
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                );
                $savedCount++;
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => "Successfully saved $savedCount log entries",
                'saved_count' => $savedCount
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error saving centrifuge log: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function storeMicro5(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
            'instrument_id' => 'required|exists:instruments,id',
            'logs' => 'required|array',
            'logs.*.date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    $monthYear = $request->month_year;
                    $dateMonthYear = date('Y-m', strtotime($value));

                    if ($dateMonthYear !== $monthYear) {
                        $fail("The date $value doesn't belong to the selected month $monthYear.");
                    }
                }
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $labId = Auth::user()->lab_id;
        $instrumentId = $request->instrument_id;
        $monthYear = $request->month_year;
        $logs = $request->logs;

        try {
            // Delete existing logs for this month and instrument
            RefrigerationTemperatureLog::where('month_year', $monthYear)
                ->where('instrument_id', $instrumentId)
                ->where('lab_id', $labId)
                ->where('form_type', 'Incubator')
                ->delete();

            foreach ($logs as $logData) {
                if (!strtotime($logData['date'])) {
                    continue;
                }

                // Check if at least one field has data
                $hasData = false;
                $fieldsToCheck = [
                    'morning_temperature',
                    'morning_signature',
                    'evening_temperature',
                    'evening_signature'
                ];

                foreach ($fieldsToCheck as $field) {
                    if (!empty($logData[$field])) {
                        $hasData = true;
                        break;
                    }
                }

                if ($hasData) {
                    RefrigerationTemperatureLog::create([
                        'lab_id' => $labId,
                        'instrument_id' => $instrumentId,
                        'log_date' => $logData['date'],
                        'month_year' => $monthYear,
                        'morning_temperature' => $logData['morning_temperature'] ?? null,
                        'morning_signature' => $logData['morning_signature'] ?? null,
                        'evening_temperature' => $logData['evening_temperature'] ?? null,
                        'evening_signature' => $logData['evening_signature'] ?? null,
                        'form_type' => 'Incubator'
                    ]);
                }
            }

            return response()->json(['message' => 'Temperature logs saved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to save logs: ' . $e->getMessage()], 500);
        }
    }

    public function fetchMicro5(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
            'instrument_id' => 'required|exists:instruments,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $logs = RefrigerationTemperatureLog::where('month_year', $request->month_year)
            ->where('instrument_id', $request->instrument_id)
            ->where('lab_id', Auth::user()->lab_id)
            ->where('form_type', 'Incubator')
            ->orderBy('log_date')
            ->get();

        return response()->json(['logs' => $logs], 200);
    }



    public function fetchMicro6(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
            'instrument_id' => 'required|exists:instruments,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $month = Carbon::createFromFormat('Y-m', $request->month_year)->month;
            $year = Carbon::createFromFormat('Y-m', $request->month_year)->year;

            $logs = DB::table('incubator_maintenance_logs')
                ->where('instrument_id', $request->instrument_id)
                ->whereMonth('log_date', $month)
                ->whereYear('log_date', $year)
                ->orderBy('log_date')
                ->get();

            $department = $logs->first()->department ?? '';

            return response()->json([
                'success' => true,
                'department' => $department,
                'logs' => $logs
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function storeMicro6(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department' => 'required|string|max:255',
            'month_year' => 'required|date_format:Y-m',
            'instrument_id' => 'required|exists:instruments,id',
            'logs' => 'required|array',
            'logs.*.log_date' => 'required|date',
            'logs.*.cleaning_outside' => 'nullable|string',
            'logs.*.cleaning_inside' => 'nullable|string',
            'logs.*.temperature_check' => 'nullable|string',
            'logs.*.power_check' => 'nullable|string',
            'logs.*.scientific_signature' => 'nullable|string',
            'logs.*.supervisor_signature' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $month = Carbon::createFromFormat('Y-m', $request->month_year)->month;
            $year = Carbon::createFromFormat('Y-m', $request->month_year)->year;

            DB::table('incubator_maintenance_logs')
                ->where('instrument_id', $request->instrument_id)
                ->whereMonth('log_date', $month)
                ->whereYear('log_date', $year)
                ->delete();

            // Insert new logs
            foreach ($request->logs as $logData) {
                if (
                    $logData['cleaning_outside'] || $logData['cleaning_inside'] ||
                    $logData['temperature_check'] || $logData['power_check'] ||
                    $logData['scientific_signature'] || $logData['supervisor_signature']
                ) {

                    DB::table('incubator_maintenance_logs')->insert([
                        'instrument_id' => $request->instrument_id,
                        'log_date' => $logData['log_date'],
                        'department' => $request->department,
                        'cleaning_outside' => $logData['cleaning_outside'],
                        'cleaning_inside' => $logData['cleaning_inside'],
                        'temperature_check' => $logData['temperature_check'],
                        'power_check' => $logData['power_check'],
                        'scientific_signature' => $logData['scientific_signature'],
                        'supervisor_signature' => $logData['supervisor_signature'],
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Maintenance logs saved successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save maintenance logs: ' . $e->getMessage()
            ], 500);
        }
    }
}
