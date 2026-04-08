<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuditSchedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\AuditFinding;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
class AuditController extends Controller
{
    public function audit_list()
    {
        $data = AuditSchedule::orderBy('created_at', 'desc')->get();
        // $data = AuditSchedule::orderBy('created_at', 'desc')->get();
        // $data = AuditSchedule::with('departmentsRelation')
        //     ->orderBy('created_at', 'desc')
        //     ->get();

        // $data->transform(function ($item) {
        //     // Use relation if loaded, otherwise fallback to departments attribute
        //     $item->departments = $item->relationLoaded('departmentsRelation')
        //         ? $item->departmentsRelation
        //         : (is_string($item->departments) ? json_decode($item->departments, true) : $item->departments);

        //     return $item;
        // });
        // $departments = DB::table('departments')->get();

        // // Attach all departments to each audit schedule item
        // $data->transform(function ($item) use ($departments) {
        //     $item->departments = $departments;
        //     return $item;
        // });
        $findings = AuditFinding::orderBy('created_at', 'desc')->get();

        return view('audit.audit-list', compact('data', 'findings'));
    }
    public function getDepartments($auditId)
    {
        $audit = AuditSchedule::find($auditId);
        $departments = $audit ? explode(',', $audit->departments) : [];
        return response()->json(['departments' => $departments]);
    }
    public function audit_details()
    {

        $departments22 = DB::table('departments')->orderBy('name', 'asc')->get();
        return view('audit.audit-details', compact('departments22'));
    }

    //     public function audit_details($auditScheduleId)
// {
//     // Fetch the audit schedule record
//     $auditSchedule = AuditSchedule::findOrFail($auditScheduleId);

    //     // Decode the stored JSON departments array
//     $departments = json_decode($auditSchedule->departments, true) ?? [];

    //     return view('audit.audit-details', compact('departments', 'auditSchedule'));
// }


    public function management_review()
    {
        return view('audit.management-review');
    }
    public function management_review_list()
    {
        $items = DB::table('management_reviews')->orderBy('created_at', 'desc')->get();
        // $items = DB::table('management_reviews')
        //     ->select('id', 'target_date', 'completed_date', 'item', 'status')
        //     ->whereIn('id', function ($query) {
        //         $query->selectRaw('MIN(id)')
        //             ->from('management_reviews')
        //             ->groupBy(DB::raw('DATE(created_at)'));
        //     })
        //     ->orderBy('id', 'desc')
        //     ->get();
        return view('audit.management-review-list', compact('items'));
    }

