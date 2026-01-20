<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Location;
use Illuminate\Support\Facades\Storage;
class EQASController extends Controller
{
    public function planner()
    {
        $labs = Location::all();
        // $departs = DB::table('control_setup')->orderBy('created_at', 'desc')->get();
        $departs = DB::table('departments')->orderBy('name')->get();

        return view('eqas.eqas-planner', compact('departs', 'labs'));
    }
    public function submission()
    {
        // $departs = DB::table('control_setup')
        //     ->orderBy('department', 'asc')
        //     ->pluck('department'); // Fetch only the department column
        $labs = Location::all();
        // $departs = DB::table('control_setup')->orderBy('created_at', 'desc')->get();
        // dd($departs); // Debugging: Check the departments being
        $departs = DB::table('departments')->orderBy('name')->get();

        // $providers = DB::table('eqa_data')->get();
        $providers = DB::table('eqa_data')->pluck('eqa_provider')->unique()->values();
        $eqas_names = DB::table('eqa_data')->pluck('eqa_program')->unique()->values();

        return view('eqas.eqas-submission', compact('departs', 'labs', 'providers', 'eqas_names'));
    }

    public function getEqasMonths(Request $request)
    {
        $provider = $request->provider;
        $eqas_name = $request->eqas_name;

        $row = DB::table('eqas_planner')
            ->where('provider', $provider)
            ->where('eqas_name', $eqas_name)
            ->first();

        if ($row && $row->months_selected) {
            $months_selected = json_decode($row->months_selected, true);

            $availableMonths = [];

            $monthNames = [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ];

            foreach ($months_selected as $index => $date) {
                // dd($date);
                if (!empty($date)) {
                    $availableMonths[] = [
                        'label' => $monthNames[$index] . ' - ' . $date,
                        'value' => $date
                    ];
                }
            }

            return response()->json($availableMonths);
        }

        return response()->json([]);
    }

    public function calendar()
    {
        return view('eqas.eqas-calendar');
    }

    // public function getEqasByYear(Request $request)
    // {
    //     //dd('hello');
    //     $year = $request->year;

    //     $eqas = DB::table('eqas_planner')->where('year', $year)->get(['eqas_name', 'months_selected']);

    //     return response()->json($eqas);
    // }

    public function getEqasByYear(Request $request)
    {
        $year = $request->year;

        $eqas = DB::table('eqas_planner')->where('year', $year)->get();
        // dd($eqas);

        $events = [];

        foreach ($eqas as $eqa) {
            $months = json_decode($eqa->months_selected, true); // Ensure it's an array

            if (is_array($months)) {
                foreach ($months as $month) {
                    if ($month != null) {
                        $events[] = [
                            'title' => $eqa->provider . '-' . $eqa->eqas_name,
                            // 'start' => "$year-" . str_pad($month, 2, '0', STR_PAD_LEFT) . "-01",
                            'start' => date('Y-m-d', strtotime($month)),
                            'backgroundColor' => '#ffcc00',
                            'borderColor' => '#ff9900',
                            'textColor' => '#000',
                        ];
                    }
                }
            }
        }

        return response()->json($events);
    }


    public function getILCByYear(Request $request)
    {
        $year = $request->year;

        $eqas = DB::table('ILC_planner')->where('year', $year)->get();
        // dd($eqas);

        $events = [];

        foreach ($eqas as $eqa) {
            $months = json_decode($eqa->months_selected, true); // Ensure it's an array

            if (is_array($months)) {
                foreach ($months as $month) {
                    if ($month != null) {
                        $events[] = [
                            'title' => $eqa->provider . '-' . $eqa->ilc_name,
                            // 'start' => "$year-" . str_pad($month, 2, '0', STR_PAD_LEFT) . "-01",
                            'start' => date('Y-m-d', strtotime($month)),
                            'backgroundColor' => '#ffcc00',
                            'borderColor' => '#ff9900',
                            'textColor' => '#000',
                        ];
                    }
                }
            }
        }

        return response()->json($events);
    }
    public function table()
    {
        $labs = Location::all();
        $data = DB::table('eqas_submissions')->orderBy('created_at', 'desc')->get();
        return view('eqas.eqas-table', compact('data', 'labs'));
    }

