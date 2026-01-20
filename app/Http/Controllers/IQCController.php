<?php

namespace App\Http\Controllers;
use App\Models\Location;
use App\Models\CalibrationParameterTagging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\CalibrationUsage;



class IQCController extends Controller
{
    public function add_validation()
    {
        return view('iqc.add-validation');
    }
    public function validation_list()
    {
        return view('iqc.validation-list');
    }
    public function calibration_list()
    {
        $labs = Location::where('used_for', 'calibrations_factors')->orderBy('created_at', 'desc')->get();
        $locations = Location::all();
        return view('iqc.calibration-list', compact('labs', 'locations'));
    }
    public function add_calibration()
    {
        $labs = Location::where('used_for', 'calibrations_factors')->orderBy('created_at', 'desc')->get();
        $locations = Location::all();
        return view('iqc.add-calibration', compact('labs', 'locations'));
    }
    public function calibration_planner()
    {
        $locations = Location::all();
        return view('iqc.calibration-planner', compact('locations'));
    }
    public function calibration_protocol()
    {
        $labs = Location::where('used_for', 'calibrations_factors')->orderBy('created_at', 'desc')->get();
        $locations = Location::all();
        return view('iqc.calibration-protocol', compact('labs', 'locations'));
    }
    public function control_list()
    {
        $labs = Location::where('used_for', 'calibrations_factors')->orderBy('created_at', 'desc')->get();
        $locations = Location::all();
        return view('iqc.control-list', compact('labs', 'locations'));
    }
    public function add_control()
    {
        $labs = Location::where('used_for', 'control_factors')->orderBy('created_at', 'desc')->get();
        $locations = Location::all();
        return view('iqc.add-control', compact('labs', 'locations'));
    }
    public function control_planner()
    {
        return view('iqc.control-planner');
    }
    public function control_protocol()
    {
        $labs = Location::where('used_for', 'control_factors')->orderBy('created_at', 'desc')->get();
        $locations = Location::all();
        return view('iqc.control-protocol', compact('labs', 'locations'));
    }

    public function control_setup()
    {
        $labs = Location::where('used_for', 'control_factors')->orderBy('created_at', 'desc')->get();
        $locations = Location::all();
        return view('iqc.control-setup', compact('labs', 'locations'));
    }
    public function risk_guide()
    {
        return view('risk.rmguide');
    }

    public function risk_log()
    {
        $data = DB::table('risk_reports')
            ->join('locations', 'risk_reports.lab_id', '=', 'locations.id')
            ->select(
                'risk_reports.*',
                'locations.location as lab_name'
            )
            ->orderBy('risk_reports.created_at', 'desc')
            ->get();

        $labs = DB::table('locations')->get();
        $departments = DB::table('departments')->orderBy('name')->get();

        $severity = collect([
            (object) ['name' => 'Catastrophic (5)', 'value' => 5],
            (object) ['name' => 'Serious (4)', 'value' => 4],
            (object) ['name' => 'Major (3)', 'value' => 3],
            (object) ['name' => 'Moderate (2)', 'value' => 2],
            (object) ['name' => 'Minor (1)', 'value' => 1],
        ]);

        $likehood = collect([
            (object) ['name' => 'Very Likely (5)', 'value' => 5],
            (object) ['name' => 'Likely (4)', 'value' => 4],
            (object) ['name' => 'Possible (3)', 'value' => 3],
            (object) ['name' => 'Remote (2)', 'value' => 2],
            (object) ['name' => 'Unlikely (1)', 'value' => 1],
        ]);

        $category = DB::table('dropdown_options')->where('type', 'RiskCategory')->get();

        return view('risk.risklog', compact('data', 'labs', 'departments', 'severity', 'likehood', 'category'));
    }