    public function auditScheduleStore(Request $request)
    {
        $validatedData = $request->validate([
            'audit_type' => 'required|string',
            'nature_of_audit' => 'required|string',
            'audit_start_date' => 'required|date',
            'audit_end_date' => 'required|date',
            'audit_location' => 'required|string',
            'audit_status' => 'required|string',
            'departments' => 'required|json',
            'auditors' => 'required|json',
            'attendees' => 'required|json',
            'audit_notes' => 'nullable|string',
        ]);

        try {
            // Decode JSON arrays
            $validatedData['departments'] = json_decode($validatedData['departments'], true);
            $validatedData['auditors'] = json_decode($validatedData['auditors'], true);
            $validatedData['attendees'] = json_decode($validatedData['attendees'], true);

            // Validate the arrays after decoding
            if (
                !is_array($validatedData['departments']) ||
                !is_array($validatedData['auditors']) ||
                !is_array($validatedData['attendees'])
            ) {
                throw new \Exception('Invalid array data provided');
            }

            $audit = AuditSchedule::create($validatedData);

            return response()->json([
                'message' => 'Audit Schedule Saved Successfully!',
                'audit' => $audit
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error saving audit schedule',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function mrmStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'items.*.item' => 'required|string',
                'items.*.discussion_guidance' => 'nullable|string',
                'items.*.key_notes' => 'nullable|string',
                'items.*.actions_agreed' => 'nullable|string',
                'items.*.responsibility' => 'nullable|string',
                'items.*.target_date' => 'nullable|date',
                'items.*.file' => 'nullable|file', // 10MB max file size
            ]);

            foreach ($request->items as $index => $item) {
                // Check if at least one field is filled
                if (
                    !empty($item['key_notes']) || !empty($item['actions_agreed']) ||
                    !empty($item['responsibility']) || !empty($item['target_date']) ||
                    $request->hasFile("items.{$index}.file")
                ) {

                    $dataToInsert = [
                        'item' => $item['item'],
                        'discussion_guidance' => $item['discussion_guidance'] ?? null,
                        'key_notes' => $item['key_notes'] ?? null,
                        'actions_agreed' => $item['actions_agreed'] ?? null,
                        'responsibility' => $item['responsibility'] ?? null,
                        'target_date' => $item['target_date'] ?? null,
                        'created_at' => now()
                    ];

                    // Handle file upload if present
                    if ($request->hasFile("items.{$index}.file")) {
                        $file = $request->file("items.{$index}.file");
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $filePath = $file->storeAs('management_reviews', $fileName, 'public');
                        $dataToInsert['file_path'] = $filePath;
                    }

                    DB::table('management_reviews')->insert($dataToInsert);
                }
            }

            return redirect()->back()->with('success', 'Review submitted successfully.');

        } catch (\Exception $e) {
            Log::error('Error storing data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Cannot submit: ' . $e->getMessage());
        }
    }

    //     public function mrmStore(Request $request)
// {
//     // Check if request contains items
//     if (!$request->has('items')) {
//         return back()->with('error', 'No data submitted.');
//     }

    //     // Validate data
//     $validated = $request->validate([
//         'items.*.item' => 'required|string',
//          'items.*.discussion_guidance' => 'nullable|string',
//         'items.*.key_notes' => 'nullable|string',
//         'items.*.actions_agreed' => 'nullable|string',
//         'items.*.responsibility' => 'nullable|string',
//         'items.*.target_date' => 'nullable|date',
//     ]);

    //     // Insert data into database
//     foreach ($validated['items'] as $item) {
//         DB::table('management_reviews')->insert([
//             'item' => $item['item'],
//             'discussion_guidance' => $item['discussion_guidance'],
//             'key_notes' => $item['key_notes'] ?? null,
//             'actions_agreed' => $item['actions_agreed'] ?? null,
//             'responsibility' => $item['responsibility'] ?? null,
//             'target_date' => $item['target_date'] ?? null,
//         ]);
//     }

    //     return back()->with('success', 'Data saved successfully.');
// }

    public function auditFinding_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'audit_schedule_id' => 'required|exists:audit_schedules,id',
            'audit_findings.*.audit_date' => 'required|date',
            'audit_findings.*.department' => 'required',
            'audit_findings.*.assessor' => 'required|string',
            'audit_findings.*.major' => 'nullable|integer',
            'audit_findings.*.minor' => 'nullable|integer',
            'audit_findings.*.observations' => 'nullable|integer',
            'audit_findings.*.details' => 'nullable|string',
            'audit_findings.*.documents.*' => 'nullable|file|max:10240', // 10MB max per file
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            DB::beginTransaction();

            $insertedFindings = [];