    public function ilc_setup()
    {
        $labs = Location::all();
        $departs = DB::table('control_setup')->orderBy('created_at', 'desc')->get();
        return view('ilc.ilc-setup', compact('departs', 'labs'));
    }
    public function ilc_planner()
    {
        $labs = Location::all();
        $departs = DB::table('departments')->orderBy('created_at', 'desc')->get();
        return view('ilc.ilc-planner', compact('departs', 'labs'));
    }
    public function ilc_table()
    {
        $data = DB::table('ilc_submissions')->orderBy('created_at', 'desc')->get();
        $labs = Location::all();
        return view('ilc.ilc-table', compact('data', 'labs'));
    }
    public function ilc_calendar()
    {
        return view('ilc.ilc-calender');
    }

    public function formSubmit(Request $request)
    {
        // dd($request->all());
        \Log::info('Form Data:', $request->all());

        $request->validate([
            'department' => 'required|string',
            'eqa_provider' => 'required|string',
            'eqa_program' => 'required|string',
            'eqa_cycle' => 'required|string',
            'eqas_submission_date' => 'required|date',
            'status' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,jpg,png',
            'parameters' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        // Handle file upload
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('attachments'), $filename);
            $attachmentPath = $filename;
        }

        // dd($request->eqa_cycle);
        // $rawDate = $request->eqa_cycle; // "15-01-2025"
        // $convertedDate = \Carbon\Carbon::createFromFormat('d-m-Y', $rawDate)->format('Y-m-d');

        DB::table('eqas_submissions')->insert([
            'department' => $request->department,
            'eqa_provider' => $request->eqa_provider,
            'eqa_program' => $request->eqa_program,
            'eqa_cycle' => \Carbon\Carbon::createFromFormat('d-m-Y', $request->eqa_cycle)->format('Y-m-d'),
            'eqas_submission_date' => $request->eqas_submission_date,
            'status' => $request->status,
            'attachment' => $attachmentPath,
            'parameters' => $request->parameters,
            'notes' => $request->notes,
            'lab_id' => $request->lab,
            'created_at' => Carbon::now()
        ]);

        // Return JSON response for AJAX
        return response()->json([
            'status' => 'success',
            'message' => 'EQAS Submission saved successfully.'
        ]);
    }
    public function getEqasData($id)
    {
        $record = DB::table('eqas_submissions')->where('id', $id)->first();

        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($record);
    }

