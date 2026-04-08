<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Forms;
use App\Models\SampleVolume;
use App\Models\SampleReceiving;
use App\Models\SampleOutSourcing;
use App\Models\FirstAidKitLog;
use App\Models\SpecimenSignature;
use App\Models\DistilledWater;
use App\Models\MaintenanceLog;
use App\Models\QcLog;
use App\Models\UrineQcLog;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\ReagentVerificationLog;
use App\Models\InterLabComparison;
use App\Models\RetainedSampleVerification;
use App\Models\ReagentUsageLog;
use App\Models\ReportAmendmentLog;

use Illuminate\Support\Facades\Validator;


class FormsController extends Controller
{
    public function forms_accessioning()
    {
        return view('forms.accessioning');
    }

    public function forms_biochemistry()
    {
        $instruments = DB::table('instruments')->get();
        return view('forms.biochemistry', compact('instruments'));
    }
    public function forms_clinical_pathology()
    {
        $instruments = DB::table('instruments')->get();
        return view('forms.clinical-pathology', compact('instruments'));
    }
    public function forms_hematology()
    {
        $instruments = DB::table('instruments')->get();
        return view('forms.hematology', compact('instruments'));
    }
    public function forms_it()
    {
        return view('forms.it');
    }
    public function forms_mol_bio()
    {
        $instruments = DB::table('instruments')->get();
        return view('forms.mol-bio', compact('instruments'));
    }
    public function forms_microbiology()
    {
        $instruments = DB::table('instruments')->get();
        return view('forms.microbiology', compact('instruments'));
    }
    public function forms_histopathology()
    {
        $instruments = DB::table('instruments')->get();
        return view('forms.histopathology', compact('instruments'));
    }
    public function forms_safety()
    {
        return view('forms.safety');
    }
    public function forms_general()
    {
        $instruments = DB::table('instruments')->get();
        $records = InterLabComparison::all();
        return view('forms.general', compact('instruments', 'records'));
    }
    public function forms_checklist()
    {
        return view('forms.checklist');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rejections' => 'required|array',
            'rejections.*.date_time' => 'required',
            'rejections.*.patient_name' => 'nullable|string|max:255',
            'rejections.*.parameter' => 'nullable|string|max:255',
            'rejections.*.collected_by' => 'nullable|string|max:255',
            'rejections.*.sample_type' => 'nullable|string|max:255',
            'rejections.*.reason_for_rejection' => 'nullable|string',
            'rejections.*.informed_by_name' => 'nullable|string|max:255',
            'rejections.*.informed_by_signature' => 'nullable|string|max:255',
            'rejections.*.informed_to_name' => 'nullable|string|max:255',
            'rejections.*.fresh_sample_received' => 'nullable|boolean',
            'rejections.*.reg_no' => 'nullable|string|max:255',
            'rejections.*.month_year' => 'required'
        ]);

        try {
            DB::beginTransaction();

            // First delete existing entries for this month
            DB::table('sample_rejections')->where('month_year', $validatedData['rejections'][0]['month_year'])->delete();

            // Then insert the new data
            foreach ($validatedData['rejections'] as $rejection) {
                DB::table('sample_rejections')->insert($rejection);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Sample rejection data saved successfully!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getByDate(Request $request)
    {
        $validatedData = $request->validate([
            'month_year' => 'required|date_format:Y-m'
        ]);

        try {
            $rejections = DB::table('sample_rejections')->where('month_year', $validatedData['month_year'])
                ->orderBy('date_time')
                ->get();

            return response()->json($rejections);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function storeVolumeForm(Request $request)
    {
        $validatedData = $request->validate([
            'samples' => 'nullable|array',
            'samples.*.container_type' => 'required|string',
            'samples.*.sample_quantity' => 'nullable|string',
            'samples.*.sample_review_dates' => 'nullable|array',
            'samples.*.special_value' => 'nullable|string',
            'header_dates' => 'nullable|array',
            'month_year' => 'required|date_format:Y-m'
        ]);

        try {
            DB::beginTransaction();

            // First delete existing entries for this month
            SampleVolume::where('month_year', $validatedData['month_year'])->delete();

            // Save header dates as JSON
            $headerDates = $validatedData['header_dates'] ?? [];

            // Process each sample
            foreach ($validatedData['samples'] ?? [] as $sample) {
                $data = [
                    'month_year' => $validatedData['month_year'],
                    'header_dates' => json_encode($headerDates)
                ];

                // Special handling for "Done By" and "Reviewed By"
                if ($sample['container_type'] === "Done By" || $sample['container_type'] === "Reviewed By") {
                    $data['special_value'] = $sample['special_value'] ?? null;
                } else {
                    // Regular container rows
                    $data['sample_quantity'] = $sample['sample_quantity'] ?? null;
                    $data['sample_review_dates'] = json_encode($sample['sample_review_dates'] ?? []);
                }

                SampleVolume::create(array_merge([
                    'container_type' => $sample['container_type']
                ], $data));
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Sample data saved successfully!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function fetchByDate(Request $request)
    {
        $validatedData = $request->validate([
            'month_year' => 'required|date_format:Y-m'
        ]);

        try {
            $records = SampleVolume::where('month_year', $validatedData['month_year'])->get();

            if ($records->isEmpty()) {
                return response()->json([
                    'success' => true,
                    'samples' => [],
                    'header_dates' => []
                ]);
            }

            // Get header dates from first record (they should be the same for all)
            $headerDates = [];
            if ($records->first()->header_dates) {
                $headerDates = json_decode($records->first()->header_dates, true) ?? [];
            }

            // Prepare samples data
            $samples = $records->map(function ($record) {
                $sample = [
                    'container_type' => $record->container_type
                ];

                if ($record->container_type === "Done By" || $record->container_type === "Reviewed By") {
                    $sample['special_value'] = $record->special_value;
                } else {
                    $sample['sample_quantity'] = $record->sample_quantity;
                    $sample['sample_review_dates'] = json_decode($record->sample_review_dates, true) ?? [];
                }

                return $sample;
            });

            return response()->json([
                'success' => true,
                'samples' => $samples,
                'header_dates' => $headerDates
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }
    // In your controller
    public function saveReceivingData(Request $request)
    {
        $validatedData = $request->validate([
            'samples' => 'required|array',
            'samples.*.id' => 'nullable|integer|exists:sample_receiving,id',
            'samples.*.date' => 'nullable',
            'samples.*.time' => 'nullable',
            'samples.*.client_location' => 'nullable|string|max:255',
            'samples.*.client_name' => 'nullable|string|max:255',
            'samples.*.tl_code' => 'nullable|string|max:255',
            'samples.*.blood' => 'nullable|string|max:255',
            'samples.*.covid' => 'nullable|string|max:255',
            'samples.*.csr_name' => 'nullable|string|max:255',
            'samples.*.csr_sign' => 'nullable|string|max:255',
            'samples.*.sample_temp' => 'nullable|string|max:255',
            'samples.*.receiver_name' => 'nullable|string|max:255',
            'samples.*.remark' => 'nullable|string',
            'samples.*.month_year' => 'nullable'
        ]);

        try {
            DB::beginTransaction();

            foreach ($validatedData['samples'] as $sample) {
                if (isset($sample['id']) && $sample['id']) {
                    // Update existing record
                    SampleReceiving::where('id', $sample['id'])->update($sample);
                } else {
                    // Create new record
                    SampleReceiving::create($sample);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage()
            ], 500);
        }
    }

    // In your ReceivingController or appropriate controller
    public function destroy($id)
    {
        try {
            $record = DB::table('sample_receiving')->where('id', $id)->first();

            if (!$record) {
                return response()->json([
                    'success' => false,
                    'message' => 'Record not found'
                ], 404);
            }

            DB::table('sample_receiving')->where('id', $id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Record deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting record: ' . $e->getMessage()
            ], 500);
        }
    }
    public function fetchSampleReceiving(Request $request)
    {
        $validatedData = $request->validate([
            'month_year' => 'required|date_format:Y-m'
        ]);

        try {
            $samples = SampleReceiving::where('month_year', $validatedData['month_year'])
                ->orderBy('date')
                ->orderBy('time')
                ->get();

            return response()->json([
                'success' => true,
                'samples' => $samples
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteReceivingRecord($id)
    {
        try {
            $record = SampleReceiving::findOrFail($id);
            $record->delete();

            return response()->json([
                'success' => true,
                'message' => 'Record deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting record: ' . $e->getMessage()
            ], 500);
        }
    }
    public function saveOutSourcingData(Request $request)
    {
        $validatedData = $request->validate([
            'samples' => 'required|array',
            'samples.*.id' => 'nullable|integer|exists:sample_outsourcing,id',
            'samples.*.date' => 'nullable|date',
            'samples.*.barcode' => 'nullable|string|max:255',
            'samples.*.patient_name' => 'nullable|string|max:255',
            'samples.*.department' => 'nullable|string|max:255',
            'samples.*.test_name_code' => 'nullable|string',
            'samples.*.handover_sign_date_time' => 'nullable|string',
            'samples.*.receiver_sign_date_time' => 'nullable|string',
            'samples.*.handover_outsourced_lab' => 'nullable|string|max:255',
            'samples.*.outsourced_receiver_date_time' => 'nullable|string',
            'samples.*.month_year' => 'nullable|date_format:Y-m'
        ]);

        try {
            DB::beginTransaction();

            foreach ($validatedData['samples'] as $sample) {
                if (isset($sample['id']) && $sample['id']) {
                    // Update existing record
                    SampleOutSourcing::where('id', $sample['id'])->update($sample);
                } else {
                    // Create new record
                    SampleOutSourcing::create($sample);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroyOutsrce($id)
    {
        try {
            $record = DB::table('sample_outsourcing')->where('id', $id)->first();

            if (!$record) {
                return response()->json([
                    'success' => false,
                    'message' => 'Record not found'
                ], 404);
            }

            DB::table('sample_outsourcing')->where('id', $id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Record deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting record: ' . $e->getMessage()
            ], 500);
        }
    }

    public function fetchSampleOutsourcing(Request $request)
    {
        $validatedData = $request->validate([
            'month_year' => 'required|date_format:Y-m'
        ]);

        try {
            $samples = SampleOutSourcing::where('month_year', $validatedData['month_year'])
                ->orderBy('date')
                ->get();

            return response()->json([
                'success' => true,
                'samples' => $samples
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteOutsourcingRecord($id)
    {
        try {
            $record = SampleOutSourcing::findOrFail($id);
            $record->delete();

            return response()->json([
                'success' => true,
                'message' => 'Record deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting record: ' . $e->getMessage()
            ], 500);
        }
    }

    public function saveFirstAidKitLog(Request $request)
    {
        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.*.id' => 'nullable|integer|exists:first_aid_kit_log,id',
            'data.*.item_available' => 'nullable|string|max:255',
            'data.*.expiry_date' => 'nullable|date',
            'data.*.replaced_item' => 'nullable|string|max:255',
            'data.*.quantity_replaced' => 'nullable|string|max:255',
            'data.*.replaced_expiry_date' => 'nullable|date',
            'data.*.replaced_by' => 'nullable|string|max:255',
            'data.*.remarks' => 'nullable|string',
            'data.*.department' => 'required|string|max:255',
            'data.*.month_year' => 'required|date_format:Y-m'
        ]);

        try {
            DB::beginTransaction();

            foreach ($validatedData['data'] as $row) {
                if (isset($row['id']) && $row['id']) {
                    // Update existing record
                    FirstAidKitLog::where('id', $row['id'])->update($row);
                } else {
                    // Create new record
                    FirstAidKitLog::create($row);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'First Aid Kit log saved successfully!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getFirstAidKitLogs(Request $request)
    {
        $validatedData = $request->validate([
            'month_year' => 'required|date_format:Y-m',
            'department' => 'nullable|string|max:255'
        ]);

        try {
            $query = FirstAidKitLog::where('month_year', $validatedData['month_year']);

            if (!empty($validatedData['department'])) {
                $query->where('department', $validatedData['department']);
            }

            $logs = $query->orderBy('created_at')->get();

            return response()->json([
                'success' => true,
                'logs' => $logs
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }




    public function deleteFirstAidRecord($id)
    {
        try {
            $record = FirstAidKitLog::where('id', $id)->first();

            if (!$record) {
                return response()->json([
                    'success' => false,
                    'message' => 'Record not found'
                ], 404);
            }

            FirstAidKitLog::where('id', $id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Record deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting record: ' . $e->getMessage()
            ], 500);
        }
    }


    public function saveSpecimenSignatures(Request $request)
    {
        $validatedData = $request->validate([
            'department' => 'required|string',
            'month_year' => 'required|date',
            'data' => 'required|array',
        ]);

        foreach ($request->data as $row) {
            SpecimenSignature::updateOrCreate(
                ['id' => $row['id'] ?? null], // Update if ID exists, otherwise create new
                [
                    'department' => $validatedData['department'],
                    'month_year' => $validatedData['month_year'],
                    'employee_name' => $row['employee_name'],
                    'designation' => $row['designation'],
                    'full_signature' => $row['full_signature'],
                    'short_signature' => $row['short_signature'],
                ]
            );
        }

        return response()->json(['message' => 'Data saved successfully!']);
    }
    public function getSpecimenLogs(Request $request)
    {
        $validatedData = $request->validate([
            'month_year' => 'required|date',
            'department' => 'nullable|string',
        ]);

        $query = SpecimenSignature::where('month_year', $validatedData['month_year']);

        if (!empty($validatedData['department'])) {
            $query->where('department', $validatedData['department']);
        }

        $logs = $query->get();

        return response()->json($logs);
    }

    public function storeDistilledWater(Request $request)
    {
        $validatedData = $request->validate([
            'instrumentId' => 'required|string',
            'month_year' => 'required|date',
            'data' => 'required|array',
        ]);

        foreach ($request->data as $row) {
            DistilledWater::updateOrCreate(
                ['id' => $row['id'] ?? null], // Update if ID exists, otherwise create new
                [
                    'dated' => $validatedData['month_year'],
                    'motor_working' => $row['motor_working'],
                    'tds' => $row['tds'],
                    'ph' => $row['ph'],
                    'filters' => $row['filters'],
                    'leakage' => $row['leakage'],
                    'done_by' => $row['done_by'],
                    'instrumentId' => $validatedData['instrumentId']
                ]
            );
        }

        return response()->json(['message' => 'Data saved successfully!']);
    }

    public function getDistilledwater(Request $request)
    {
        $validatedData = $request->validate([
            'month_year' => 'required|date',
            'instrumentId' => 'nullable|string',
        ]);

        $query = DistilledWater::where('dated', $validatedData['month_year']);

        // if (!empty($validatedData['department'])) {
        //     $query->where('department', $validatedData['department']);
        // }

        $logs = $query->get();

        return response()->json($logs);
    }

    public function getMaintenanceLog(Request $request)
    {
        try {
            $request->validate([
                // 'month_year' => 'required|date',
                // 'instrument_id' => 'required'
            ]);

            $year = date('Y', strtotime($request->month_year));
            $month = date('m', strtotime($request->month_year));

            $log = DB::table('microscope_maintenance_logs')
                ->where('instrument_id', $request->instrument_id)
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
                'message' => 'Error fetching maintenance data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function saveMaintenanceLog(Request $request)
    {
        // dd($request->all());
        try {
            $validated = $request->validate([
                // 'month_year' => 'required|date',
                // 'instrument_id' => 'required',
                // 'tasks' => 'required|array'
            ]);

            DB::beginTransaction();

            $year = date('Y', strtotime($request->month_year));
            $month = date('m', strtotime($request->month_year));

            $existingLog = DB::table('microscope_maintenance_logs')
                ->where('instrument_id', $request->instrument_id)
                ->whereYear('month_year', $year)
                ->whereMonth('month_year', $month)
                ->first();
            if ($existingLog) {
                DB::table('microscope_maintenance_logs')
                    ->where('id', $existingLog->id)
                    ->update([
                        'tasks' => json_encode($request->tasks),
                        'updated_at' => now()
                    ]);
            } else {
                DB::table('microscope_maintenance_logs')->insert([
                    'instrument_id' => $request->instrument_id,
                    'month_year' => $request->month_year,
                    'tasks' => json_encode($request->tasks),
                    'updated_at' => now()
                ]);
            }


            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Maintenance log saved successfully'
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
                'message' => 'Error saving maintenance log: ' . $e->getMessage()
            ], 500);
        }
    }


    // In your controller (e.g., CentrifugeController.php)
    public function getCentrifugeMaintenanceLog(Request $request)
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

            $logs = DB::table('centrifuge_maintenance_logs')
                ->where('month_year', $request->month) // Exact match on YYYY-MM format
                ->where('equipment_id', $equipmentId)
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
    public function saveCentrifugeMaintenanceLog(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'logs' => 'required|array',
                'logs.*.month_year' => 'required|date_format:Y-m',
                'logs.*.equipment_id' => 'required|exists:instruments,instrument_id',
                'logs.*.department' => 'required|string',
                'logs.*.task' => 'required|string',
                'logs.*.days_data' => 'required|array'
            ]);

            $savedCount = 0;

            foreach ($request->logs as $log) {
                DB::table('centrifuge_maintenance_logs')->updateOrInsert(
                    [
                        'month_year' => $log['month_year'],
                        'equipment_id' => $log['equipment_id'],
                        'task' => $log['task']
                    ],
                    [
                        'department' => $log['department'],
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
    public function storeBeckmanMaintainanceLogs(Request $request)
    {
        $data = $request->all();

        try {
            foreach ($data['logs'] as $log) {
                // Skip saving if task is "Daily Maintenance"
                if ($log['task'] === "Daily Maintenance") {
                    continue;
                }

                MaintenanceLog::updateOrCreate(
                    [
                        'date' => $log['date'], // Check only by date
                        'task' => $log['task'],
                        'type' => 'beckman',
                    ],
                    [
                        'instrument_id' => $log['instrument_id'],
                        'task' => $log['task'],
                        'days_data' => json_encode($log['days_data']),
                        'type' => 'beckman'
                    ]
                );
            }

            return response()->json(['message' => 'Maintenance log saved/updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function getBeckmanMaintenanceLog(Request $request)
    {
        $date = $request->query('date');
        $instrumentId = $request->query('instrument_id');

        if (!$date || !$instrumentId) {
            return response()->json(['success' => false, 'message' => 'Date and Instrument ID are required!']);
        }

        $logs = MaintenanceLog::where('date', $date)
            ->where('instrument_id', $instrumentId)
            ->where('type', 'beckman')
            ->get();

        if ($logs->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'No records found!']);
        }

        // Convert days data into JSON format
        $formattedLogs = $logs->map(function ($log) {
            return [
                'task' => $log->task,
                'days_data' => json_decode($log->days_data, true) // Ensure JSON parsing
            ];
        });

        return response()->json(['success' => true, 'data' => $formattedLogs]);
    }

    public function storeBeckmanCoulterMaintainanceLogs(Request $request)
    {
        $data = $request->all();

        try {
            foreach ($data['logs'] as $log) {
                // Skip saving if task is "Daily Maintenance"
                if ($log['task'] === "Daily Maintenance") {
                    continue;
                }

                MaintenanceLog::updateOrCreate(
                    [
                        'date' => $log['date'], // Check only by date
                        'task' => $log['task'],
                        'type' => 'beckmanCoulter'
                    ],
                    [
                        'instrument_id' => $log['instrument_id'],
                        'task' => $log['task'],
                        'days_data' => json_encode($log['days_data']),
                        'type' => 'beckmanCoulter'
                    ]
                );
            }

            return response()->json(['message' => 'Maintenance log saved/updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function getBeckmanCoulterMaintenanceLog(Request $request)
    {
        $date = $request->query('date');
        $instrumentId = $request->query('instrument_id');

        if (!$date || !$instrumentId) {
            return response()->json(['success' => false, 'message' => 'Date and Instrument ID are required!']);
        }

        $logs = MaintenanceLog::where('date', $date)
            ->where('instrument_id', $instrumentId)
            ->where('type', 'beckmanCoulter')
            ->get();

        if ($logs->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'No records found!']);
        }

        // Convert days data into JSON format
        $formattedLogs = $logs->map(function ($log) {
            return [
                'task' => $log->task,
                'days_data' => json_decode($log->days_data, true) // Ensure JSON parsing
            ];
        });

        return response()->json(['success' => true, 'data' => $formattedLogs]);
    }
    public function storeLauraMaintainanceLogs(Request $request)
    {
        try {
            $validated = $request->validate([
                'month_year' => 'required|date',
                'instrument_id' => 'required',
                'tasks' => 'required|array'
            ]);

            DB::beginTransaction();

            $year = date('Y', strtotime($request->month_year));
            $month = date('m', strtotime($request->month_year));

            $existingLog = DB::table('maintenance_logs')
                ->where('instrument_id', $request->instrument_id)
                ->whereYear('date', $year)
                ->whereMonth('date', $month)
                ->where('type', 'lauraLogs')
                ->first();
            if ($existingLog) {
                DB::table('maintenance_logs')
                    ->where('id', $existingLog->id)
                    ->update([
                        'tasks' => json_encode($request->tasks),
                        'updated_at' => now()
                    ]);
            } else {
                DB::table('maintenance_logs')->insert([
                    'instrument_id' => $request->instrument_id,
                    'date' => $request->month_year,
                    'tasks' => json_encode($request->tasks),
                    'type' => 'lauraLogs',
                    'updated_at' => now()
                ]);
            }


            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Maintenance log saved successfully'
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
                'message' => 'Error saving maintenance log: ' . $e->getMessage()
            ], 500);
        }

    }


    public function getLauraMaintenanceLog(Request $request)
    {
        try {
            $request->validate([
                // 'month_year' => 'required|date',
                // 'instrument_id' => 'required'
            ]);

            $year = date('Y', strtotime($request->month_year));
            $month = date('m', strtotime($request->month_year));

            $log = DB::table('maintenance_logs')
                ->where('instrument_id', $request->instrument_id)
                ->whereYear('date', $year)
                ->whereMonth('date', $month)
                ->where('type', 'lauraLogs')
                ->first();

            return response()->json([
                'success' => true,
                'data' => $log ?: null
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching maintenance data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getLogsByMonthYear(Request $request)
    {
        $monthYear = $request->query('month_year');
        $instrumentId = $request->query('instrument_id');

        $query = QcLog::where('month_year', $monthYear);

        if ($instrumentId) {
            $query->where('instrument_id', $instrumentId);
        }

        $logs = $query->get();

        if ($logs->isEmpty()) {
            return response()->json([]);
        }

        return response()->json($logs);
    }

    public function storeQCLog(Request $request)
    {
        $validatedData = $request->validate([
            'instrument_name' => 'nullable|string',
            'instrument_id' => 'required|string',
            'qc_lot_no' => 'nullable|string',
            'month_year' => 'required|date',
            'data' => 'required|array',
            'data.*.date' => 'required|string', // Day number (1-31)
            'data.*.positive_control' => 'nullable|string',
            'data.*.negative_control' => 'nullable|string',
            'data.*.technician_sign' => 'nullable|string',
            'data.*.pathologist_sign' => 'nullable|string',
            'data.*.remark' => 'nullable|string',
        ]);

        // Delete existing records for this month/year and instrument before saving new ones
        QcLog::where('month_year', $validatedData['month_year'])
            ->where('instrument_id', $validatedData['instrument_id'])
            ->delete();

        // Save the new records
        foreach ($validatedData['data'] as $row) {
            QcLog::create([
                'instrument_name' => $validatedData['instrument_name'],
                'instrument_id' => $validatedData['instrument_id'],
                'qc_lot_no' => $validatedData['qc_lot_no'],
                'month_year' => $validatedData['month_year'],
                'date' => $row['date'], // The day number (1-31)
                'positive_control' => $row['positive_control'] ?? null,
                'negative_control' => $row['negative_control'] ?? null,
                'technician_sign' => $row['technician_sign'] ?? null,
                'pathologist_sign' => $row['pathologist_sign'] ?? null,
                'remark' => $row['remark'] ?? null
            ]);
        }

        return response()->json(['message' => 'QC Log data saved successfully!']);
    }

    public function storeUrineQcLog(Request $request)
    {
        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.*.date' => 'required|string',
            'data.*.blood_1' => 'nullable|string',
            'data.*.blood_2' => 'nullable|string',
            'data.*.leucocyte_1' => 'nullable|string',
            'data.*.leucocyte_2' => 'nullable|string',
            'data.*.bilirubin_1' => 'nullable|string',
            'data.*.bilirubin_2' => 'nullable|string',
            'data.*.urobilinogen_1' => 'nullable|string',
            'data.*.urobilinogen_2' => 'nullable|string',
            'data.*.ketones_1' => 'nullable|string',
            'data.*.ketones_2' => 'nullable|string',
            'data.*.glucose_1' => 'nullable|string',
            'data.*.glucose_2' => 'nullable|string',
            'data.*.proteins_1' => 'nullable|string',
            'data.*.proteins_2' => 'nullable|string',
            'data.*.ph_1' => 'nullable|string',
            'data.*.ph_2' => 'nullable|string',
            'data.*.nitrites_1' => 'nullable|string',
            'data.*.nitrites_2' => 'nullable|string',
            'data.*.specific_gravity_1' => 'nullable|string',
            'data.*.specific_gravity_2' => 'nullable|string',
            'data.*.performed_by' => 'nullable|string',
            'data.*.reviewed_by' => 'nullable|string',
            'instrument_id' => 'required|string|exists:instruments,instrument_id',
            'month_year' => 'required|date_format:Y-m',
        ]);

        try {
            DB::beginTransaction();

            // First delete all existing entries for this instrument and month
            UrineQcLog::where('instrument_id', $validatedData['instrument_id'])
                ->where('month_year', $validatedData['month_year'])
                ->delete();

            // Then insert the new data
            foreach ($validatedData['data'] as $row) {
                // Only save rows that have at least one data field filled (or is reference range)
                $hasData = false;
                foreach ($row as $key => $value) {
                    if ($key !== 'date' && $value !== null && $value !== '') {
                        $hasData = true;
                        break;
                    }
                }

                if ($hasData || $row['date'] === 'Ref Range') {
                    UrineQcLog::create([
                        'instrument_id' => $validatedData['instrument_id'],
                        'month_year' => $validatedData['month_year'],
                        'date' => $row['date'],
                        'blood_1' => $row['blood_1'] ?? null,
                        'blood_2' => $row['blood_2'] ?? null,
                        'leucocyte_1' => $row['leucocyte_1'] ?? null,
                        'leucocyte_2' => $row['leucocyte_2'] ?? null,
                        'bilirubin_1' => $row['bilirubin_1'] ?? null,
                        'bilirubin_2' => $row['bilirubin_2'] ?? null,
                        'urobilinogen_1' => $row['urobilinogen_1'] ?? null,
                        'urobilinogen_2' => $row['urobilinogen_2'] ?? null,
                        'ketones_1' => $row['ketones_1'] ?? null,
                        'ketones_2' => $row['ketones_2'] ?? null,
                        'glucose_1' => $row['glucose_1'] ?? null,
                        'glucose_2' => $row['glucose_2'] ?? null,
                        'proteins_1' => $row['proteins_1'] ?? null,
                        'proteins_2' => $row['proteins_2'] ?? null,
                        'ph_1' => $row['ph_1'] ?? null,
                        'ph_2' => $row['ph_2'] ?? null,
                        'nitrites_1' => $row['nitrites_1'] ?? null,
                        'nitrites_2' => $row['nitrites_2'] ?? null,
                        'specific_gravity_1' => $row['specific_gravity_1'] ?? null,
                        'specific_gravity_2' => $row['specific_gravity_2'] ?? null,
                        'performed_by' => $row['performed_by'] ?? null,
                        'reviewed_by' => $row['reviewed_by'] ?? null,
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save logs: ' . $e->getMessage()
            ], 500);
        }
    }
    public function getUrineQcLogs(Request $request)
    {
        $validatedData = $request->validate([
            'month_year' => 'required|date_format:Y-m',
            'instrument_id' => 'required|string|exists:instruments,instrument_id'
        ]);

        try {
            $logs = UrineQcLog::where('month_year', $validatedData['month_year'])
                ->where('instrument_id', $validatedData['instrument_id'])
                ->get()
                ->toArray();

            // If no data found, return empty array
            if (empty($logs)) {
                return response()->json([]);
            }

            return response()->json($logs);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }
    public function storeHoribaMaintainanceLogs(Request $request)
    {
        try {
            $validated = $request->validate([
                'month_year' => 'required|date',
                'instrument_id' => 'required',
                'tasks' => 'required|array'
            ]);

            DB::beginTransaction();

            $year = date('Y', strtotime($request->month_year));
            $month = date('m', strtotime($request->month_year));

            $existingLog = DB::table('maintenance_logs')
                ->where('instrument_id', $request->instrument_id)
                ->whereYear('month_year', $year)
                ->whereMonth('month_year', $month)
                ->where('type', 'horiba')
                ->first();
            if ($existingLog) {
                DB::table('maintenance_logs')
                    ->where('id', $existingLog->id)
                    ->update([
                        'tasks' => json_encode($request->tasks),
                        'updated_at' => now()
                    ]);
            } else {
                DB::table('maintenance_logs')->insert([
                    'instrument_id' => $request->instrument_id,
                    'month_year' => $request->month_year,
                    'tasks' => json_encode($request->tasks),
                    'type' => 'horiba',
                    'updated_at' => now()
                ]);
            }


            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Maintenance log saved successfully'
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
                'message' => 'Error saving maintenance log: ' . $e->getMessage()
            ], 500);
        }

    }

    public function getHoribaMaintenanceLog(Request $request)
    {
        try {
            $request->validate([
                // 'month_year' => 'required|date',
                // 'instrument_id' => 'required'
            ]);

            $year = date('Y', strtotime($request->month_year));
            $month = date('m', strtotime($request->month_year));

            $log = DB::table('maintenance_logs')
                ->where('instrument_id', $request->instrument_id)
                ->whereYear('month_year', $year)
                ->whereMonth('month_year', $month)
                ->where('type', 'horiba')
                ->first();

            return response()->json([
                'success' => true,
                'data' => $log ?: null
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching maintenance data: ' . $e->getMessage()
            ], 500);
        }
    }
    public function storeHoribaBeckmanMaintainanceLogs(Request $request)
    {
        try {
            $validated = $request->validate([
                'month_year' => 'required|date',
                'instrument_id' => 'required',
                'tasks' => 'required|array'
            ]);

            DB::beginTransaction();

            $year = date('Y', strtotime($request->month_year));
            $month = date('m', strtotime($request->month_year));

            $existingLog = DB::table('maintenance_logs')
                ->where('instrument_id', $request->instrument_id)
                ->whereYear('month_year', $year)
                ->whereMonth('month_year', $month)
                ->where('type', 'horibabeckman')
                ->first();
            if ($existingLog) {
                DB::table('maintenance_logs')
                    ->where('id', $existingLog->id)
                    ->update([
                        'tasks' => json_encode($request->tasks),
                        'updated_at' => now()
                    ]);
            } else {
                DB::table('maintenance_logs')->insert([
                    'instrument_id' => $request->instrument_id,
                    'month_year' => $request->month_year,
                    'tasks' => json_encode($request->tasks),
                    'type' => 'horibabeckman',
                    'updated_at' => now()
                ]);
            }


            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Maintenance log saved successfully'
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
                'message' => 'Error saving maintenance log: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getHoribaBeckmanMaintenanceLog(Request $request)
    {
        try {
            $request->validate([
                // 'month_year' => 'required|date',
                // 'instrument_id' => 'required'
            ]);

            $year = date('Y', strtotime($request->month_year));
            $month = date('m', strtotime($request->month_year));

            $log = DB::table('maintenance_logs')
                ->where('instrument_id', $request->instrument_id)
                ->whereYear('month_year', $year)
                ->whereMonth('month_year', $month)
                ->where('type', 'horibabeckman')
                ->first();

            return response()->json([
                'success' => true,
                'data' => $log ?: null
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching maintenance data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function storeITLISInterface(Request $request)
    {
        $tableData = $request->input('table_data');

        foreach ($tableData as $row) {
            DB::table('lis_Interface_log')->insert([

                'device' => $row['device'],
                'assay_code' => $row['assay_code'],
                'test_name' => $row['test_name'],
                'equipment' => $row['equipment'],
                'lis' => $row['lis'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return response()->json(['success' => true]);
    }







    public function submitNeedleStickInjury(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date_time' => 'required|date',
            'sequencing' => 'required|string',
            'details_exposure' => 'required|string',
            'counseling' => 'required|string',
            'source_info' => 'required|string',
            'prevention_steps' => 'required|string',
        ]);

        DB::table('needle_stick_injuries')->insert([
            'name' => $request->name,
            'date_time' => $request->date_time,
            'sequencing' => $request->sequencing,
            'details_exposure' => $request->details_exposure,
            'counseling' => $request->counseling,
            'source_info' => $request->source_info,
            'prevention_steps' => $request->prevention_steps,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // return redirect()->back()->with('success', 'form submitted successfully!');
        return response()->json(['success' => true, 'message' => 'Data saved successfully!']);
    }

    public function getReportsByMonth(Request $request)
    {
        try {
            $request->validate([
                'month_year' => 'required|date_format:Y-m'
            ]);

            $date = Carbon::createFromFormat('Y-m', $request->month_year);

            $reports = DB::table('accident_incident_reports')
                ->whereYear('date_time', $date->year)
                ->whereMonth('date_time', $date->month)
                ->orderBy('date_time', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $reports
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching reports: ' . $e->getMessage()
            ], 500);
        }
    }

    // Submit reports
    public function submitAccidentIncidentReport(Request $request)
    {
        try {
            $request->validate([
                'month_year' => 'required|date_format:Y-m',
                'date_time.*' => 'required|date',
                'person_involved.*' => 'required|string|max:255',
                'injuries_sustained.*' => 'required|string',
                'emergency_first_aid.*' => 'required|string',
                'first_aid_by.*' => 'required|string|max:255',
                'follow_up_action.*' => 'required|string',
                'preventive_action.*' => 'required|string',
            ]);

            [$year, $month] = explode('-', $request->month_year);

            // Delete existing records for this month/year
            DB::table('accident_incident_reports')
                ->whereYear('date_time', $year)
                ->whereMonth('date_time', $month)
                ->delete();

            // Insert new records
            foreach ($request->date_time as $index => $dateTime) {
                DB::table('accident_incident_reports')->insert([
                    'date_time' => $dateTime,
                    'person_involved' => $request->person_involved[$index],
                    'injuries_sustained' => $request->injuries_sustained[$index],
                    'emergency_first_aid' => $request->emergency_first_aid[$index],
                    'first_aid_by' => $request->first_aid_by[$index],
                    'follow_up_action' => $request->follow_up_action[$index],
                    'preventive_action' => $request->preventive_action[$index],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully!',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function getVaccinationMonitoringData(Request $request)
    {
        try {
            $request->validate([
                'expiry_date' => 'required|date'
            ]);

            $expiryDate = $request->expiry_date;

            $records = DB::table('vaccination_monitoring_logs')
                ->whereDate('expiry_date', $expiryDate)
                ->orderBy('employee_name', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $records
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching vaccination data: ' . $e->getMessage()
            ], 500);
        }
    }

    // Submit vaccination monitoring data
    public function submitVaccinationMonitoringLog(Request $request)
    {
        try {
            $request->validate([
                'expiry_date' => 'required|date',
                'hepatitis_lot_no' => 'nullable|string|max:255',
                'tetanus_lot_no' => 'nullable|string|max:255',
                'employee_name' => 'required|array',
                'employee_name.*' => 'required|string|max:255',
                'hepatitis_dose1_date' => 'required|array',
                'hepatitis_dose1_date.*' => 'required|date',
                'hepatitis_dose1_signature' => 'nullable|array',
                'hepatitis_dose1_signature.*' => 'nullable|string|max:255',
                'hepatitis_dose2_date' => 'required|array',
                'hepatitis_dose2_date.*' => 'required|date',
                'hepatitis_dose2_signature' => 'nullable|array',
                'hepatitis_dose2_signature.*' => 'nullable|string|max:255',
                'hepatitis_dose3_date' => 'nullable|array',
                'hepatitis_dose3_date.*' => 'nullable|date',
                'hepatitis_dose3_signature' => 'nullable|array',
                'hepatitis_dose3_signature.*' => 'nullable|string|max:255',
                'hepatitis_booster_date' => 'nullable|array',
                'hepatitis_booster_date.*' => 'nullable|date',
                'hepatitis_booster_signature' => 'nullable|array',
                'hepatitis_booster_signature.*' => 'nullable|string|max:255',
                'titre_results' => 'nullable|array',
                'titre_results.*' => 'nullable|string',
                'tetanus_booster_date' => 'nullable|array',
                'tetanus_booster_date.*' => 'nullable|date',
                'tetanus_booster_signature' => 'nullable|array',
                'tetanus_booster_signature.*' => 'nullable|string|max:255',
            ]);

            // First delete existing records for this expiry date
            DB::table('vaccination_monitoring_logs')
                ->whereDate('expiry_date', $request->expiry_date)
                ->delete();

            // Insert new records
            $data = [];
            foreach ($request->employee_name as $index => $employeeName) {
                $data[] = [
                    'expiry_date' => $request->expiry_date,
                    'hepatitis_lot_no' => $request->hepatitis_lot_no,
                    'tetanus_lot_no' => $request->tetanus_lot_no,
                    'employee_name' => $employeeName,
                    'hepatitis_dose1_date' => $request->hepatitis_dose1_date[$index] ?? null,
                    'hepatitis_dose1_signature' => $request->hepatitis_dose1_signature[$index] ?? null,
                    'hepatitis_dose2_date' => $request->hepatitis_dose2_date[$index] ?? null,
                    'hepatitis_dose2_signature' => $request->hepatitis_dose2_signature[$index] ?? null,
                    'hepatitis_dose3_date' => $request->hepatitis_dose3_date[$index] ?? null,
                    'hepatitis_dose3_signature' => $request->hepatitis_dose3_signature[$index] ?? null,
                    'hepatitis_booster_date' => $request->hepatitis_booster_date[$index] ?? null,
                    'hepatitis_booster_signature' => $request->hepatitis_booster_signature[$index] ?? null,
                    'titre_results' => $request->titre_results[$index] ?? null,
                    'tetanus_booster_date' => $request->tetanus_booster_date[$index] ?? null,
                    'tetanus_booster_signature' => $request->tetanus_booster_signature[$index] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::table('vaccination_monitoring_logs')->insert($data);

            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully!',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function getBiomedicalWasteData(Request $request)
    {
        try {
            $request->validate([
                'month_year' => 'required|date_format:Y-m'
            ]);

            $date = Carbon::createFromFormat('Y-m', $request->month_year);

            $records = DB::table('biomedical_waste_logs')
                ->whereYear('date', $date->year)
                ->whereMonth('date', $date->month)
                ->orderBy('date', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $records
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching biomedical waste data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function submitBiomedicalWasteLog(Request $request)
    {
        try {
            $validated = $request->validate([
                'month_year' => 'required|date_format:Y-m',
                'agency_name' => 'nullable|string|max:255',
                'entries' => 'required|array',
                'entries.*.date' => 'required|date',
                'entries.*.red_color_waste' => 'nullable|string',
                'entries.*.red_color_weight' => 'nullable|string|max:255',
                'entries.*.yellow_color_waste' => 'nullable|string',
                'entries.*.yellow_color_weight' => 'nullable|string|max:255',
                'entries.*.blue_color_waste' => 'nullable|string',
                'entries.*.blue_color_weight' => 'nullable|string|max:255',
                'entries.*.sharp_container_waste' => 'nullable|string',
                'entries.*.sharp_container_weight' => 'nullable|string|max:255',
                'entries.*.housekeeping_staff_signature' => 'nullable|string|max:255',
                'entries.*.bmw_handler_signature' => 'nullable|string|max:255',
            ]);

            [$year, $month] = explode('-', $validated['month_year']);

            // Delete existing records for this month/year
            DB::table('biomedical_waste_logs')
                ->whereYear('date', $year)
                ->whereMonth('date', $month)
                ->delete();

            // Prepare data for insertion
            $dataToInsert = [];
            foreach ($validated['entries'] as $entry) {
                $dataToInsert[] = [
                    'date' => $entry['date'],
                    'agency_name' => $validated['agency_name'],
                    'red_color_waste' => $entry['red_color_waste'] ?? null,
                    'red_color_weight' => $entry['red_color_weight'] ?? null,
                    'yellow_color_waste' => $entry['yellow_color_waste'] ?? null,
                    'yellow_color_weight' => $entry['yellow_color_weight'] ?? null,
                    'blue_color_waste' => $entry['blue_color_waste'] ?? null,
                    'blue_color_weight' => $entry['blue_color_weight'] ?? null,
                    'sharp_container_waste' => $entry['sharp_container_waste'] ?? null,
                    'sharp_container_weight' => $entry['sharp_container_weight'] ?? null,
                    'housekeeping_staff_signature' => $entry['housekeeping_staff_signature'] ?? null,
                    'bmw_handler_signature' => $entry['bmw_handler_signature'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Insert new records
            DB::table('biomedical_waste_logs')->insert($dataToInsert);

            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully!',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Error submitting biomedical waste log: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function getAnalyteCalibrationData(Request $request)
    {
        try {
            $request->validate([
                'month' => 'required|date_format:Y-m'
            ]);

            $date = Carbon::createFromFormat('Y-m', $request->month);

            $records = DB::table('analyte_calibration_logs')
                ->whereYear('date', $date->year)
                ->whereMonth('date', $date->month)
                ->orderBy('date', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $records
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching calibration data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function submitAnalyteCalibrationLog(Request $request)
    {
        try {
            $validated = $request->validate([
                'month' => 'required|date_format:Y-m',
                'entries' => 'required|array',
                'entries.*.date' => 'required|date',
                'entries.*.parameters' => 'nullable|string',
                'entries.*.calibrator_used' => 'nullable|string',
                'entries.*.lot_no' => 'nullable|string',
                'entries.*.level_1' => 'nullable|string',
                'entries.*.level_1_status' => 'nullable|string',
                'entries.*.level_2' => 'nullable|string',
                'entries.*.level_2_status' => 'nullable|string',
                'entries.*.level_3' => 'nullable|string',
                'entries.*.level_3_status' => 'nullable|string',
                'entries.*.scientific_staff_signature' => 'nullable|string',
                'entries.*.supervisor_signature' => 'nullable|string',
            ]);

            [$year, $month] = explode('-', $validated['month']);

            // Delete existing records for this month
            DB::table('analyte_calibration_logs')
                ->whereYear('date', $year)
                ->whereMonth('date', $month)
                ->delete();

            // Prepare data for insertion
            $dataToInsert = array_map(function ($entry) {
                return [
                    'date' => $entry['date'],
                    'parameters' => $entry['parameters'] ?? null,
                    'calibrator_used' => $entry['calibrator_used'] ?? null,
                    'lot_no' => $entry['lot_no'] ?? null,
                    'level_1' => $entry['level_1'] ?? null,
                    'level_1_status' => $entry['level_1_status'] ?? null,
                    'level_2' => $entry['level_2'] ?? null,
                    'level_2_status' => $entry['level_2_status'] ?? null,
                    'level_3' => $entry['level_3'] ?? null,
                    'level_3_status' => $entry['level_3_status'] ?? null,
                    'scientific_staff_signature' => $entry['scientific_staff_signature'] ?? null,
                    'supervisor_signature' => $entry['supervisor_signature'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, $validated['entries']);

            // Insert new records
            DB::table('analyte_calibration_logs')->insert($dataToInsert);

            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully!',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Error submitting calibration log: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function formStore(Request $request)
    {
        // $formName = $request->input('form_name');
        // $data = $request->except('_token', 'form_name');

        // foreach ($data as $columnName => $value) {
        //     DB::table('form_data')->insert([
        //         'form_name' => $formName,
        //         'column_name' => $columnName,
        //         'value' => $value,
        //         'created_at' => Carbon::now(),
        //     ]);
        // }

        // Get the form name
        // $formName = $request->input('form_name');

        // // Get all rows data
        // $rows = $request->input('rows');

        // // Loop through each row
        // foreach ($rows as $row) {
        //     // Loop through each column in the row
        //     foreach ($row as $columnName => $value) {
        //         // Check if the value is not empty
        //         if (!empty($value)) {
        //             DB::table('form_data')->insert([
        //                 'form_name' => $formName,
        //                 'column_name' => $columnName,
        //                 'value' => $value,
        //                 'created_at' => Carbon::now()
        //             ]);
        //         }
        //     }
        // }
        $formName = $request->input('form_name');

        // Get all rows data (if it exists)
        $rows = $request->input('rows', []);

        // Check if rows data is present and is an array
        if (is_array($rows)) {
            // Loop through each row
            foreach ($rows as $row) {
                // Loop through each column in the row
                foreach ($row as $columnName => $value) {
                    // Check if the value is not empty
                    if (!empty($value)) {
                        DB::table('form_data')->insert([
                            'form_name' => $formName,
                            'column_name' => $columnName,
                            'value' => $value,
                            'created_at' => Carbon::now()
                        ]);
                    }
                }
            }
        } else {
            // Handle single-row forms (if needed)
            $data = $request->except('_token', 'form_name', 'rows');
            foreach ($data as $columnName => $value) {
                if (!empty($value)) {
                    DB::table('form_data')->insert([
                        'form_name' => $formName,
                        'column_name' => $columnName,
                        'value' => $value,
                        'created_at' => Carbon::now()
                    ]);
                }
            }
        }
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

    // Fetch form data
    public function formShow($formName)
    {
        $formData = DB::tabble('form_data')->where('form_name', $formName)->get();

        $data = [];
        foreach ($formData as $entry) {
            $data[$entry->column_name][] = $entry->value;
        }

        return view('forms.show', compact('data', 'formName'));
    }

    public function temperature_humidityStore(Request $request)
    {
        $request->validate([
            'month_year' => 'required|date',
            'instrument_sr_no' => 'required|string',
            'logs' => 'required|array',
        ]);

        foreach ($request->logs as $log) {
            // Check if any of the fields have data
            $hasData = false;
            $fields = [
                'morning_humidity',
                'morning_temperature',
                'morning_signature',
                'evening_humidity',
                'evening_temperature',
                'evening_signature',
            ];

            foreach ($fields as $field) {
                if (!empty($log[$field])) {
                    $hasData = true;
                    break;
                }
            }

            // Only save the log if at least one field has data
            if ($hasData) {
                DB::table('temperature_humidity_logs')->insert([
                    'month_year' => $request->month_year,
                    'instrument_sr_no' => $request->instrument_sr_no,
                    'date' => $log['date'],
                    'morning_humidity' => $log['morning_humidity'] ?? null,
                    'morning_temperature' => $log['morning_temperature'] ?? null,
                    'morning_signature' => $log['morning_signature'] ?? null,
                    'evening_humidity' => $log['evening_humidity'] ?? null,
                    'evening_temperature' => $log['evening_temperature'] ?? null,
                    'evening_signature' => $log['evening_signature'] ?? null,
                ]);
            }
        }

        return response()->json(['message' => 'Log saved successfully!'], 200);
    }

    // Fetch log data
    // In your controller (e.g., TemperatureHumidityController.php)

    public function fetchTemperatureHumidityLog(Request $request)
    {
        $request->validate([
            'month_year' => 'required|date',
            'instrument_sr_no' => 'required|string',
        ]);

        $logs = DB::table('temperature_humidity_logs')
            ->where('month_year', $request->month_year)
            ->where('instrument_sr_no', $request->instrument_sr_no)
            ->orderBy('date')
            ->get();

        return response()->json([
            'success' => true,
            'logs' => $logs,
        ]);
    }


    public function reagentVerificationLogStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date',
            'logs' => 'required|array',
            'logs.*.date' => 'nullable|date',
            'logs.*.reagent_kit' => 'nullable|string|max:255',
            'logs.*.old_reagent_lot_no' => 'nullable|string|max:255',
            'logs.*.old_reagent_expiry_date' => 'nullable|date',
            'logs.*.new_reagent_lot_no' => 'nullable|string|max:255',
            'logs.*.new_reagent_expiry_date' => 'nullable|date',
            'logs.*.analytes' => 'nullable|string',
            'logs.*.materials_used' => 'nullable|string',
            'logs.*.specimen_source' => 'nullable|string',
            'logs.*.result_old_lot' => 'nullable|string',
            'logs.*.result_new_lot' => 'nullable|string',
            'logs.*.observed_variation' => 'nullable|string',
            'logs.*.remarks' => 'nullable|string',
            'logs.*.scientific_staff_signature' => 'nullable|string',
            'logs.*.verified_by' => 'nullable|string'
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
            ReagentVerificationLog::where('month_year', $request->month_year)->delete();

            // Create new records
            foreach ($request->logs as $log) {
                ReagentVerificationLog::create([
                    'date' => $log['date'] ?? null,
                    'reagent_kit' => $log['reagent_kit'] ?? null,
                    'old_reagent_lot_no' => $log['old_reagent_lot_no'] ?? null,
                    'old_reagent_expiry_date' => $log['old_reagent_expiry_date'] ?? null,
                    'new_reagent_lot_no' => $log['new_reagent_lot_no'] ?? null,
                    'new_reagent_expiry_date' => $log['new_reagent_expiry_date'] ?? null,
                    'analytes' => $log['analytes'] ?? null,
                    'materials_used' => $log['materials_used'] ?? null,
                    'specimen_source' => $log['specimen_source'] ?? null,
                    'result_old_lot' => $log['result_old_lot'] ?? null,
                    'result_new_lot' => $log['result_new_lot'] ?? null,
                    'observed_variation' => $log['observed_variation'] ?? null,
                    'remarks' => $log['remarks'] ?? null,
                    'scientific_staff_signature' => $log['scientific_staff_signature'] ?? null,
                    'verified_by' => $log['verified_by'] ?? null,
                    'month_year' => $request->month_year
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Reagent verification log saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function fetchReagentVerificationLog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid date format'
            ], 400);
        }

        try {
            $logs = ReagentVerificationLog::where('month_year', $request->month_year)
                ->orderBy('date')
                ->get();

            return response()->json([
                'success' => true,
                'logs' => $logs
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }


    public function reagentUsageLogStore(Request $request)
    {
        $validated = $request->validate([
            'department' => 'required|string|max:255',
            'month_year' => 'required|date_format:Y-m',
            'logs' => 'required|array|min:1',
            'logs.*.date' => 'required|date',
            'logs.*.reagent_name' => 'required|string|max:255',
            'logs.*.lot_no' => 'required|string|max:255',
            'logs.*.expiry_date' => 'required|date',
            'logs.*.scientific_staff_signature' => 'required|string|max:255',
            'logs.*.supervisor_signature' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            // Delete existing logs for this department and month
            ReagentUsageLog::where('department', $validated['department'])
                ->where('month_year', 'like', $validated['month_year'] . '%')
                ->delete();

            // Create new logs
            foreach ($validated['logs'] as $log) {
                ReagentUsageLog::create([
                    'department' => $validated['department'],
                    'month_year' => $validated['month_year'] . '-01',
                    'date' => $log['date'],
                    'reagent_name' => $log['reagent_name'],
                    'lot_no' => $log['lot_no'],
                    'expiry_date' => $log['expiry_date'],
                    'scientific_staff_signature' => $log['scientific_staff_signature'],
                    'supervisor_signature' => $log['supervisor_signature'],
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Reagent log saved successfully.'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save reagent log: ' . $e->getMessage()
            ], 500);
        }
    }

    public function fetchReagentUsageLogs(Request $request)
    {
        $validated = $request->validate([
            'month_year' => 'required|date_format:Y-m',
            'department' => 'nullable|string|max:255'
        ]);

        try {
            $query = ReagentUsageLog::where('month_year', 'like', $validated['month_year'] . '%');

            if (!empty($validated['department'])) {
                $query->where('department', $validated['department']);
            }

            $logs = $query->orderBy('date')
                ->get()
                ->map(function ($item) {
                    return [
                        'date' => $item->date,
                        'reagent_name' => $item->reagent_name,
                        'lot_no' => $item->lot_no,
                        'expiry_date' => $item->expiry_date,
                        'scientific_staff_signature' => $item->scientific_staff_signature,
                        'supervisor_signature' => $item->supervisor_signature
                    ];
                });

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



    public function submitRetainedSampleForm(Request $request)
    {
        $validated = $request->validate([
            'month_year' => 'required|date_format:Y-m',
            'logs' => 'required|array|min:1',
            'logs.*.date' => 'required|date',
            'logs.*.sample_id' => 'nullable|string|max:255',
            'logs.*.test_parameter' => 'nullable|string|max:255',
            'logs.*.initial_result' => 'nullable|string|max:255',
            'logs.*.result_next_day' => 'nullable|string|max:255',
            'logs.*.variation_in_result' => 'nullable|string|max:255',
            'logs.*.is_variation_accepted' => 'nullable|string|max:255',
            'logs.*.done_by' => 'nullable|string|max:255',
            'logs.*.verified_by' => 'nullable|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            // First delete existing logs for this month/year
            RetainedSampleVerification::where('month_year', 'like', $validated['month_year'] . '%')
                ->delete();

            // Then create new logs
            foreach ($validated['logs'] as $log) {
                // Only save if at least one field has data
                if (collect($log)->except('date')->filter()->isNotEmpty()) {
                    RetainedSampleVerification::create([
                        'month_year' => $validated['month_year'] . '-01',
                        'date' => $log['date'],
                        'sample_id' => $log['sample_id'] ?? null,
                        'test_parameter' => $log['test_parameter'] ?? null,
                        'initial_result' => $log['initial_result'] ?? null,
                        'result_next_day' => $log['result_next_day'] ?? null,
                        'variation_in_result' => $log['variation_in_result'] ?? null,
                        'is_variation_accepted' => $log['is_variation_accepted'] ?? null,
                        'done_by' => $log['done_by'] ?? null,
                        'verified_by' => $log['verified_by'] ?? null,
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Retained sample verification logs saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save logs: ' . $e->getMessage()
            ], 500);
        }
    }

    public function fetchRetainedSampleVerification(Request $request)
    {
        $validated = $request->validate([
            'month_year' => 'required|date_format:Y-m'
        ]);

        try {
            $logs = RetainedSampleVerification::where('month_year', 'like', $validated['month_year'] . '%')
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


    public function reportAmendmentLogStore(Request $request)
    {
        $validated = $request->validate([
            'month_year' => 'required|date_format:Y-m',
            'logs' => 'required|array|min:1',
            'logs.*.date' => 'required|date',
            'logs.*.visit_no' => 'nullable|string|max:255',
            'logs.*.parameter' => 'nullable|string|max:255',
            'logs.*.reason_of_amendment' => 'nullable|string|max:255',
            'logs.*.amendment_done_by' => 'nullable|string|max:255',
            'logs.*.original_result' => 'nullable|string|max:255',
            'logs.*.final_result' => 'nullable|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            // First delete existing logs for this month/year
            ReportAmendmentLog::where('month_year', 'like', $validated['month_year'] . '%')
                ->delete();

            // Then create new logs
            foreach ($validated['logs'] as $log) {
                // Only save if at least one field has data (other than date)
                if (collect($log)->except('date')->filter()->isNotEmpty()) {
                    ReportAmendmentLog::create([
                        'month_year' => $validated['month_year'] . '-01',
                        'date' => $log['date'],
                        'visit_no' => $log['visit_no'] ?? null,
                        'parameter' => $log['parameter'] ?? null,
                        'reason_of_amendment' => $log['reason_of_amendment'] ?? null,
                        'amendment_done_by' => $log['amendment_done_by'] ?? null,
                        'original_result' => $log['original_result'] ?? null,
                        'final_result' => $log['final_result'] ?? null,
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Report amendment logs saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save logs: ' . $e->getMessage()
            ], 500);
        }
    }

    public function fetchReportAmendmentData(Request $request)
    {
        $validated = $request->validate([
            'month_year' => 'required|date_format:Y-m'
        ]);

        try {
            $logs = ReportAmendmentLog::where('month_year', 'like', $validated['month_year'] . '%')
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


    public function fetchMicro11(Request $request)
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

            $logs = DB::table('autoclave_chemical_logs')
                ->where('instrument_id', $request->instrument_id)
                ->where('month_year', $request->month_year)

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

    public function storeMicro11(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department' => 'required|string|max:255',
            'month_year' => 'required|date_format:Y-m',
            'instrument_id' => 'required|exists:instruments,id',
            'logs' => 'required|array|min:1',
            'logs.*.log_date' => 'required|date',
            'logs.*.chemical_indicator' => 'nullable|string|max:255',
            //'logs.*.start_time' => 'nullable|date_format:H:i',
            'logs.*.pressure' => 'nullable|string|max:50',
            'logs.*.holding_time' => 'nullable|string|max:50',
            // 'logs.*.stop_time' => 'nullable|date_format:H:i',
            'logs.*.staff_signature' => 'nullable|string|max:100',
            'logs.*.verified_by' => 'nullable|string|max:100'
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

            DB::table('autoclave_chemical_logs')
                ->where('instrument_id', $request->instrument_id)
                ->where('month_year', $request->month_year)
                ->delete();

            // Insert new logs
            foreach ($request->logs as $logData) {
                DB::table('autoclave_chemical_logs')->insert([
                    'instrument_id' => $request->instrument_id,
                    'log_date' => $logData['log_date'],
                    'department' => $request->department,
                    'chemical_indicator' => $logData['chemical_indicator'] ?? null,
                    'start_time' => $logData['start_time'] ?? null,
                    'pressure' => $logData['pressure'] ?? null,
                    'holding_time' => $logData['holding_time'] ?? null,
                    'stop_time' => $logData['stop_time'] ?? null,
                    'staff_signature' => $logData['staff_signature'] ?? null,
                    'verified_by' => $logData['verified_by'] ?? null,
                    'month_year' => $request->month_year,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Logs saved successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save logs: ' . $e->getMessage()
            ], 500);
        }
    }


    public function fetchMicro12(Request $request)
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

            $logs = DB::table('autoclave_biological_logs')
                ->where('instrument_id', $request->instrument_id)
                ->where('month_year', $request->month_year)
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

    public function storeMicro12(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department' => 'required|string|max:255',
            'month_year' => 'required|date_format:Y-m',
            'instrument_id' => 'required|exists:instruments,id',
            'logs' => 'required|array|min:1',
            'logs.*.log_date' => 'required|date',
            'logs.*.biological_indicator' => 'nullable|string|max:255',
            // 'logs.*.start_time' => 'nullable|date_format:H:i',
            'logs.*.pressure' => 'nullable|string|max:50',
            // 'logs.*.holding_time' => 'nullable|string|max:50',
            // 'logs.*.stop_time' => 'nullable|date_format:H:i',
            'logs.*.staff_signature' => 'nullable|string|max:100',
            'logs.*.verified_by' => 'nullable|string|max:100'
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

            DB::table('autoclave_biological_logs')
                ->where('instrument_id', $request->instrument_id)
                ->where('month_year', $request->month_year)
                ->delete();

            // Insert new logs
            foreach ($request->logs as $logData) {
                DB::table('autoclave_biological_logs')->insert([
                    'instrument_id' => $request->instrument_id,
                    'log_date' => $logData['log_date'],
                    'department' => $request->department,
                    'biological_indicator' => $logData['biological_indicator'] ?? null,
                    'start_time' => $logData['start_time'] ?? null,
                    'pressure' => $logData['pressure'] ?? null,
                    'holding_time' => $logData['holding_time'] ?? null,
                    'stop_time' => $logData['stop_time'] ?? null,
                    'staff_signature' => $logData['staff_signature'] ?? null,
                    'verified_by' => $logData['verified_by'] ?? null,
                    'month_year' => $request->month_year,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Logs saved successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save logs: ' . $e->getMessage()
            ], 500);
        }
    }

    public function storeHisto2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month_year' => 'required|date_format:Y-m',
            'instrument_id' => 'required|exists:instruments,id',
            'logs' => 'required|array',
            'logs.*.date' => 'required|date',
            'logs.*.cleaning_status' => 'nullable|string|max:255',
            'logs.*.processor_timing' => 'nullable|date_format:H:i',
            'logs.*.calibrated_timing' => 'nullable|date_format:H:i',
            'logs.*.comments' => 'nullable|string|max:255',
            'logs.*.staff_signature' => 'nullable|string|max:100',
            'logs.*.supervisor_signature' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Filter out empty logs
        $validLogs = array_filter($request->logs, function ($log) {
            return $log['cleaning_status'] || $log['processor_timing'] ||
                $log['calibrated_timing'] || $log['comments'] ||
                $log['staff_signature'] || $log['supervisor_signature'];
        });

        if (empty($validLogs)) {
            return response()->json([
                'success' => false,
                'message' => 'No valid log entries to save'
            ], 422);
        }

        DB::beginTransaction();
        try {
            // Delete existing logs for this month/year and instrument
            $month = date('m', strtotime($request->month_year));
            $year = date('Y', strtotime($request->month_year));

            DB::table('tissue_processor_logs')->where('instrument_id', $request->instrument_id)
                ->whereMonth('log_date', $month)
                ->whereYear('log_date', $year)
                ->delete();

            // Insert new logs
            foreach ($validLogs as $logData) {
                DB::table('tissue_processor_logs')->insert([
                    'instrument_id' => $request->instrument_id,
                    'log_date' => $logData['date'],
                    'cleaning_status' => $logData['cleaning_status'],
                    'processor_timing' => $logData['processor_timing'],
                    'calibrated_timing' => $logData['calibrated_timing'],
                    'comments' => $logData['comments'],
                    'staff_signature' => $logData['staff_signature'],
                    'supervisor_signature' => $logData['supervisor_signature'],
                ]);
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Logs saved successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save logs: ' . $e->getMessage()
            ], 500);
        }
    }

    public function fetchHisto2(Request $request)
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

        $month = date('m', strtotime($request->month_year));
        $year = date('Y', strtotime($request->month_year));

        $logs = DB::table('tissue_processor_logs')->where('instrument_id', $request->instrument_id)
            ->whereMonth('log_date', $month)
            ->whereYear('log_date', $year)
            ->orderBy('log_date')
            ->get();

        return response()->json([
            'success' => true,
            'logs' => $logs
        ]);
    }



    public function storeGnrl22(Request $request)
    {
        $data = $request->input('rows');
        foreach ($data as $row) {
            InterLabComparison::create([
                'date' => $row['date'],
                'registration_no' => $row['registration_no'],
                'test_parameter' => $row['test_parameter'],
                'our_lab_result' => $row['our_lab_result'],
                'referring_lab_result' => $row['referring_lab_result'],
                'difference_percentage' => $row['difference_percentage'],
                'acceptable_status' => $row['acceptable_status'],
                'done_by' => $row['done_by'],
                'reviewed_by' => $row['reviewed_by'],
            ]);
        }

        return response()->json(['success' => true]);

    }

    public function indexGnrl22()
    {
        $records = InterLabComparison::latest()->get();
        return view('interlab.list', compact('records'));
    }


    public function storeGnrl23(Request $request)
    {
        //dd('hello');

        $valid = $request->validate([
            'employee_name' => 'required',
            'date' => 'required',
            'employee_id' => 'required',
            'suggestions' => 'required',
            'management_action' => 'required',
            'employee_signature' => 'required',
            'lab_supervisor' => 'required',
            'lab_director_signature' => 'required',

        ]);
        $data = DB::table('lab_suggestions')->insert([
            'employee_name' => $request->employee_name,
            'date' => $request->date,
            'employee_id' => $request->employee_id,
            'suggestions' => $request->suggestions,
            'management_action' => $request->management_action,
            'employee_signature' => $request->employee_signature,
            'lab_supervisor' => $request->lab_supervisor,
            'lab_director_signature' => $request->lab_director_signature,

        ]);
        if ($data) {
            return redirect()->back()->with('ssuccess', 'form submitted successfully');
        } else {
            return redirect()->back()->withErrors($valid)->withInput();
        }
    }


    public function storeGnrl24(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sin_no' => 'nullable|string|max:255',
            'date' => 'required|date',
            'contact_no' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'complaints_suggestions' => 'nullable|string',
            'signature' => 'nullable|string',
            'communicated' => 'nullable|in:yes,no',
            'complainant_identification' => 'nullable|string',
            'complaint_date' => 'nullable|date',
            'complaint_description' => 'nullable|string',
            'analysis_resolution' => 'nullable|string',
            'closure_by' => 'nullable|string',
            'closure_on' => 'nullable|date',
            'preventive_action' => 'nullable|string',
            'reviewed_by' => 'nullable|string',
            'approved_by' => 'nullable|string',
        ]);

        DB::table('customer_feedbacks')->insert([
            'name' => $request->input('name'),
            'sin_no' => $request->input('sin_no'),
            'date' => $request->input('date'),
            'contact_no' => $request->input('contact_no'),
            'address' => $request->input('address'),
            'complaints_suggestions' => $request->input('complaints_suggestions'),
            'signature' => $request->input('signature'),
            'communicated' => $request->input('communicated'),
            'complainant_identification' => $request->input('complainant_identification'),
            'complaint_date' => $request->input('complaint_date'),
            'complaint_description' => $request->input('complaint_description'),
            'analysis_resolution' => $request->input('analysis_resolution'),
            'closure_by' => $request->input('closure_by'),
            'closure_on' => $request->input('closure_on'),
            'preventive_action' => $request->input('preventive_action'),
            'reviewed_by' => $request->input('reviewed_by'),
            'approved_by' => $request->input('approved_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully');
    }

}