    public function risk_log_filter(Request $request)
    {
        // Map numeric values to actual DB strings
        $severityMap = [
            5 => 'Catastrophic (5)',
            4 => 'Serious (4)',
            3 => 'Major (3)',
            2 => 'Moderate (2)',
            1 => 'Minor (1)',
        ];

        $likelihoodMap = [
            5 => 'Very Likely (5)',
            4 => 'Likely (4)',
            3 => 'Possible (3)',
            2 => 'Remote (2)',
            1 => 'Unlikely (1)',
        ];

        $severityStr = $severityMap[$request->severity] ?? null;
        $likelihoodStr = $likelihoodMap[$request->likelihood] ?? null;

        $severityStr2 = $severityMap[$request->residual_severity] ?? null;
        $likelihoodStr2 = $likelihoodMap[$request->residual_likelihood] ?? null;

        $query = DB::table('risk_reports')
            ->join('locations', 'risk_reports.lab_id', '=', 'locations.id')
            ->select('risk_reports.*', 'locations.location as lab_name');

        if ($severityStr && $likelihoodStr && $request->rating) {
            $query->where('severity', $severityStr)
                ->where('likelihood', $likelihoodStr)
                ->where('risk_rating', $request->rating);
        }

        if ($severityStr2 && $likelihoodStr2 && $request->residual_rating) {
            $query->where('residual_severity', $severityStr2)
                ->where('residual_likelihood', $likelihoodStr2)
                ->where('residual_risk_rating', $request->residual_rating);
        }

        $data = $query->orderBy('risk_reports.created_at', 'desc')->get();

        $labs = DB::table('locations')->get();
        $departments = DB::table('departments')->orderBy('name')->get();

        $severity = collect([
            (object) ['name' => 'Catastrophic (5)', 'value' => 5],
            (object) ['name' => 'Serious (4)', 'value' => 4],
            (object) ['name' => 'Major (3)', 'value' => 3],
            (object) ['name' => 'Moderate (2)', 'value' => 2],
            (object) ['name' => 'Minor (1)', 'value' => 1],
        ]);

        $likehood = collect([
            (object) ['name' => 'Very Likely (5)', 'value' => 5],
            (object) ['name' => 'Likely (4)', 'value' => 4],
            (object) ['name' => 'Possible (3)', 'value' => 3],
            (object) ['name' => 'Remote (2)', 'value' => 2],
            (object) ['name' => 'Unlikely (1)', 'value' => 1],
        ]);

        $category = DB::table('dropdown_options')->where('type', 'RiskCategory')->get();

        return view('risk.risklog', compact('data', 'labs', 'departments', 'severity', 'likehood', 'category'));
    }

    public function risk_report()
    {

        $severity = collect([
            (object) ['name' => 'Catastrophic (5)', 'value' => 5],
            (object) ['name' => 'Serious (4)', 'value' => 4],
            (object) ['name' => 'Major (3)', 'value' => 3],
            (object) ['name' => 'Moderate (2)', 'value' => 2],
            (object) ['name' => 'Minor (1)', 'value' => 1],
        ]);

        $likehood = collect([
            (object) ['name' => 'Very Likely (5)', 'value' => 5],
            (object) ['name' => 'Likely (4)', 'value' => 4],
            (object) ['name' => 'Possible (3)', 'value' => 3],
            (object) ['name' => 'Remote (2)', 'value' => 2],
            (object) ['name' => 'Unlikely (1)', 'value' => 1],
        ]);

        $labs = Location::all();
        $calibrations = DB::table('calibration_setup')->select('department')->distinct();
        // dd($calibrations);
        $controls = DB::table('control_setup')->select('department')->distinct();

        $departments = DB::table('departments')->orderBy('name')->get();
        // $severity = DB::table('dropdown_options')->where('type', 'Severity')->get();
        // $likehood = DB::table('dropdown_options')->where('type', 'Likelihood')->get();
        $category = DB::table('dropdown_options')->where('type', 'RiskCategory')->get();
        return view('risk.riskreport', compact('labs', 'departments', 'severity', 'likehood', 'category'));
    }

