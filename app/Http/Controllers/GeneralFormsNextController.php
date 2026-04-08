<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Forms;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\ReagentVerificationLog;

use Illuminate\Support\Facades\Validator;


class GeneralFormsNextController extends Controller
{

    public function storeGnrl25(Request $request)
    {
        $validated = $request->validate([
            'month_year' => 'nullable|string',
            'services_provided' => 'nullable|string',
            'ratings' => 'required|array', // ratings should be passed as array
            'comments' => 'nullable|string',
            'doctor_name' => 'nullable|string',
            'doctor_signature' => 'nullable|string',
        ]);

        DB::table('physician_feedback_forms')->insert([
            'month_year' => $validated['month_year'],
            'services_provided' => $validated['services_provided'],
            'ratings' => json_encode($validated['ratings']),
            'comments' => $validated['comments'],
            'doctor_name' => $validated['doctor_name'],
            'doctor_signature' => $validated['doctor_signature'],
        ]);

        return response()->json(['message' => 'Feedback submitted successfully']);
    }


    public function store26(Request $request)
    {
        $request->validate([
            'instrument_id' => 'required|exists:instruments,id',
            'equipment_name' => 'required|string|max:255',
            'logs' => 'required|array',
            'logs.*.log_date' => 'required|date',
            'logs.*.start_time' => 'required',
            'logs.*.shutdown_time' => 'required'
        ]);

        // Delete existing records for this instrument (to replace with new data)
        DB::table('equipment_time_logs')->where('instrument_id', $request->instrument_id)->delete();

        // Insert new records
        foreach ($request->logs as $log) {
            DB::table('equipment_time_logs')->insert([
                'instrument_id' => $request->instrument_id,
                'equipment_name' => $request->equipment_name,
                'log_date' => $log['log_date'],
                'start_time' => $log['start_time'],
                'shutdown_time' => $log['shutdown_time']
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Equipment logs saved successfully']);
    }

    public function getLogsByInstrument26($instrumentId)
    {
        $logs = DB::table('equipment_time_logs')->where('instrument_id', $instrumentId)
            ->orderBy('log_date', 'desc')
            ->get();

        return response()->json($logs);
    }

    public function store27(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'instrument_id' => 'required|exists:instruments,id',
            'tests' => 'required|array|min:1',
            'tests.*.test_date' => 'required|date',
            'tests.*.visit_id' => 'required|string|max:255',
            'tests.*.parameter_repeat' => 'required|string|max:255',
            'tests.*.reason_for_repeat' => 'required|string|max:255',
            'tests.*.authorised_by' => 'required|string|max:255',
            'tests.*.result_a' => 'nullable|string|max:255',
            'tests.*.result_b' => 'nullable|string|max:255',
            'tests.*.result_c' => 'nullable|string|max:255',
            'tests.*.result_entered_in_lms' => 'required|string|max:255',
            'tests.*.final_result_reviewed_by' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            // Delete existing records for this instrument
            DB::table('repeat_tests')
                ->where('instrument_id', $request->instrument_id)
                ->delete();

            // Insert new records
            foreach ($request->tests as $test) {
                DB::table('repeat_tests')->insert([
                    'instrument_id' => $request->instrument_id,
                    'test_date' => $test['test_date'],
                    'visit_id' => $test['visit_id'],
                    'parameter_repeat' => $test['parameter_repeat'],
                    'reason_for_repeat' => $test['reason_for_repeat'],
                    'authorised_by' => $test['authorised_by'],
                    'result_a' => $test['result_a'] ?? null,
                    'result_b' => $test['result_b'] ?? null,
                    'result_c' => $test['result_c'] ?? null,
                    'result_entered_in_lms' => $test['result_entered_in_lms'],
                    'final_result_reviewed_by' => $test['final_result_reviewed_by'],
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Repeat tests saved successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getTestsByInstrument27($instrumentId)
    {
        try {
            // Validate instrument ID
            if (!DB::table('instruments')->where('id', $instrumentId)->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Instrument not found'
                ], 404);
            }

            $tests = DB::table('repeat_tests')
                ->where('instrument_id', $instrumentId)
                ->orderBy('test_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $tests
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }



    public function fetch28(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
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

            $logs = DB::table('eye_wash_logs')
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

    public function store28(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department' => 'required|string|max:255',
            'month_year' => 'required|date_format:Y-m',
            'logs' => 'required|array',
            'logs.*.log_date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    // Validate that the date is within the selected month
                    $selectedMonth = Carbon::createFromFormat('Y-m', $request->month_year);
                    $logDate = Carbon::createFromFormat('Y-m-d', $value);

                    if (!$logDate->isSameMonth($selectedMonth)) {
                        $fail("The date must be within the selected month.");
                    }
                }
            ],
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

            // First delete existing entries for this month
            DB::table('eye_wash_logs')
                ->whereMonth('log_date', $month)
                ->whereYear('log_date', $year)
                ->delete();

            // Insert new logs
            foreach ($request->logs as $logData) {
                // Only save if there's at least one field with data
                if (
                    $logData['water_changed'] || $logData['changed_by'] ||
                    $logData['signature'] || $logData['remarks']
                ) {

                    DB::table('eye_wash_logs')->insert([
                        'log_date' => $logData['log_date'],
                        'department' => $request->department,
                        'water_changed' => $logData['water_changed'],
                        'changed_by' => $logData['changed_by'],
                        'signature' => $logData['signature'],
                        'remarks' => $logData['remarks'],
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


    public function fetch29(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
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

            $logs = DB::table('ipa_preparations')

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

    public function store29(Request $request)
    {

        //dd($request);
        $validator = Validator::make($request->all(), [
            'department' => 'required|string|max:255',
            'month_year' => 'required|date_format:Y-m',

            'logs' => 'required|array',
            'logs.*.log_date' => 'required|date',
            // 'logs.*.water_changed' => 'nullable|string',
            // 'logs.*.changed_by' => 'nullable|string',
            // 'logs.*.signature' => 'nullable|string',
            // 'logs.*.remarks' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            // First delete existing entries for this month/instrument
            $month = Carbon::createFromFormat('Y-m', $request->month_year)->month;
            $year = Carbon::createFromFormat('Y-m', $request->month_year)->year;

            DB::table('ipa_preparations')

                ->whereMonth('log_date', $month)
                ->whereYear('log_date', $year)
                ->delete();

            // Insert new logs
            foreach ($request->logs as $logData) {
                // Only save if there's at least one field with data
                if (
                    $logData['volume_prepared'] || $logData['prepared_by'] ||
                    $logData['signature1'] || $logData['verified_by'] ||
                    $logData['signature2'] || $logData['remarks']
                ) {

                    DB::table('ipa_preparations')->insert([
                        'log_date' => $logData['log_date'],
                        'department' => $request->department,
                        'volume_prepared' => $logData['volume_prepared'],
                        'prepared_by' => $logData['prepared_by'],
                        'signature1' => $logData['signature1'],
                        'verified_by' => $logData['verified_by'],
                        'signature2' => $logData['signature2'],
                        'remarks' => $logData['remarks'],
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



    public function store30(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'incident-doc-no' => 'required|string|max:255|unique:incident_reports,incident_doc_no',
            'incident-date' => 'required|date',
            'location-department' => 'required|string|max:255',
            'person-reporting' => 'required|string',
            'patient-barcode' => 'nullable|string|max:255',
            'involvement' => 'required|in:in-house,external',
            'external-person' => 'nullable|required_if:involvement,external|string|max:255',
            'organization' => 'nullable|required_if:involvement,external|string|max:255',
            'incident-date-only' => 'required|date',
            'incident-time' => 'required',
            'attention' => 'required|in:was-involved,reported-to-me,other',
            'other-attention' => 'nullable|required_if:attention,other|string|max:255',
            'incident-type' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create new incident report
        DB::table('incident_reports')->insert([
            'incident_doc_no' => $request->input('incident-doc-no'),
            'document_date' => $request->input('incident-date'),
            'location_department' => $request->input('location-department'),
            'person_reporting' => $request->input('person-reporting'),
            'patient_barcode' => $request->input('patient-barcode'),
            'involvement_type' => $request->input('involvement'),
            'external_person' => $request->input('external-person'),
            'organization' => $request->input('organization'),
            'incident_date' => $request->input('incident-date-only'),
            'incident_time' => $request->input('incident-time'),
            'attention_type' => $request->input('attention'),
            'other_attention' => $request->input('other-attention'),
            'incident_type' => $request->input('incident-type'),
        ]);

        return redirect()->back()
            ->with('success', 'Incident report created successfully.');
    }


    public function storeHisto3(Request $request)
    {
        try {
            $validated = $request->validate([
                'month_year' => 'required|date',
                'instrument_id' => 'required|exists:instruments,instrument_id',
            ]);

            DB::beginTransaction();

            // Prepare data structure
            $data = [
                'temperature' => $request->temperature ?? [],
                'staff_signature' => $request->staff_signature ?? [],
                'supervisor_signature' => $request->supervisor_signature ?? []
            ];

            // Extract year and month from the date
            $date = Carbon::parse($request->month_year);
            $year = $date->year;
            $month = $date->month;

            // First try to find existing record
            $existingLog = DB::table('tissue_temp_logs')
                ->where('instrument_id', $request->instrument_id)
                ->whereYear('month_year', $year)
                ->whereMonth('month_year', $month)
                ->first();

            if ($existingLog) {
                // Update existing record
                DB::table('tissue_temp_logs')
                    ->where('id', $existingLog->id)
                    ->update([
                        'temperature_data' => json_encode($data['temperature']),
                        'staff_signature_data' => json_encode($data['staff_signature']),
                        'supervisor_signature_data' => json_encode($data['supervisor_signature'])
                    ]);
            } else {
                // Create new record
                DB::table('tissue_temp_logs')->insert([
                    'instrument_id' => $request->instrument_id,
                    'month_year' => $request->month_year,
                    'temperature_data' => json_encode($data['temperature']),
                    'staff_signature_data' => json_encode($data['staff_signature']),
                    'supervisor_signature_data' => json_encode($data['supervisor_signature'])
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully'
            ]);

        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function fetchHisto3(Request $request)
    {
        $request->validate([
            'month_year' => 'required|date',
            'instrument_id' => 'required|exists:instruments,instrument_id',
        ]);

        $year = date('Y', strtotime($request->month_year));
        $month = date('m', strtotime($request->month_year));

        $log = DB::table('tissue_temp_logs')
            ->where('instrument_id', $request->instrument_id)
            ->whereYear('month_year', $year)
            ->whereMonth('month_year', $month)
            ->first();

        if ($log) {
            return response()->json([
                'success' => true,
                'data' => [
                    'temperature' => json_decode($log->temperature_data, true),
                    'staff_signature' => json_decode($log->staff_signature_data, true),
                    'supervisor_signature' => json_decode($log->supervisor_signature_data, true)
                ]
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => null
        ]);
    }


    public function store31(Request $request)
    {
        try {
            $validated = $request->validate([
                'month_year' => 'required|date',
                'level' => 'nullable|string',
                'instrument_id' => 'required|string',
                'control_lot_no' => 'nullable|string',
                'control_expiry_date' => 'nullable|date',
                'parameters' => 'required|array'
            ]);

            DB::beginTransaction();

            $year = Carbon::parse($request->month_year)->year;
            $month = Carbon::parse($request->month_year)->month;

            // Check if record exists
            $existingRecord = DB::table('iqc_data_logs')
                ->whereYear('month_year', $year)
                ->whereMonth('month_year', $month)
                ->where('instrument_id', $request->instrument_id)
                ->first();

            if ($existingRecord) {
                // Update existing record
                DB::table('iqc_data_logs')
                    ->where('id', $existingRecord->id)
                    ->update([
                        'level' => $request->level,
                        'control_lot_no' => $request->control_lot_no,
                        'control_expiry_date' => $request->control_expiry_date,
                        'parameters' => json_encode($request->parameters),
                        'updated_at' => now()
                    ]);
            } else {
                // Create new record
                DB::table('iqc_data_logs')->insert([
                    'month_year' => $request->month_year,
                    'level' => $request->level,
                    'instrument_id' => $request->instrument_id,
                    'control_lot_no' => $request->control_lot_no,
                    'control_expiry_date' => $request->control_expiry_date,
                    'parameters' => json_encode($request->parameters),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'IQC Data saved successfully'
            ]);

        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving IQC data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function fetch31(Request $request)
    {
        $validated = $request->validate([
            'month_year' => 'required|date',
            'instrument_id' => 'required|string'
        ]);

        try {
            $year = Carbon::parse($request->month_year)->year;
            $month = Carbon::parse($request->month_year)->month;

            $log = DB::table('iqc_data_logs')
                ->whereYear('month_year', $year)
                ->whereMonth('month_year', $month)
                ->where('instrument_id', $request->instrument_id)
                ->first();

            if ($log) {
                // Ensure parameters is properly decoded
                $log->parameters = is_string($log->parameters) ?
                    json_decode($log->parameters, true) :
                    $log->parameters;
            }

            return response()->json([
                'success' => true,
                'data' => $log ?: null
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }
    public function store33(Request $request)
    {
        try {
            $validated = $request->validate([
                'month_year' => 'required|date',
                'entries' => 'required|array',
                'entries.*.date' => 'nullable|date',
                'entries.*.parameter_outlier' => 'nullable|string',
                'entries.*.non_conformity' => 'nullable|string',
                'entries.*.root_cause' => 'nullable|string',
                'entries.*.corrective_action' => 'nullable|string',
                'entries.*.preventive_action' => 'nullable|string',
                'entries.*.closure_date' => 'nullable|date',
                'entries.*.signature' => 'nullable|string'
            ]);

            DB::beginTransaction();

            $year = Carbon::parse($request->month_year)->year;
            $month = Carbon::parse($request->month_year)->month;

            // Check if record exists
            $existingRecord = DB::table('outlier_logs')
                ->whereYear('month_year', $year)
                ->whereMonth('month_year', $month)
                ->first();

            if ($existingRecord) {
                // Update existing record
                DB::table('outlier_logs')
                    ->where('id', $existingRecord->id)
                    ->update([
                        'entries' => json_encode($request->entries),
                        'updated_at' => now()
                    ]);
            } else {
                // Create new record
                DB::table('outlier_logs')->insert([
                    'month_year' => $request->month_year,
                    'entries' => json_encode($request->entries),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Outlier Log saved successfully'
            ]);

        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Outlier Log: ' . $e->getMessage()
            ], 500);
        }
    }

    public function fetch33(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid month/year format'
            ], 400);
        }

        try {
            $year = Carbon::parse($request->month_year)->year;
            $month = Carbon::parse($request->month_year)->month;

            $log = DB::table('outlier_logs')
                ->whereYear('month_year', $year)
                ->whereMonth('month_year', $month)
                ->first();

            return response()->json([
                'success' => true,
                'data' => $log ?: null
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function store32(Request $request)
    {
        $validated = $request->validate([
            'eqas_provider_name' => 'required',
            'eqas_lab_id' => 'required',
            'department-name' => 'required',
            'temperature' => 'required',
            'sample-no' => 'required',
            'accession-no' => 'required',
            'reconstitute-by' => 'required',
            'reconstitution-date' => 'required',
            'processed-by' => 'required',
            'reviewed-by' => 'required',
            'result-qa' => 'required',
            'result-dispatched' => 'required',
            'evaluation-result' => 'required',
            'section-head-signature' => 'required',
        ]);

        $data = collect($validated)
            ->mapWithKeys(function ($value, $key) {
                return [str_replace('-', '_', $key) => $value];
            })->toArray();

        DB::table('eqas_sample_processing_log')->insert($data);

        return redirect()->back()->with('success', 'submitted data');
    }

}