    public function getILCDataByLab($labId)
    {
        $data = DB::table('ILC_planner')->where('lab_id', $labId)->get(); // Fetch records for selected lab
        return response()->json($data);
    }
    public function getEQAS22ataByLab($labId)
    {
        $data = DB::table('eqas_submissions')->where('lab_id', $labId)->get(); // Fetch records for selected lab
        return response()->json($data);
    }
    public function store_published_results(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'submission_id' => 'required|exists:eqas_submissions,id',
            'results_submission_date' => 'nullable|date',
            'corrective_actions_required' => 'nullable|in:yes,no',
            'attachment_of_published_results' => 'nullable|file|mimes:pdf,jpg,png,docx',
            'corrective_action_doc' => 'nullable|file|mimes:pdf,jpg,png,docx',
            'parameters_published_results' => 'nullable|string',
            'notes_published_results' => 'nullable|string',
            'corrective_actions' => 'nullable|string',
            'program_status' => 'nullable|string',
        ]);

        $updateData = [
            'results_submission_date' => $validated['results_submission_date'],
            'corrective_actions_required' => $validated['corrective_actions_required'],
            'parameters_published_results' => $request->parameters_published_results,
            'notes_published_results' => $request->notes_published_results,
            'corrective_actions' => $request->corrective_actions,
            'program_status' => $request->program_status,
            'updated_at' => now(),
        ];

        // Handle attachment_of_published_results file
        if ($request->hasFile('attachment_of_published_results')) {
            $file = $request->file('attachment_of_published_results');
            $filename1 = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename1);
            $updateData['attachment_published_results'] = 'uploads/' . $filename1;
        }

        if ($request->hasFile('corrective_action_doc')) {
            $file2 = $request->file('corrective_action_doc');
            $filename2 = time() . '_' . $file2->getClientOriginalName();
            $file2->move(public_path('uploads'), $filename2);
            $updateData['attachment_corrective_actions'] = 'uploads/' . $filename2;
        }

        // Update the record using Query Builder
        DB::table('eqas_submissions')
            ->where('id', $request->submission_id)
            ->update($updateData);

        return response()->json(['message' => 'EQAS record updated successfully using Query Builder!']);
    }
    public function getILCData($id)
    {
        $record = DB::table('ilc_submissions')->where('id', $id)->first();

        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($record);
    }

    public function formSubmitILC(Request $request)
    {
        \Log::info('Form Data:', $request->all());

        $request->validate([
            'department' => 'required|string|max:255',
            'ilc_provider' => 'required|string|max:255',
            'ilc_program' => 'required|string|max:255',
            'ilc_cycle' => 'required|string|max:255',
            'submission_date' => 'required|date',
            'status' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'parameters' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        // Handle file upload
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('ilc/attachments'), $filename);
            $attachmentPath = $filename;
        }

        DB::table('ilc_submissions')->insert([
            'department' => $request->department,
            'ilc_provider' => $request->ilc_provider,
            'ilc_program' => $request->ilc_program,
            'ilc_cycle' => $request->ilc_cycle,
            'submission_date' => $request->submission_date,
            'status' => $request->status,
            'file_path' => $attachmentPath,
            'parameters' => $request->parameters,
            'notes' => $request->notes,
            'created_at' => Carbon::now(),
            'lab_id' => $request->lab
        ]);

        // Return JSON response for AJAX
        return response()->json([
            'status' => 'success',
            'message' => 'EQAS Submission saved successfully.'
        ]);
    }

    public function storeEquasPlnr(Request $request)
    {
        $data = $request->all();

        // dd($data);

        foreach ($data['eqas'] as $eqasRow) {
            $monthOrder = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            $months_selected = array_map(function ($month) use ($eqasRow) {
                return $eqasRow['dates'][$month] ?? null;
            }, $monthOrder);

            DB::table('eqas_planner')->updateOrInsert(
                [
                    'provider' => $eqasRow['provider'],
                    'eqas_name' => $eqasRow['name'],
                    'department' => $eqasRow['department'],
                    'year' => $request->year,
                    'lab_id' => $request->lab,
                ],
                [
                    'months_selected' => json_encode($months_selected),
                    'updated_at' => now(),
                    'created_at' => now(), // This will be ignored if it's an update, but necessary if it's an insert
                ]
            );

        }

        return response()->json(['success' => true, 'message' => 'EQAS data saved successfully!']);
    }


    public function storeILCPlnr(Request $request)
    {
        $validatedData = $request->validate([
            'lab' => 'required|integer',
            'year' => 'required|integer',
            'eqas' => 'required|array',
            'eqas.*.provider' => 'required|string',
            'eqas.*.name' => 'required|string',
            'eqas.*.department' => 'required|string',
            'eqas.*.dates' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            // First fetch existing data for this lab and year
            $existingRecords = DB::table('ILC_planner')
                ->where('lab_id', $validatedData['lab'])
                ->where('year', $validatedData['year'])
                ->get()
                ->keyBy(function ($item) {
                    return $item->provider . '|' . $item->ilc_name . '|' . $item->department;
                });

            $monthOrder = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            foreach ($validatedData['eqas'] as $eqasRow) {
                $key = $eqasRow['provider'] . '|' . $eqasRow['name'] . '|' . $eqasRow['department'];

                // Initialize with existing months if available
                $existingMonths = [];
                if (isset($existingRecords[$key])) {
                    $existingMonths = json_decode($existingRecords[$key]->months_selected, true) ?: [];
                }

                // Merge with new data
                $months_selected = [];
                foreach ($monthOrder as $index => $month) {
                    // Use new value if provided, otherwise keep existing value
                    $months_selected[$index] = $eqasRow['dates'][$month] ?? ($existingMonths[$index] ?? null);
                }

                DB::table('ILC_planner')->updateOrInsert(
                    [
                        'provider' => $eqasRow['provider'],
                        'ilc_name' => $eqasRow['name'],
                        'department' => $eqasRow['department'],
                        'year' => $validatedData['year'],
                        'lab_id' => $validatedData['lab'],
                    ],
                    [
                        'months_selected' => json_encode($months_selected),
                        'updated_at' => now(),
                        'created_at' => isset($existingRecords[$key]) ? $existingRecords[$key]->created_at : now(),
                    ]
                );
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'ILC data saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to save ILC data: ' . $e->getMessage()
            ], 500);
        }
    }
}