    public function riskReportStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            //'lab_name' => 'required|string', required
            'risk_category' => 'required|string',
            'risk_name' => 'required|string',
            'description' => 'required|string',
            'severity' => 'required|string',
            'likelihood' => 'required|string',
            'notes_severity' => 'nullable|string',
            'notes_likelihood' => 'nullable|string',
        ]);

        // Calculate risk rating and priority (if needed)
        $risk_rating = $request->input('risk_rating'); // Example logic
        $risk_priority = $request->input('risk_priority');
        ; // Example logic

        $data = DB::table('risk_reports')->insert([
            'lab_name' => $request->lab_name,
            'risk_category' => $request->risk_category,
            'risk_name' => $request->risk_name,
            'description' => $request->description,
            'severity' => $request->severity,
            'likelihood' => $request->likelihood,
            'risk_rating' => $risk_rating,
            'risk_priority' => $risk_priority,
            'notes_severity' => $request->notes_severity,
            'department' => $request->department,
            'notes_likelihood' => $request->notes_likelihood,
            'created_at' => Carbon::now(),
            'lab_id' => $request->lab_id
        ]);
        if ($data) {
            return redirect()->back()->with('success', 'Risk Report submitted successfully!');
        } else {
            return redirect()->back()->with('error', 'Can not submit!');

        }
    }


    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'risk_id' => 'required|exists:risk_reports,id',
                'department' => 'required|string',
                'risk_category' => 'required|string',
                'name' => 'required|string',
                'description' => 'required|string',
                'severity' => 'required|string',
                'likelihood' => 'required|string',
                'risk_rating' => 'required|numeric|min:1|max:25',
                'risk_priority' => 'required|string',
                'notes_severity' => 'nullable|string',
                'notes_likelihood' => 'nullable|string',
                // Treatment fields
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date',
                'target_date' => 'nullable|date',
                'control_status' => 'nullable|string',
                'progress' => 'nullable|numeric',
                'responsible' => 'nullable|string',
                'control_measure_type' => 'nullable|string',
                'action' => 'nullable|string',
                'risk_finish_sequence' => 'nullable|numeric',
                'version' => 'nullable|numeric',

                'residual_severity' => 'nullable|string',
                'residual_likelihood' => 'nullable|string',
                'residual_risk_rating' => 'nullable|numeric|min:1|max:25',
                'residual_risk_priority' => 'nullable|string',
                'residual_notes_severity' => 'nullable|string',
                'residual_notes_likelihood' => 'nullable|string',
            ]);

            DB::beginTransaction();

            // Update risk report
            DB::table('risk_reports')
                ->where('id', $validated['risk_id'])
                ->update([
                    'department' => $validated['department'],
                    'risk_category' => $validated['risk_category'],
                    'risk_name' => $validated['name'],
                    'description' => $validated['description'],
                    'severity' => $validated['severity'],
                    'likelihood' => $validated['likelihood'],
                    'risk_rating' => $validated['risk_rating'],
                    'risk_priority' => $validated['risk_priority'],
                    'notes_severity' => $validated['notes_severity'],
                    'notes_likelihood' => $validated['notes_likelihood'],

                    'residual_severity' => $validated['residual_severity'] ?? null,
                    'residual_likelihood' => $validated['residual_likelihood'] ?? null,
                    'residual_risk_rating' => $validated['residual_risk_rating'] ?? null,
                    'residual_risk_priority' => $validated['residual_risk_priority'] ?? null,
                    'residual_notes_severity' => $validated['residual_notes_severity'] ?? null,
                    'residual_notes_likelihood' => $validated['residual_notes_likelihood'] ?? null,
                    'updated_at' => now()
                ]);

            // Treatment data
            $treatmentData = [
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'target_date' => $validated['target_date'],
                'control_status' => $validated['control_status'],
                'progress' => $validated['progress'],
                'responsible' => $validated['responsible'],
                'control_measure_type' => $validated['control_measure_type'],
                'action' => $validated['action'],
                'risk_finish_sequence' => $validated['risk_finish_sequence'],

                'residual_severity' => $validated['residual_severity'] ?? null,
                'residual_likelihood' => $validated['residual_likelihood'] ?? null,
                'residual_risk_rating' => $validated['residual_risk_rating'] ?? null,
                'residual_risk_priority' => $validated['residual_risk_priority'] ?? null,
                'residual_notes_severity' => $validated['residual_notes_severity'] ?? null,
                'residual_notes_likelihood' => $validated['residual_notes_likelihood'] ?? null,
                'updated_at' => now()
            ];

            // Check if treatment exists for this version
            $existingTreatment = DB::table('risk_mitigations')
                ->where('risk_id', $validated['risk_id'])
                ->where('version', $validated['version'] ?? 1)
                ->first();

            if ($existingTreatment) {
                // Update existing treatment
                DB::table('risk_mitigations')
                    ->where('id', $existingTreatment->id)
                    ->update($treatmentData);
            } else {
                // Create new treatment
                $treatmentData['risk_id'] = $validated['risk_id'];
                $treatmentData['version'] = $validated['version'] ?? 1;
                $treatmentData['is_current'] = true;
                $treatmentData['created_at'] = now();

                DB::table('risk_mitigations')->insert($treatmentData);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Risk updated successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error updating risk: ' . $e->getMessage()
            ], 500);
        }
    }
    public function show($id)
    {
        $risk = DB::table('risk_reports')->where('id', $id)->first();

        if (!$risk) {
            return response()->json([
                'success' => false,
                'message' => 'Risk report not found.'
            ], 404);
        }

        $occurrences = DB::table('risk_occurrences')
            ->where('risk_id', $id)
            ->get();

        $treatments = DB::table('risk_mitigations')
            ->where('risk_id', $id)
            ->orderBy('version', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'risk' => $risk,
                'occurrences' => $occurrences,
                'treatments' => $treatments,
                'treatment_status' => $risk->treatment_status
            ]
        ]);
    }
    public function getLabDetails(Request $request)
    {
        $labId = $request->input('labId');
        $lab = Location::find($labId);

        if ($lab) {
            // Fetch calibration setup data for the selected lab
            $calibrationSetup = DB::table('calibration_parameter_tagging')
                ->where('lab_id', $lab->id)
                ->get();

            $controlSetup = DB::table('control_parameter_tagging')
                ->where('lab_id', $lab->id)
                ->get();

            // Decode JSON parameters for each row
            $calibrationSetup->transform(function ($item) {
                $item->parameters = json_decode($item->parameters, true) ?? []; // Ensure proper decoding
                return $item;
            });
            $controlSetup->transform(function ($item) {
                $item->parameters = json_decode($item->parameters, true) ?? []; // Ensure proper decoding
                return $item;
            });

            return response()->json([
                'success' => true,
                'data' => [
                    'name' => $lab->location,
                    'location' => $lab->location,
                    // 'type' => $lab->type,
                    // 'nabl_status' => $lab->nabl_status,
                    'calibration_setup' => $calibrationSetup,
                    'control_setup' => $controlSetup,
                ],
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Lab not found.',
            ]);
        }
    }

    // In your RiskReportController or similar
    // public function storeRiskOccurrence(Request $request)
    // {
    //     $validated = $request->validate([
    //         'risk_id' => 'required|exists:risk_reports,id',
    //         'occurrences' => 'required|array',
    //         'occurrences.*.date' => 'required|date',
    //         'occurrences.*.mitigation_effective' => 'required|in:Yes,No',
    //         'occurrences.*.review_strategy' => 'required|in:Yes,No',
    //         'occurrences.*.remark' => 'nullable|string',
    //         'freeze_treatment' => 'sometimes|boolean'
    //     ]);

    //     try {
    //         DB::beginTransaction();

    //         // Store each occurrence
    //         foreach ($validated['occurrences'] as $occurrence) {
    //             DB::table('risk_occurrences')->insert([
    //                 'risk_id' => $validated['risk_id'],
    //                 'occurrence_date' => $occurrence['date'],
    //                 'mitigation_effective' => $occurrence['mitigation_effective'],
    //                 'review_strategy' => $occurrence['review_strategy'],
    //                 'remark' => $occurrence['remark'],
    //                 'created_at' => now(),
    //                 'updated_at' => now()
    //             ]);
    //         }

    //         // Freeze the risk treatment if review was requested
    //         if ($validated['freeze_treatment'] ?? false) {
    //             // Freeze the risk report
    //             DB::table('risk_reports')
    //                 ->where('id', $validated['risk_id'])
    //                 ->update(['treatment_status' => 'frozen']);

    //             // Mark current mitigation as not current
    //             DB::table('risk_mitigations')
    //                 ->where('risk_id', $validated['risk_id'])
    //                 ->where('is_current', true)
    //                 ->update(['is_current' => false]);
    //         }

    //         DB::commit();

    //         return response()->json([
    //             'success' => true,
    //             'needs_review' => $validated['freeze_treatment'] ?? false,
    //             'message' => 'Risk occurrences recorded successfully'
    //         ]);

    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }



    // public function shows($id)
    // {
    //     try {
    //         $risk = DB::table('risk_reports')->where('id', $id)->first();

    //         if (!$risk) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Risk report not found'
    //             ], 404);
    //         }

    //         $occurrences = DB::table('risk_occurrences')
    //             ->where('risk_id', $id)
    //             ->orderBy('created_at', 'desc')
    //             ->get();

    //         $treatments = DB::table('risk_mitigations')
    //             ->where('risk_id', $id)
    //             ->orderBy('version', 'desc')
    //             ->get();

    //         return response()->json([
    //             'success' => true,
    //             'data' => [
    //                 'risk' => $risk,
    //                 'occurrences' => $occurrences,
    //                 'treatments' => $treatments,
    //                 'treatment_status' => $risk->treatment_status
    //             ]
    //         ]);

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error fetching risk data: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }



    public function shows($id)
    {
        try {
            $risk = DB::table('risk_reports')
                ->where('id', $id)
                ->first();

            $treatments = DB::table('risk_mitigations')
                ->where('risk_id', $id)
                ->orderBy('version', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => [
                    'risk' => $risk,
                    'treatments' => $treatments
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching risk data'
            ], 500);
        }
    }

    public function freezeTreatment($id)
    {
        try {
            DB::beginTransaction();

            // Freeze the risk report
            DB::table('risk_reports')
                ->where('id', $id)
                ->update(['treatment_status' => 'frozen']);

            // Mark all current treatments as not current
            DB::table('risk_mitigations')
                ->where('risk_id', $id)
                ->where('is_current', true)
                ->update(['is_current' => false]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Treatment frozen successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error freezing treatment: ' . $e->getMessage()
            ], 500);
        }
    }

    public function createNewTreatment(Request $request)
    {
        try {
            $validated = $request->validate([
                'risk_id' => 'required|exists:risk_reports,id',
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date',
                'target_date' => 'nullable|date',
                'control_status' => 'nullable|string',
                'progress' => 'nullable|numeric',
                'responsible' => 'nullable|string',
                'control_measure_type' => 'nullable|string',
                'action' => 'nullable|string',
                'risk_finish_sequence' => 'nullable|numeric',
                'residual_severity' => 'nullable|string',
                'residual_likelihood' => 'nullable|string',
                'residual_risk_rating' => 'nullable|numeric',
                'residual_risk_priority' => 'nullable|string',
                'residual_notes_severity' => 'nullable|string',
                'residual_notes_likelihood' => 'nullable|string',
            ]);

            DB::beginTransaction();

            // Get the latest version number
            $latestVersion = DB::table('risk_mitigations')
                ->where('risk_id', $validated['risk_id'])
                ->max('version');

            // Create new treatment version
            $newVersion = ($latestVersion ?? 0) + 1;

            // Insert new treatment
            $treatmentId = DB::table('risk_mitigations')->insertGetId([
                'risk_id' => $validated['risk_id'],
                'version' => $newVersion,
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'target_date' => $validated['target_date'],
                'control_status' => $validated['control_status'],
                'progress' => $validated['progress'],
                'responsible' => $validated['responsible'],
                'control_measure_type' => $validated['control_measure_type'],
                'action' => $validated['action'],
                'risk_finish_sequence' => $validated['risk_finish_sequence'] ?? $newVersion,
                'residual_severity' => $validated['residual_severity'] ?? null,
                'residual_likelihood' => $validated['residual_likelihood'] ?? null,
                'residual_risk_rating' => $validated['residual_risk_rating'] ?? null,
                'residual_risk_priority' => $validated['residual_risk_priority'] ?? null,
                'residual_notes_severity' => $validated['residual_notes_severity'] ?? null,
                'residual_notes_likelihood' => $validated['residual_notes_likelihood'] ?? null,
                'is_current' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Update risk report status back to active
            DB::table('risk_reports')
                ->where('id', $validated['risk_id'])
                ->update(['treatment_status' => 'active']);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'New treatment version created successfully',
                'treatment_id' => $treatmentId,
                'version' => $newVersion
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error creating new treatment version: ' . $e->getMessage()
            ], 500);
        }
    }

    public function storeRiskOccurrence(Request $request)
    {
        try {
            $validated = $request->validate([
                'risk_id' => 'required|exists:risk_reports,id',
                'occurrences' => 'required|array|min:1',
                'occurrences.*.date' => 'required|date',
                'occurrences.*.mitigation_effective' => 'required|in:Yes,No',
                'occurrences.*.review_strategy' => 'required|in:Yes,No',
                'occurrences.*.remark' => 'nullable|string',
                'freeze_treatment' => 'sometimes|boolean'
            ]);

            DB::beginTransaction();

            foreach ($validated['occurrences'] as $occurrence) {
                DB::table('risk_occurrences')->insert([
                    'risk_id' => $validated['risk_id'],
                    'occurrence_date' => $occurrence['date'],
                    'mitigation_effective' => $occurrence['mitigation_effective'],
                    'review_strategy' => $occurrence['review_strategy'],
                    'remark' => $occurrence['remark'],
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            if ($validated['freeze_treatment'] ?? false) {
                DB::table('risk_reports')
                    ->where('id', $validated['risk_id'])
                    ->update(['treatment_status' => 'frozen']);

                DB::table('risk_mitigations')
                    ->where('risk_id', $validated['risk_id'])
                    ->where('is_current', true)
                    ->update(['is_current' => false]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'needs_review' => $validated['freeze_treatment'] ?? false,
                'message' => 'Risk occurrences recorded successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function getLabDropdownData(Request $request)
    {
        $labId = $request->input('labId');
        $lab = Location::find($labId);

        if ($lab) {
            // Fetch all records from calibration_setup for the selected lab
            $calibrationData = DB::table('calibration_setup')->where('location', $lab->location)->get();
            $controlData = DB::table('control_setup')->where('location', $lab->location)->get();

            // Extract unique values for departments, machines, manufacturers, etc.
            $departments2 = $controlData->unique('department')->pluck('department')->values()->toArray();
            $machines2 = $controlData->unique('machine')->pluck('machine')->values()->toArray();
            $manufacturers2 = $controlData->unique('supplier')->pluck('supplier')->values()->toArray();
            //---------------------------------------------------------------------------------------------
            $departments = $calibrationData->unique('department')->pluck('department')->values()->toArray();
            $machines = $calibrationData->unique('machine')->pluck('machine')->values()->toArray();
            $manufacturers = $calibrationData->unique('supplier')->pluck('supplier')->values()->toArray();
            // dd($manufacturers);

            return response()->json([
                'success' => true,
                'data' => [
                    'departments' => $departments,
                    'machines' => $machines,
                    'manufacturers' => $manufacturers,
                    'machines2' => $machines2,
                    'manufacturers2' => $manufacturers2,
                    'departments2' => $departments2,
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Lab not found.'
            ]);
        }
    }


    public function CalibrationParameterStore(Request $request)
    {
        // Validate the request
        $request->validate([
            'lab_id' => 'required|exists:locations,id', // Ensure the lab exists
            'rows' => 'required|array', // Ensure rows are provided
            'rows.*.department' => 'required|string',
            'rows.*.calibration_manufacturer' => 'required|string',
            'rows.*.calibration_name' => 'required|string',
            'rows.*.suitable_machine' => 'required|string',
            'rows.*.parameters' => 'required|json', // Ensure parameters are valid JSON
        ]);

        // Loop through each row and store in the database
        foreach ($request->rows as $row) {
            CalibrationParameterTagging::create([
                'lab_id' => $request->lab_id,
                'department' => $row['department'],
                'calibration_manufacturer' => $row['calibration_manufacturer'],
                'calibration_name' => $row['calibration_name'],
                'suitable_machine' => $row['suitable_machine'],
                'parameters' => $row['parameters'],
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully.',
        ]);
    }


    public function saveCalibrationProtocol(Request $request)
    {
        $request->validate([
            'lab_id' => 'required|exists:locations,id',
            'protocols' => 'required|array',
            'protocols.*.calibration_id' => 'required|exists:calibration_parameter_tagging,id',
            'protocols.*.is_active' => 'nullable',
            'protocols.*.frequency' => 'required|integer|min:0',
            'protocols.*.notes' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();

            foreach ($request->protocols as $protocol) {
                DB::table('calibration_parameter_tagging')
                    ->where('id', $protocol['calibration_id'])
                    ->update([
                        'is_active' => $protocol['is_active'],
                        'frequency' => $protocol['frequency'],
                        'notes' => $protocol['notes'],
                        'updated_at' => now()
                    ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Protocol saved successfully.'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save protocol: ' . $e->getMessage()
            ], 500);
        }
    }



    public function saveCalibrationUsage(Request $request)
    {
        $validated = $request->validate([
            'lab_id' => 'required|exists:locations,id',
            'usage_data' => 'required|array',
            'usage_data.*.day' => 'required|integer|min:1|max:31',
            'usage_data.*.is_scheduled' => 'required',
            'usage_data.*.parameter' => 'required|string',
            'usage_data.*.tests' => 'required|array',
            'usage_data.*.aliquoted_qty' => 'required|numeric|min:0',
            'usage_data.*.utilized_qty' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            foreach ($validated['usage_data'] as $usage) {
                $calibrationParam = DB::table('calibration_parameter_tagging')
                    ->where('lab_id', $validated['lab_id'])
                    ->where('calibration_name', $usage['parameter'])
                    ->first();

                if ($calibrationParam) {
                    DB::table('calibration_usages')->insert([
                        'lab_id' => $validated['lab_id'],
                        'calibration_parameter_tagging_id' => $calibrationParam->id,
                        'parameter_name' => $usage['parameter'],
                        'day' => $usage['day'],
                        'is_scheduled' => $usage['is_scheduled'],
                        'tests' => json_encode($usage['tests']),
                        'aliquoted_qty' => $usage['aliquoted_qty'],
                        'utilized_qty' => $usage['utilized_qty'],
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Calibration usage data saved successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save data: ' . $e->getMessage()
            ], 500);
        }
    }


    public function controlParameterStore(Request $request)
    {
        // Validate the request
        $request->validate([
            'lab_id' => 'required|exists:locations,id', // Ensure the lab exists
            'rows' => 'required|array', // Ensure rows are provided
            'rows.*.department' => 'required|string',
            'rows.*.control_manufacturer' => 'required|string',
            'rows.*.control_name' => 'required|string',
            'rows.*.suitable_machine' => 'required|string',
            'rows.*.parameters' => 'required|json', // Ensure parameters are valid JSON
        ]);

        // Loop through each row and store in the database
        foreach ($request->rows as $row) {
            DB::table('control_parameter_tagging')->insert([
                'lab_id' => $request->lab_id,
                'department' => $row['department'],
                'control_manufacturer' => $row['control_manufacturer'],
                'control_name' => $row['control_name'],
                'suitable_machine' => $row['suitable_machine'],
                'parameters' => $row['parameters'],
                'created_at' => Carbon::now(),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully.',
        ]);
    }



    public function saveControlProtocol(Request $request)
    {
        $request->validate([
            'labId' => 'required|exists:locations,id',
            'protocols' => 'required|array',
        ]);

        foreach ($request->protocols as $protocol) {
            DB::table('control_protocal_setups')->updateOrInsert(
                ['id' => $protocol['id'] ?? null], // If ID exists, update; otherwise, create new
                [
                    'lab_id' => $request->labId,
                    'department' => $protocol['department'] ?? 'N/A',
                    'test_classification' => $protocol['test_classification'] ?? '---',
                    'is_active_morning' => $protocol['morning']['isActive'] ?? false,
                    'number_of_controls_morning' => $protocol['morning']['numControls'] ?? 0,
                    'type_of_control_morning' => $protocol['morning']['controlType'] ?? '',
                    'notes_morning' => $protocol['morning']['notes'] ?? '',
                    'is_active_afternoon' => $protocol['afternoon']['isActive'] ?? false,
                    'number_of_controls_afternoon' => $protocol['afternoon']['numControls'] ?? 0,
                    'type_of_control_afternoon' => $protocol['afternoon']['controlType'] ?? '',
                    'notes_afternoon' => $protocol['afternoon']['notes'] ?? '',
                    'is_active_evening' => $protocol['evening']['isActive'] ?? false,
                    'number_of_controls_evening' => $protocol['evening']['numControls'] ?? 0,
                    'type_of_control_evening' => $protocol['evening']['controlType'] ?? '',
                    'notes_evening' => $protocol['evening']['notes'] ?? '',
                ]
            );
        }

        return response()->json(['success' => true, 'message' => 'Protocol data saved successfully']);
    }


    public function saveControlUsage(Request $request)
    {
        $validated = $request->validate([
            'lab_id' => 'required|exists:locations,id',
            'usage_data' => 'required|array',
            'usage_data.*.day' => 'required|integer|min:1|max:31',
            'usage_data.*.is_scheduled' => 'required',
            'usage_data.*.parameter' => 'required|string',
            'usage_data.*.tests' => 'required|array',
            'usage_data.*.aliquoted_qty' => 'required|numeric|min:0',
            'usage_data.*.utilized_qty' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            foreach ($validated['usage_data'] as $usage) {
                $controlParam = DB::table('control_parameter_tagging')
                    ->where('lab_id', $validated['lab_id'])
                    ->where('control_name', $usage['parameter'])
                    ->first();

                if ($controlParam) {
                    DB::table('control_usages')->insert([
                        'lab_id' => $validated['lab_id'],
                        'control_parameter_tagging_id' => $controlParam->id,
                        'parameter_name' => $usage['parameter'],
                        'day' => $usage['day'],
                        'is_scheduled' => $usage['is_scheduled'],
                        'tests' => json_encode($usage['tests']),
                        'aliquoted_qty' => $usage['aliquoted_qty'],
                        'utilized_qty' => $usage['utilized_qty'],
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Control usage data saved successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save data: ' . $e->getMessage()
            ], 500);
        }
    }
}