            foreach ($request->audit_findings as $index => $finding) {
                $filePaths = [];

                // Handle file uploads
                if ($request->hasFile("audit_findings.$index.documents")) {
                    foreach ($request->file("audit_findings.$index.documents") as $file) {
                        $path = $file->store('audit_findings/documents', 'public');
                        $filePaths[] = $path;
                    }
                }

                $findingData = [
                    'audit_schedule_id' => $request->audit_schedule_id,
                    'audit_date' => $finding['audit_date'],
                    'department' => $finding['department'],
                    'assessor' => $finding['assessor'],
                    'major' => $finding['major'] ?? 0,
                    'minor' => $finding['minor'] ?? 0,
                    'observations' => $finding['observations'] ?? 0,
                    'details' => $finding['details'] ?? null,
                    'documents' => !empty($filePaths) ? json_encode($filePaths) : null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $id = DB::table('audit_findings')->insertGetId($findingData);
                $findingData['id'] = $id;
                $insertedFindings[] = $findingData;
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Audit findings saved successfully!',
                'data' => $insertedFindings
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to save audit findings',
                'error' => $e->getMessage()
            ], 500);
        }
    }




    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'audit_schedule_id' => 'required|exists:audit_schedules,id',
    //         'audit_findings.*.audit_date' => 'required|date',
    //         'audit_findings.*.department' => 'required|string',
    //         'audit_findings.*.assessor' => 'required|string',
    //         'audit_findings.*.nc_type' => 'required|string',
    //         'audit_findings.*.major' => 'nullable|integer',
    //         'audit_findings.*.minor' => 'nullable|integer',
    //         'audit_findings.*.observations' => 'nullable|integer',
    //         'audit_findings.*.details' => 'nullable|string',
    //     ]);

    //     foreach ($request->audit_findings as $finding) {
    //         AuditFinding::create([
    //             'audit_schedule_id' => $request->audit_schedule_id,
    //             'audit_date' => $finding['audit_date'],
    //             'department' => $finding['department'],
    //             'assessor' => $finding['assessor'],
    //             'nc_type' => $finding['nc_type'],
    //             'major' => $finding['major'] ?? 0,
    //             'minor' => $finding['minor'] ?? 0,
    //             'observations' => $finding['observations'] ?? 0,
    //             'details' => $finding['details'],
    //         ]);
    //     }

    //     return redirect()->back()->with('success', 'Audit Findings saved successfully.');
    // }



    public function downloadAuditDocument($filePath)
    {
        $filePath = urldecode($filePath);

        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, 'File not found');
        }

        return Storage::disk('public')->download($filePath);
    }

    public function auditPostAct_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'audit_schedule_id' => 'required|exists:audit_schedules,id',
            // 'nc_no' => 'required|string',
            // 'department' => 'required|string',
            // 'nature_of_nc' => 'required|string',
            // 'rca' => 'nullable|string',
            // 'electronic_documents' => 'nullable|array',
            // 'electronic_documents.*' => 'file|mimes:pdf,doc,docx,xls,xlsx,jpg,png|max:2048',
            // 'risk_profile' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $filePaths = [];
        if ($request->hasFile('electronic_documents')) {
            foreach ($request->file('electronic_documents') as $file) {
                $path = $file->store('post_audit_activities/documents', 'public');
                $filePaths[] = $path;
            }
        }

        $postAuditActivity = DB::table('post_audit_activities')->insert([
            'audit_schedule_id' => $request->audit_schedule_id,
            'nc_no' => $request->nc_no,
            'department' => $request->department,
            'nature_of_nc' => $request->nature_of_nc,
            'rca' => $request->rca,
            'electronic_documents' => json_encode($filePaths),
            'risk_profile' => $request->risk_profile,
            'created_at' => Carbon::now()
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Post audit activity saved successfully!',
            'data' => $postAuditActivity,
        ], 200);
    }

    // public function getAuditDetails($id)
    // {
    //     $audit = AuditSchedule::with('findings')->find($id);

    //     if (!$audit) {
    //         return response()->json(['error' => 'Audit not found'], 404);
    //     }

    //     return response()->json([
    //         'audit_type' => $audit->audit_type,
    //         'nature_of_audit' => $audit->nature_of_audit,
    //         'audit_start_date' => $audit->audit_start_date,
    //         'audit_end_date' => $audit->audit_end_date,
    //         'audit_location' => $audit->audit_location,
    //         'audit_status' => $audit->audit_status,
    //         'departments' => $audit->departments,
    //         'auditors' => $audit->auditors,
    //         'attendees' => $audit->attendees,
    //         'audit_notes' => $audit->audit_notes,
    //         'findings' => $audit->findings
    //     ]);
    // }

    public function getAuditDetails($id)
    {
        try {
            $audit = AuditSchedule::find($id);

            if (!$audit) {
                return response()->json(['error' => 'Audit not found'], 404);
            }

            // Ensure departments is always an array
            $departments = [];
            if (!empty($audit->departments)) {
                $departments = is_array($audit->departments)
                    ? $audit->departments
                    : json_decode($audit->departments, true);
            }

            return response()->json([
                'audit_type' => $audit->audit_type ?? null,
                'nature_of_audit' => $audit->nature_of_audit ?? null,
                'audit_start_date' => $audit->audit_start_date ?? null,
                'audit_end_date' => $audit->audit_end_date ?? null,
                'audit_location' => $audit->audit_location ?? null,
                'audit_status' => $audit->audit_status ?? null,
                'departments' => $departments,
                'auditors' => $audit->auditors ? (is_array($audit->auditors) ? $audit->auditors : json_decode($audit->auditors, true)) : [],
                'attendees' => $audit->attendees ? (is_array($audit->attendees) ? $audit->attendees : json_decode($audit->attendees, true)) : [],
                'audit_notes' => $audit->audit_notes ?? null
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getAuditFindings($auditId)
    {
        $auditSchedule = AuditSchedule::find($auditId);
        $findings = AuditFinding::where('audit_schedule_id', $auditId)->get();

        // Calculate summary values
        $totalNC = $findings->sum(function ($finding) {
            return ($finding->major ?? 0) + ($finding->minor ?? 0);
        });

        $totalObservations = $findings->sum('observations');
        $majorCount = $findings->sum('major');
        $minorCount = $findings->sum('minor');

        return response()->json([
            'auditSchedule' => $auditSchedule,
            'findings' => $findings,
            'totalNC' => $totalNC,
            'totalObservations' => $totalObservations,
            'majorCount' => $majorCount,
            'minorCount' => $minorCount
        ]);
    }
    public function edit($id)
    {
        try {
            // Get the creation date for the selected record
            $record = DB::table('management_reviews')->where('id', $id)->first();

            if (!$record) {
                return response()->json(['error' => 'Record not found'], 404);
            }

            // Get all records with the same creation date (same MRM session)
            $creationDate = date('Y-m-d', strtotime($record->created_at));
            $items = DB::table('management_reviews')
                ->whereDate('created_at', $creationDate)
                ->orderBy('id', 'asc')
                ->get();

            // Debug info - log what we're returning
            Log::info('Fetched management review data', [
                'requested_id' => $id,
                'creation_date' => $creationDate,
                'item_count' => count($items),
                'first_item' => $items->isNotEmpty() ? json_encode($items->first()) : 'none'
            ]);

            return response()->json(['items' => $items]);
        } catch (\Exception $e) {
            Log::error('Error fetching management review data: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to retrieve data'], 500);
        }
    }

    /**
     * Update the management review data
     */
    public function update(Request $request)
    {
        try {
            Log::info("Update request received:", ['record_id' => $request->record_id]);

            $validated = $request->validate([
                'record_id' => 'required|integer',
                'items' => 'required|array',
                'items.*.id' => 'required|integer',
                'items.*.item' => 'required|string',
                'items.*.discussion_guidance' => 'nullable|string',
                'items.*.key_notes' => 'nullable|string',
                'items.*.actions_agreed' => 'nullable|string',
                'items.*.responsibility' => 'nullable|string',
                'items.*.target_date' => 'nullable|date',
                'items.*.actions_taken' => 'nullable|string',
                'items.*.completed_date' => 'nullable|date',
                'items.*.file' => 'nullable|file|max:10240', // 10MB max file size
            ]);

            // Get the main record to determine the creation date
            $mainRecord = DB::table('management_reviews')->where('id', $request->record_id)->first();

            if (!$mainRecord) {
                Log::error("Main record not found with ID: " . $request->record_id);
                return redirect()->back()->with('error', 'Record not found.');
            }

            // Get the creation date for grouping related records
            $creationDate = date('Y-m-d', strtotime($mainRecord->created_at));
            Log::info("Working with creation date: $creationDate");

            $completedItemsCount = 0;
            $totalItems = count($request->items);

            foreach ($request->items as $index => $item) {
                // Find the existing record for this item by ID and creation date
                $existingRecord = DB::table('management_reviews')
                    ->whereDate('created_at', $creationDate)
                    ->where('id', $item['id'])
                    ->first();

                // If no record found by ID, try looking up by item name
                if (!$existingRecord) {
                    $existingRecord = DB::table('management_reviews')
                        ->whereDate('created_at', $creationDate)
                        ->where('item', $item['item'])
                        ->first();
                }

                Log::info("Processing item:", [
                    'id' => $item['id'],
                    'item' => $item['item'],
                    'existing' => $existingRecord ? 'yes' : 'no'
                ]);

                $dataToUpdate = [
                    'key_notes' => $item['key_notes'] ?? null,
                    'actions_agreed' => $item['actions_agreed'] ?? null,
                    'responsibility' => $item['responsibility'] ?? null,
                    'target_date' => $item['target_date'] ?? null,
                    'actions_taken' => $item['actions_taken'] ?? null,
                    'completed_date' => $item['completed_date'] ?? null,
                    'updated_at' => now()
                ];

                // If completed date is set, update the status and increment counter
                if (!empty($item['completed_date'])) {
                    $dataToUpdate['status'] = 'Completed';
                    $completedItemsCount++;
                }

                // Handle file upload if present
                if ($request->hasFile("items.{$index}.file")) {
                    $file = $request->file("items.{$index}.file");
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('management_reviews', $fileName, 'public');
                    $dataToUpdate['file_path'] = $filePath;

                    // Delete the old file if it exists
                    if ($existingRecord && $existingRecord->file_path) {
                        Storage::disk('public')->delete($existingRecord->file_path);
                    }
                }

                if ($existingRecord) {
                    // Update existing record
                    DB::table('management_reviews')
                        ->where('id', $existingRecord->id)
                        ->update($dataToUpdate);

                    Log::info("Updated record ID: " . $existingRecord->id);
                } else {
                    // Create new record if it doesn't exist
                    $dataToUpdate['item'] = $item['item'];
                    $dataToUpdate['discussion_guidance'] = $item['discussion_guidance'] ?? null;
                    $dataToUpdate['created_at'] = now();

                    $newId = DB::table('management_reviews')->insertGetId($dataToUpdate);
                    Log::info("Created new record with ID: $newId");
                }
            }

            // Update the main record's status and completed date
            $mainStatus = 'In Progress';
            $completedDate = null;

            if ($completedItemsCount === $totalItems) {
                $mainStatus = 'Completed';
                $completedDate = now()->format('Y-m-d');
                Log::info("All items completed. Setting main status to: Completed");
            } elseif ($completedItemsCount > 0) {
                $mainStatus = 'Partially Completed';
                Log::info("Some items completed. Setting main status to: Partially Completed");
            }

            // Update all records for this meeting with the new main status
            DB::table('management_reviews')
                ->whereDate('created_at', $creationDate)
                ->update([
                    'status' => $mainStatus,
                    'completed_date' => $completedDate
                ]);

            Log::info("Update completed successfully");
            return redirect()->back()->with('success', 'Management review updated successfully.');

        } catch (\Exception $e) {
            Log::error('Error updating management review: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Cannot update: ' . $e->getMessage());
        }
    }
}
