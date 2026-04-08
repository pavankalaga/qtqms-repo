<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Dropdown;
use App\Models\Location;
use App\Models\Department;
use App\Models\Document;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\Folder;
use App\Models\DocumentAgreement;
use App\Models\DocumentFolder;
use App\Models\DocumentFolderImage;
use App\Models\FolderPermission;


class DocumentController extends Controller
{
    protected $is_my_data_page;
    protected $dropdowns;
    protected $locations;

    protected $dropdowns2;
    protected $locations2;

    public function __construct()
    {
        // Set the variable value
        $this->is_my_data_page = true;
        $dropdown = Dropdown::where('used_for', 'control_factors')->get();
        $location = Location::where('used_for', 'control_factors')->get();
        $dropdown2 = Dropdown::where('used_for', 'calibrations_factors')->get();
        $location2 = Location::where('used_for', 'calibrations_factors')->get();
        $this->dropdowns = $dropdown;
        $this->locations = $location;

        $this->dropdowns2 = $dropdown2;
        $this->locations2 = $location2;


        // Share it globally with all views in this controller
        view()->share('is_my_data_page', $this->is_my_data_page);
        view()->share('dropdowns', $this->dropdowns);
        view()->share('locations', $this->locations);
        view()->share('dropdowns2', $this->dropdowns2);
        view()->share('locations2', $this->locations2);
    }

    public function agreement()
    {
        return view('document.agreement');
    }

    public function view($id)
    {

        return view('document.view');
    }

    public function sales()
    {
        $folders = Document::where('parent_id', null)->get();
        return view('document.sales', ['folders' => $folders]);
    }
    public function folder_view($foldername)
    {

        return view('document.folder-view');
    }

    public function edit($id)
    {
        $employee = User::findOrFail($id);

        return response()->json([
            'employee_code' => $employee->employee_code,
            'first_name' => $employee->first_name,
            'designation' => $employee->designation,
            'date_of_joining' => $employee->joining_date,
            'contact_number' => $employee->number,
            'email' => $employee->email,
            'imageEmp' => $employee->imageEmp,
            // Add other fields as needed
        ]);
    }


    public function updateEmp(Request $request, $id)
    {
        try {
            $employee = User::findOrFail($id);

            $validatedData = $request->validate([
                'employee_code' => 'required|string|max:255',
                'employee_name' => 'nullable|string|max:255',
                'designation2' => 'nullable|string|max:255',
                'date_of_joining' => 'nullable|date',
                'contact_number' => 'nullable|string|max:15',
                'email2' => 'nullable|email|unique:users,email,' . $id,
                'password' => 'nullable',
            ]);

            $updateData = [
                'employee_code' => $validatedData['employee_code'],
                'first_name' => $validatedData['employee_name'],
                'designation' => $validatedData['designation2'],
                'joining_date' => $validatedData['date_of_joining'],
                'number' => $validatedData['contact_number'],
                'email' => $validatedData['email2'],
            ];

            if (!empty($request->password)) {
                $updateData['password'] = Hash::make($request->password);
            }

            if ($request->hasFile('imageEmp')) {
                $imageEmp = time() . '.' . $request->imageEmp->extension();
                $destinationPath = public_path('user_images');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                $request->imageEmp->move($destinationPath, $imageEmp);
                $updateData['imageEmp'] = $imageEmp;
            }

            $employee->update($updateData);

            return response()->json([
                'success' => true,
                'message' => 'Employee updated successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function settings()
    {
        $locations22 = Location::all();
        $dropdowns = Dropdown::all();
        $departments = Dropdown::where('parent_name', 'Departments')->get();
        $risks1 = DB::table('dropdown_options')->where('type', 'RiskCategory')->get();
        $risks2 = DB::table('dropdown_options')->where('type', 'Severity')->get();
        $risks3 = DB::table('dropdown_options')->where('type', 'Likelihood')->get();
        $employee_list = User::orderBy('created_at', 'desc')->get();

        $dropdowns3 = Dropdown::where('used_for', 'control_factors')->get();
        $locations3 = Location::where('used_for', 'control_factors')->get();
        $control_setup = DB::table('control_setup')->orderBy('created_at', 'desc')->get();
        $calib_setup = DB::table('calibration_setup')->orderBy('created_at', 'desc')->get();
        $master_qlty_indicator = DB::table('master_quality_indicators')->orderBy('created_at', 'desc')->get();
        $labs = Location::all();


        $departments77 = DB::table('departments')->orderBy('name')->get();
        $folders = Document::with('folder_permissions')->get();
        //dd($folders);
        //  dd($folders);
        // Get all employees (if necessary)
        $employees = User::get();
        $employees2 = User::where(function ($query) {
            $query->where('role', '!=', 1)
                ->orWhereNull('role');
        })->get();
        $savedPermissions = $folders->mapWithKeys(function ($folder) {
            // Assuming 'folder_permissions' has columns 'read', 'edit', 'full', 'lock', 'noControl'
            $folderPermissions = $folder->folder_permissions->first(); // Assuming each folder has only one permission entry

            return [
                $folder->folder_name => [
                    'read' => $folderPermissions->read ?? '',
                    // 'edit' => $folderPermissions->edit ?? '',
                    // 'full' => $folderPermissions->full ?? '',
                    'lock' => $folderPermissions->lock ?? '',
                    'delete' => $folderPermissions->delete ?? '',
                    'upload' => $folderPermissions->upload ?? '',
                    // 'noControl' => $folderPermissions->noControl ?? '',
                ]
            ];
        });

        // $ln = Location::where('user_id', \Auth::id())->first();

        return view('document.settings', compact(
            'employee_list',
            'dropdowns3',
            'locations3',
            'control_setup',
            'calib_setup',
            'master_qlty_indicator',
            'risks1',
            'risks2',
            'risks3',
            'departments',
            'locations22',
            'employees2',
            'savedPermissions',
            'folders',
            'employees',
            'labs',
            'departments77'
        ));
    }
    public function employee_store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_code' => 'required|string|max:255',
            'employee_name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',

        ]);

        $imageEmp = null;
        if ($request->hasFile('imageEmp')) {
            $imageEmp = time() . '.' . $request->imageEmp->extension();
            $destinationPath = public_path('user_images');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $request->imageEmp->move($destinationPath, $imageEmp);
        }

        $user = User::create([
            'employee_code' => $validatedData['employee_code'],
            'first_name' => $validatedData['employee_name'],
            'position' => $validatedData['designation'],
            'address' => $validatedData['location'],
            'department' => $validatedData['department'],
            'number' => $validatedData['contact_number'],
            'email' => $validatedData['email'],
            'password' => Hash::make($request->password),
            'imageEmp' => $imageEmp,
        ]);

        session(['userId' => $user->id]);

        return response()->json(['success' => true, 'message' => 'Employee created successfully', 'user' => $user], 201);
    }

    public function addOption(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:dropdowns,name,NULL,id,parent_name,' . $request->parent_name,
            'parent_name' => 'required|string|max:255',
        ]);

        $dropdown = Dropdown::create([
            'name' => $validated['name'],
            'parent_name' => $validated['parent_name'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Option added successfully!',
            'data' => $dropdown,
        ]);
    }

    public function removeOption(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
        ]);

        $deleted = Dropdown::where('name', $validated['name'])
            ->where('parent_name', $validated['parent_name'])
            ->delete();

        return response()->json([
            'success' => $deleted ? true : false,
            'message' => $deleted ? 'Option removed successfully!' : 'Option not found.',
        ]);
    }

    public function destroySet($id)
    {
        $employee = User::findOrFail($id);
        $employee->delete();

        return redirect()->back()->with('success', 'Employee deleted successfully.');
    }


    public function addLocationOption(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
        ]);

        // Insert into database
        $dropdown = Location::create([
            'location' => $validated['name'],
            'type' => $validated['parent_name'],
            'used_for' => 'control_factors'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Option added successfully!',
            'data' => $dropdown,
        ]);
    }


    public function removeLocationOption(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
        ]);

        // Ensure location is deleted from the correct model
        $deleted = Location::where('location', $validated['name'])
            ->where('type', $validated['parent_name'])
            ->delete();

        if ($deleted) {
            return response()->json([
                'success' => true,
                'message' => 'Location removed successfully!',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Location not found or could not be removed.',
        ]);
    }


    public function addDep(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:dropdowns,name,NULL,id,parent_name,' . $request->parent_name,
            'parent_name' => 'required|string|max:255',
        ]);

        $dropdown = Dropdown::create([
            'name' => $validated['name'],
            'parent_name' => $validated['parent_name'],
            'used_for' => 'control_factors'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Option added successfully!',
            'data' => $dropdown,
        ]);
    }


    public function removeDep(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
        ]);

        $deleted = Dropdown::where('name', $validated['name'])
            ->where('parent_name', $validated['parent_name'])
            ->delete();

        return response()->json([
            'success' => $deleted ? true : false,
            'message' => $deleted ? 'Option removed successfully!' : 'Option not found.',
        ]);
    }

    public function addMachine(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:dropdowns,name,NULL,id,parent_name,' . $request->parent_name,
            'parent_name' => 'required|string|max:255',
        ]);

        $dropdown = Dropdown::create([
            'name' => $validated['name'],
            'parent_name' => $validated['parent_name'],
            'used_for' => 'control_factors'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Option added successfully!',
            'data' => $dropdown,
        ]);
    }


    public function removeMachine(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
        ]);

        $deleted = Dropdown::where('name', $validated['name'])
            ->where('parent_name', $validated['parent_name'])
            ->delete();

        return response()->json([
            'success' => $deleted ? true : false,
            'message' => $deleted ? 'Option removed successfully!' : 'Option not found.',
        ]);
    }

    public function addLocationOptionCalib(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
        ]);

        // Insert into database
        $dropdown = Location::create([
            'location' => $validated['name'],
            'type' => $validated['parent_name'],
            'used_for' => 'calibrations_factors'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Option added successfully!',
            'data' => $dropdown,
        ]);
    }


    public function removeLocationOptionCalib(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
        ]);

        // Ensure location is deleted from the correct model
        $deleted = Location::where('location', $validated['name'])
            ->where('type', $validated['parent_name'])
            ->delete();

        if ($deleted) {
            return response()->json([
                'success' => true,
                'message' => 'Location removed successfully!',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Location not found or could not be removed.',
        ]);
    }
    public function addDepCalib(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:dropdowns,name,NULL,id,parent_name,' . $request->parent_name,
            'parent_name' => 'required|string|max:255',
        ]);

        $dropdown = Dropdown::create([
            'name' => $validated['name'],
            'parent_name' => $validated['parent_name'],
            'used_for' => 'calibrations_factors'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Option added successfully!',
            'data' => $dropdown,
        ]);
    }


    public function removeDepCalib(Request $request)
    {
        dd($request);
        $validated = $request->validate([
            'name' => 'required',
            'parent_name' => 'required',
        ]);

        $deleted = Dropdown::where('name', $validated['name'])
            ->where('parent_name', $validated['parent_name'])
            ->delete();

        return response()->json([
            'success' => $deleted ? true : false,
            'message' => $deleted ? 'Option removed successfully!' : 'Option not found.',
        ]);
    }

    public function storeControlSetUp(Request $request)
    {
        //dd($request);
        $request->validate([
            'location' => 'required',
            'machine' => 'required',
            'department' => 'required',
            'supplier' => 'required',
        ]);

        $data = DB::table('control_setup')->insert([
            'location' => $request->location,
            'machine' => $request->machine,
            'department' => $request->department,
            'supplier' => $request->supplier,
            'created_at' => Carbon::now(),
        ]);

        if ($data) {
            //dd('saved');

            return redirect()->back()->with('success', 'Submitted Successfully!');
        } else {
            return redirect()->back()->with('error', 'Submission Failed!');
        }
    }

    public function storeCalibSetUp(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'machine' => 'required',
            'department' => 'required',
            'supplier' => 'required',
        ]);
        $data = DB::table('calibration_setup')->insert([
            'location' => $request->location,
            'machine' => $request->machine,
            'department' => $request->department,
            'supplier' => $request->supplier,
            'created_at' => Carbon::now()
        ]);
        if ($data) {
            return redirect()->back()->with('success', 'Submitted!!');
        }
    }
    public function save_qualityIndicators(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'phase' => 'required',
            'indicator' => 'required',
            'description' => 'required',
            // 'target' => 'required',
        ]);
        if ($validate->fails()) {
            dd('error' . $validate->errors()->first());
        }
        $data = DB::table('master_quality_indicators')->insert([
            'phase' => $request->phase,
            'indicator' => $request->indicator,
            'description' => $request->description,
            'target' => $request->target,
            'created_at' => Carbon::now()
        ]);
        if ($data) {
            // return response()->json(['message'=> 'successfully saved']);
            return redirect()->back()->with('success', 'successfully saved');
        } else {
            return response()->json(['message' => 'can not saved']);

        }
    }

    public function addRiskOption(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
        ]);

        // Insert into database
        $dropdown = DB::table('dropdown_options')->insert([
            'name' => $validated['name'],
            'type' => $validated['parent_name'],
            'created_at' => Carbon::now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Option added successfully!',
            'data' => $dropdown,
        ]);
    }
    public function removeRiskOption(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
        ]);

        // Ensure location is deleted from the correct model
        $deleted = DB::table('dropdown_options')->where('name', $validated['name'])
            ->where('type', $validated['parent_name'])
            ->delete();

        if ($deleted) {
            return response()->json([
                'success' => true,
                'message' => 'Item removed successfully!',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Item not found or could not be removed.',
        ]);
    }
    public function EQAS_store(Request $request)
    {
        $data = $request->all();

        foreach ($data as $row) {
            DB::table('eqa_data')->insert([
                'department' => $row['department'],
                'eqa_provider' => $row['eqa_provider'],
                'eqa_program' => $row['eqa_program'],
                'parameters' => json_encode($row['parameters']),
                'cycles' => isset($row['cycles']) ? $row['cycles'] : null,
                'cycles_duration' => isset($row['cycles_duration']) ? json_encode($row['cycles_duration']) : null,
                'cycles_description' => isset($row['cycles_description']) ? $row['cycles_description'] : null,
                'last_date_of_submission' => isset($row['last_date_of_submission']) ? $row['last_date_of_submission'] : null,
                'cost' => $row['cost'],
                'created_at' => Carbon::now(),
            ]);
        }

        return response()->json(['message' => 'Data saved successfully!']);
    }

    public function ilc_store(Request $request)
    {
        // Just to confirm structure
        // Log::info($request->all());

        $data = $request->all();

        foreach ($data as $row) {
            DB::table('ilc_data')->insert([
                'department' => $row['department'] ?? '',
                'ilc_provider' => $row['eqa_provider'] ?? '', // match JS key
                'ilc_program' => $row['eqa_program'] ?? '',
                'parameters' => json_encode($row['parameters'] ?? []),
                'cost' => $row['cost'] ?? null,
                'created_at' => Carbon::now(),
            ]);
        }

        return response()->json(['message' => 'Data saved successfully!']);
    }









    //Documents functions

    public function index($parentId = null)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $userId = $user->id;
        $userDepartment = $user->department; // Assuming the department is stored in the users table
        $userIsAdmin = $user->role == 1; // Check if the user is an admin
        // $userIsMaster = $user->employee_type == 'master'; // Check if the user is an admin

        // Fetch folders based on the parent_id and user's department or role
        // $folders = Document::where('parent_id', $parentId)
        //     ->whereNull('doc_file')
        //     ->when(!$userIsAdmin, function ($query) use ($userDepartment) {
        //         return $query->where(function ($q) use ($userDepartment) {
        //             $q->where('created_by', $userDepartment)
        //                 ->orWhere('name', $userDepartment);
        //         });
        //     })
        //     ->get();
        $folders = Document::where('parent_id', $parentId)
            ->whereNull('doc_file')
            ->get();


        // Fetch files based on the parent_id
        $files = Document::where('parent_id', $parentId)
            ->whereNotNull('doc_file')
            ->get();

        // Check user's permissions from the users table
        $canRead = $user->read == 1;
        $canEdit = $user->edit == '1';
        $canDelete = $user->delete == '1';
        $canLock = $user->lock == '1';
        $canFull = $user->full == '1';

        // Add permissions and lock status to each folder
        $folders->each(function ($folder) use ($canRead, $canEdit, $canDelete, $canLock, $canFull, $userId, $userIsAdmin) {
            $folder->can_read = $canRead;
            $folder->can_edit = $canEdit;
            $folder->can_delete = $canDelete;
            $folder->can_lock = $canLock;
            $folder->can_full = $canFull;
            $folder->noControl = !$canRead && !$canEdit && !$canDelete && !$canLock && !$canFull;
            $folder->is_locked = $folder->locked == 1;
            $folder->is_locked_for_user = $folder->is_locked && $folder->locked_by !== $userId && !$userIsAdmin;
        });

        return response()->json([
            'folders' => $folders,
            'files' => $files,
            'hasFiles' => $files->isNotEmpty(),
        ]);
    }
    public function store(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        // dd($user->department);
        $department = $user->department; // Ensure this is correct (ID or name?)

        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:documents,id', // Ensure the parent folder exists
        ]);

        // Create and save the folder to the database
        $folder = Document::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'created_by' => $department,  // Ensure this is storing the correct value
        ]);

        return response()->json($folder, 201);  // Return the created folder in JSON format
    }
    // Update an existing folder
    public function update(Request $request, $id)
    {
        $folder = Document::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update folder details
        $folder->update([
            'name' => $request->name,
        ]);

        return response()->json($folder);
    }

    // Delete a folder
    public function destroy($id)
    {
        $folder = Document::findOrFail($id);

        // Recursively delete children
        $this->deleteFolderAndChildren($folder);

        return response()->json(['message' => 'Folder deleted successfully']);
    }

    private function deleteFolderAndChildren(Document $folder)
    {
        // Delete all children folders
        foreach ($folder->children as $child) {
            $this->deleteFolderAndChildren($child);
        }

        // Delete the folder itself
        $folder->delete();
    }
    public function uploadFiles2(Request $request, $folderId)
    {
        // Validate incoming files (required, array, each file should be <= 10MB)
        $request->validate([
            'files' => 'required|array',
            // 'files.*' => 'file|max:10240', // Max file size 10MB
        ]);

        // Find the folder to upload the files to
        $folder = Document::find($folderId);
        if (!$folder) {
            return response()->json(['success' => false, 'message' => 'Folder not found!']);
        }

        $uploadedFiles = [];
        foreach ($request->file('files') as $file) {
            // Store the file in 'public/documents' directory
            $path = $file->move(public_path('documents'), $file->getClientOriginalName());

            // Create a new Document entry for the uploaded file
            $document = new Document([
                'name' => $file->getClientOriginalName(),
                'doc_file' => 'documents/' . $file->getClientOriginalName(),
                'type' => 1,
                'uploaded_at' => now(),
                'parent_id' => $folderId, // Associate the file with the folder
            ]);
            $document->save();

            // Append the document with the file URL
            $document->file_url = asset($document->doc_file); // Ensure file URL is publicly accessible
            $uploadedFiles[] = $document; // Collect uploaded file info
        }

        // Return the uploaded files with URLs
        return response()->json([
            'success' => true,
            'message' => 'Files uploaded successfully!',
            'files' => $uploadedFiles
        ]);
    }


    public function uploadFiles(Request $request, $folderId)
    {
        try {
            $request->validate([
                'files' => 'required|file|max:10240', // Uncomment this validation
                'name' => 'required|string|max:255',
                'document_no' => 'required|string|max:255',
                'version_no' => 'required|string|max:255',
                'status' => 'required|string|max:255',
                'upload_date' => 'required|date',
                // 'retention_period' => 'required|date',
                'tags' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'existing_file_id' => 'nullable|integer',
            ]);

            $folder = Document::find($folderId);
            if (!$folder) {
                return response()->json(['success' => false, 'message' => 'Folder not found!'], 404);
            }

            $file = $request->file('files');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('documents');

            if (!is_dir($destinationPath) && !mkdir($destinationPath, 0777, true) && !is_dir($destinationPath)) {
                \Log::error('Failed to create directory: ' . $destinationPath);
                return response()->json(['success' => false, 'message' => 'Failed to create directory!'], 500);
            }

            if (!$file->move($destinationPath, $fileName)) {
                \Log::error('File move failed: ' . $destinationPath . '/' . $fileName);
                return response()->json(['success' => false, 'message' => 'File move failed!'], 500);
            }

            $document = new Document([
                'name' => $request->name,
                'doc_file' => $fileName,
                'document_no' => $request->document_no,
                'version_no' => $request->version_no,
                'status' => $request->status,
                'uploaded_at' => $request->upload_date,
                'retention_period' => $request->retention_period,
                'tags' => $request->tags,
                'description' => $request->description,
                'type' => 1,
                'parent_id' => $folderId,
            ]);
            $document->save();

            if ($request->existing_file_id) {
                $existingFile = Document::find($request->existing_file_id);
                if ($existingFile) {
                    $existingFile->versions()->save($document);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'File uploaded successfully!',
                'file_url' => asset('documents/' . $fileName), // Removed 'public/' as it's not in URL
                'document_id' => $document->id,
            ]);
        } catch (\Exception $e) {
            \Log::error('File upload error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    public function uploadFilesView(Request $request, $folderId)
    {
        try {

            $request->validate([
                'files' => 'required|file|max:10240',
                'name' => 'required|string|max:255',
                'document_no' => 'required|string|max:255',
                'version_no' => 'required|string|max:255',
                'status' => 'required|string|max:255',
                'upload_date' => 'required|date',
                // 'retention_period' => 'required|date',
                // 'tags' => 'nullable|string|max:255',
                // -'description' => 'nullable|string',
                'existing_file_id' => 'nullable|integer',
            ]);


            $folder = Document::find($folderId);
            if (!$folder) {
                return response()->json(['success' => false, 'message' => 'Folder not found!'], 404);
            }

            $file = $request->file('files');
            $fileName = time() . '_' . $file->getClientOriginalName();

            $destinationPath = public_path('documents');

            if (!is_dir($destinationPath)) {
                if (!mkdir($destinationPath, 0777, true) && !is_dir($destinationPath)) {
                    \Log::error('Failed to create directory: ' . $destinationPath);
                    return response()->json(['success' => false, 'message' => 'Failed to create directory!'], 500);
                }
            }

            if ($file->move($destinationPath, $fileName)) {
                \Log::info('File successfully uploaded: ' . $fileName);
            } else {
                \Log::error('File move failed: ' . $destinationPath . '/' . $fileName);
                return response()->json(['success' => false, 'message' => 'File move failed!'], 500);
            }

            $existingFileId = $request->input('existing_file_id');
            $parentID = null;

            if ($existingFileId) {
                $existingFile = Document::find($existingFileId);
                if ($existingFile) {
                    \Log::info('Existing File ID:', ['id' => $existingFile->id]);
                    \Log::info('Existing File Parent ID:', ['parent_id' => $existingFile->parent_id]);

                    $parentID = $existingFile->parent_id;
                } else {
                    \Log::error('Existing file not found:', ['existing_file_id' => $existingFileId]);
                }
            }

            \Log::info('Parent ID for new file:', ['parent_id' => $parentID]);
            // dd($parentID);
            $document1 = new Document([
                'name' => $request->name,
                'doc_file' => $fileName,
                'document_no' => $request->document_no,
                'version_no' => $request->version_no,
                'status' => $request->status,
                'uploaded_at' => $request->upload_date,
                'retention_period' => $request->retention_period,
                'tags' => $request->tags,
                'description' => $request->description,
                'type' => 1,
                'parent_id' => $parentID,
            ]);

            // dd($document1);
            $document1->save();

            // if ($existingFileId && $existingFile) {
            //     $existingFile->versions()->save($document);
            // }

            return response()->json([
                'success' => true,
                'message' => 'File uploaded successfully!',
                'file_url' => asset('public/documents/' . $fileName),
                'document_id' => $document1->id,
            ]);
        } catch (\Exception $e) {
            \Log::error('File upload error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    public function moveFile($fileId, $folderId)
    {
        $file = Document::find($fileId);
        if (!$file) {
            return response()->json(['success' => false, 'message' => 'File not found!']);
        }

        $folder = Document::find($folderId);

        if (!$folder) {
            return response()->json(['success' => false, 'message' => 'Folder not found!']);
        }
        // Move the file by changing its folder ID
        $file->parent_id = $folderId;
        $file->save();

        return response()->json(['success' => true, 'message' => 'File moved successfully!']);
    }
    public function getFiles($folderId)
    {
        $user = auth()->user();
        if (!$user) {
            \Log::error("User is not authenticated.");
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $userId = $user->id;
        $userIsAdmin = $user->role == 1; // Check if user is an admin
        // $userIsMaster = $user->employee_type == 'master'; // Check if user is a master
        $userDepartment = $user->department;

        // Fetch the folder details first
        $folder = Document::find($folderId);
        if (!$folder) {
            return response()->json(['error' => 'Folder not found'], 404);
        }

        // Check if the folder belongs to the user's department or the user is an admin
        // if (!$userIsAdmin && $folder->created_by != $userDepartment && $folder->name != $userDepartment) {
        //     return response()->json(['error' => 'You do not have permission to access this folder.'], 403);
        // }

        // Check if folder is locked
        $folderIsLocked = $folder->locked == 1;
        $folderLockedBy = $folder->locked_by;

        // Determine if the current user has access
        $isLockedForUser = $folderIsLocked && $folderLockedBy !== null && $folderLockedBy != $userId && !$userIsAdmin;

        \Log::info("Folder ID: {$folderId}, Locked: {$folderIsLocked}, Locked By: {$folderLockedBy}, Is Locked for User: " . ($isLockedForUser ? 'Yes' : 'No'));

        // If the folder is locked and the user is not allowed to access it, return an error
        if ($isLockedForUser) {
            return response()->json(['error' => 'This folder is locked and cannot be accessed.'], 403);
        }

        // Fetch files from the documents table
        $files = Document::where('parent_id', $folderId)
            ->whereNotNull('doc_file')
            ->get();

        $files->each(function ($file) use ($userId, $userIsAdmin) {
            $file->file_url = asset($file->doc_file);
            $file->is_readable = true; // Assume the user has read permission if they can access the folder
            $file->is_locked = $file->locked == 1;

            // A file is locked for the user if:
            // 1. It is locked.
            // 2. The user is not the one who locked it.
            // 3. The user is not an admin (role == 1).
            // 4. The user is not a master (employee_type == 'master').
            $file->is_locked_for_user = $file->is_locked && $file->locked_by !== null && $file->locked_by != $userId && !$userIsAdmin;
        });

        return response()->json([
            'folder' => [
                'id' => $folder->id,
                'is_locked' => $folderIsLocked,
                'locked_by' => $folderLockedBy,
                'is_locked_for_user' => $isLockedForUser,
            ],
            'files' => $files
        ]);
    }
    public function showFiles($folderId)
    {
        // dd($folderId);
        $folder = Document::find($folderId);
        $files = Document::where('parent_id', $folderId)
            ->whereNotNull('doc_file')
            ->get();

        //dd($files);
        $permissions = FolderPermission::where('folder_id', $folderId)->first();

        return view('document.agreement', [
            'folder' => $folder,
            'files' => $files,
            'permissions' => $permissions
        ]);
    }

    public function viewFile($fileId)
    {
        //dd('hello');
        $file = Document::find($fileId);

        if (!$file) {
            return redirect()->back()->with('error', 'File not found!');
        }

        $filePath = public_path('documents/' . $file->doc_file);
        \Log::info('File Path: ' . $filePath);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File not found on the server! Path: ' . $filePath);
        }

        $fileUrl = asset('documents/' . $file->doc_file);
        \Log::info('File URL: ' . $fileUrl);

        // Fetch Obsolete Files
        $latestFile = Document::latest('created_at')->first(); // Get the latest uploaded file
        $obsoleteFiles = Document::where('id', '!=', $latestFile->id)
            ->where(function ($query) {
                $query->where('type', 1)
                    ->orWhereNull('type'); // Include files where type is null
            })
            ->orderBy('uploaded_at', 'desc')
            ->get();
        // dd($obsoleteFiles);
        // Fetch User Permissions
        $user = auth()->user();
        $file->can_read = $user->read == 1;
        $file->can_edit = $user->edit == '1';
        $file->can_delete = $user->delete == '1';
        $file->can_lock = $user->lock == '1';
        $file->can_share = $user->share == '1';
        $file->can_upload = $user->upload == '1';
        $file->can_move = $user->move == '1';
        $file->noControl = $user->noControl == '1';
        // dd($file);
        return view('document.view', compact('file', 'fileUrl', 'obsoleteFiles'));
    }

    public function destroyFile($fileId)
    {
        try {
            $file = Document::find($fileId);

            if (!$file) {
                return response()->json(['success' => false, 'message' => 'File not found!'], 404);
            }

            // Delete the file from storage
            Storage::delete($file->doc_file);

            // Delete the file record from the database
            $file->delete();

            return response()->json(['success' => true, 'message' => 'File deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while deleting the file.'], 500);
        }
    }
    public function moveFiles($fileId, $newFolderId)
    {
        try {
            // Find the file and the new folder
            $file = Document::find($fileId);
            $folder = Document::find($newFolderId);

            // Check if both file and folder exist
            if (!$file || !$folder) {
                return response()->json(['success' => false, 'message' => 'File or folder not found!'], 404);
            }

            // Update the file's parent folder using the correct column name
            $file->parent_id = $newFolderId; // Use `parent_id` instead of `folder_id`
            $file->save();

            return response()->json(['success' => true, 'message' => 'File moved successfully!']);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error moving file: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An error occurred while moving the file.'], 500);
        }
    }
    public function shareFile($fileId, Request $request)
    {
        try {
            // Find the file
            $file = Document::find($fileId);

            // Check if the file exists
            if (!$file) {
                return response()->json(['success' => false, 'message' => 'File not found!'], 404);
            }

            // Get the email from the request
            $email = $request->input('email');

            // Placeholder logic to share the file (e.g., send an email)
            // You can use Laravel's Mail facade here
            // Mail::to($email)->send(new FileShared($file));

            return response()->json(['success' => true, 'message' => 'File shared successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while sharing the file.'], 500);
        }
    }
    public function modifyFile($fileId, Request $request)
    {
        try {
            // Find the file
            $file = Document::find($fileId);

            // Check if the file exists
            if (!$file) {
                return response()->json(['success' => false, 'message' => 'File not found!'], 404);
            }

            // Get the new name from the request
            $newName = $request->input('name');

            // Update the file name
            $file->name = $newName;
            $file->save();

            return response()->json(['success' => true, 'message' => 'File modified successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while modifying the file.'], 500);
        }
    }

    public function lockFile($fileId)
    {
        try {
            // Find the file to get the folder_id
            $file = Document::find($fileId);

            if (!$file) {
                return response()->json(['success' => false, 'message' => 'File not found!'], 404);
            }

            // Get the folder_id from the file
            $folderId = $file->parent_id; // Assuming parent_id represents folder_id

            if (!$folderId) {
                return response()->json(['success' => false, 'message' => 'Folder ID not found for this file!'], 400);
            }

            // Get the logged-in user's ID
            $employeeId = auth()->id();

            // Use a database transaction to ensure both updates happen together
            DB::transaction(function () use ($file, $folderId, $employeeId) {
                // Lock the file
                $file->locked = 1;
                $file->locked_by = $employeeId;
                $file->save();

                // Lock the folder permission
                $folderPermission = FolderPermission::firstOrNew(
                    ['folder_id' => $folderId, 'employee_id' => $employeeId]
                );
                $folderPermission->lock = 1;
                $folderPermission->save();
            });

            return response()->json(['success' => true, 'message' => 'File locked successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while locking the file.', 'error' => $e->getMessage()], 500);
        }
    }


    public function setReminder($fileId, Request $request)
    {
        try {
            // Find the file
            $file = Document::find($fileId);

            // Check if the file exists
            if (!$file) {
                return response()->json(['success' => false, 'message' => 'File not found!'], 404);
            }

            // Get the reminder date from the request
            $reminderDate = $request->input('reminder_date');

            // Set the reminder date
            $file->reminder_date = $reminderDate;
            $file->save();

            return response()->json(['success' => true, 'message' => 'Reminder set successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while setting the reminder.'], 500);
        }
    }
    public function uploadNewVersion($fileId, Request $request)
    {
        try {
            $file = Document::find($fileId);

            if (!$file) {
                return response()->json(['success' => false, 'message' => 'File not found!'], 404);
            }

            $request->validate([
                'file' => 'required|file|max:10240', // Max file size 10MB
            ]);

            // Store the file in the 'public/documents' directory
            $path = $request->file('file')->move(public_path('documents'), $request->file('file')->getClientOriginalName());

            // Create a new file record
            $newFile = new Document();
            $newFile->name = $request->file('file')->getClientOriginalName();
            $newFile->doc_file = 'documents/' . $request->file('file')->getClientOriginalName();
            $newFile->type = 1;
            $newFile->parent_id = $file->parent_id;
            $newFile->uploaded_at = now();
            $newFile->save();

            // Return the new file data
            return response()->json([
                'success' => true,
                'message' => 'New version uploaded successfully!',
                'file' => $newFile,
                'doc_id' => $newFile->id
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while uploading the new version.'], 500);
        }
    }






    public function getObsoleteFiles()
    {
        try {
            // Fetch files that are not marked as new uploads
            $obsoleteFiles = Document::whereNull('uploaded_at')
                ->orWhere('uploaded_at', '<', now()->subDays(30)) // You can adjust the condition here as per your requirement
                ->get();

            return response()->json($obsoleteFiles);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while fetching the files.'], 500);
        }
    }
    public function savePermissions(Request $request)
    {
        foreach ($request->permissions as $permission) {
            // Skip updating permissions for admins (role = 1)
            $employee = User::find($permission['id']);
            if ($employee->role == '1') {
                continue; // Skip this iteration for admins
            }

            // Update permissions for non-admin employees
            User::where('id', $permission['id'])->update([
                'read' => $permission['read'] ?? 0,
                // 'edit' => $permission['edit'] ?? 0,
                // 'delete' => $permission['delete'] ?? 0,
                // 'full' => $permission['full'] ?? 0,
                // 'lock' => $permission['lock'] ?? 0,
                // 'move' => $permission['move'] ?? 0,
                // 'share' => $permission['share'] ?? 0,
                'upload' => $permission['upload'] ?? 0,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Permissions saved successfully.']);
    }
    public function fetchPermissions()
    {
        $employees = User::select('id', 'read', 'edit', 'delete', 'full', 'lock', 'move', 'share', 'upload')->get();
        return response()->json(['permissions' => $employees]);
    }
    public function toggleLock($folderId, Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $folder = Document::find($folderId);
        if (!$folder) {
            return response()->json(['error' => 'Folder not found'], 404);
        }

        // Check if the user has permission to lock/unlock
        if (!$user->lock && $user->role != 1) {
            return response()->json(['error' => 'You do not have permission to lock/unlock this folder'], 403);
        }

        // If unlocking, check if the current user is the one who locked it or an admin
        if ($request->input('locked') === false) {
            if ($folder->locked_by !== $user->id && $user->role != 1) {
                return response()->json(['error' => 'You do not have permission to unlock this folder'], 403);
            }
        }

        // Toggle lock status
        $folder->locked = $request->input('locked');
        $folder->locked_by = $request->input('locked') ? $user->id : null;
        $folder->save();

        return response()->json(['success' => true]);
    }
    public function uploadFilesDrop(Request $request, $folderId)
    {
        $request->validate([
            'files' => 'required|array',
            'files.*' => 'file|max:10240', // Max 10MB
        ]);

        $folder = Document::find($folderId);
        if (!$folder) {
            return response()->json(['success' => false, 'message' => 'Folder not found!']);
        }

        $uploadedFiles = [];
        foreach ($request->file('files') as $file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->move(public_path('documents'), $fileName);

            $document = new Document([
                'name' => $file->getClientOriginalName(),
                'doc_file' => 'documents/' . $fileName,
                'type' => 1,
                'uploaded_at' => now(),
                'parent_id' => $folderId,
            ]);
            $folder->documents()->save($document);

            $uploadedFiles[] = $fileName;
        }

        return response()->json(['success' => true, 'files' => $uploadedFiles]);
    }




    ///********************************** */


    public function addDepartment(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:departments,name',
                'status' => 'required|in:Active,Inactive'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first()
                ], 400);
            }

            $department = Department::create([
                'name' => trim($request->name),
                'status' => $request->status,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Department added successfully!',
                'data' => $department
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while adding the department: ' . $e->getMessage()
            ], 500);
        }
    }


    public function addLocation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'location' => 'required|string|max:255|unique:locations,location',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first()
                ], 400);
            }

            $location = Location::create([
                'location' => trim($request->location),
                'type' => 'Locationss',
                // 'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Location added successfully!',
                'data' => $location
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while adding the Location: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove a department
     */
    public function removeDepartment(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first()
                ], 400);
            }

            $department = Department::where('name', trim($request->name))->first();

            if (!$department) {
                return response()->json([
                    'success' => false,
                    'message' => 'Department not found.'
                ], 404);
            }

            // Check if department is being used elsewhere (optional)
            // You might want to add relationships check here

            $department->delete();

            return response()->json([
                'success' => true,
                'message' => 'Department removed successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while removing the department: ' . $e->getMessage()
            ], 500);
        }
    }



    public function removeLocation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'location' => 'required|string|max:255'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first()
                ], 400);
            }

            $location = Location::where('location', trim($request->location))->first();

            if (!$location) {
                return response()->json([
                    'success' => false,
                    'message' => 'location not found.'
                ], 404);
            }

            // Check if department is being used elsewhere (optional)
            // You might want to add relationships check here

            $location->delete();

            return response()->json([
                'success' => true,
                'message' => 'location removed successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while removing the location: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Submit the form with selected department and status
     */
    public function submitForm(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'department' => 'required|string|max:255',
                // 'status' => 'required|in:Active,Inactive'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first()
                ], 400);
            }

            // Check if department exists
            $department = Department::where('name', $request->department)->first();

            if (!$department) {
                return response()->json([
                    'success' => false,
                    'message' => 'Selected department does not exist.'
                ], 404);
            }

            // Update department status or create a record as needed
            // This depends on your business logic
            $department->update([
                'status' => $request->status,
                'updated_at' => now()
            ]);

            // Or if you're creating a new record with this data:
            // YourModel::create([
            //     'department_id' => $department->id,
            //     'department_name' => $request->department,
            //     'status' => $request->status,
            //     'created_at' => now(),
            //     'updated_at' => now()
            // ]);

            return response()->json([
                'success' => true,
                'message' => 'Form submitted successfully!',
                'data' => [
                    'department' => $request->department,
                    'status' => $request->status
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting the form: ' . $e->getMessage()
            ], 500);
        }
    }





}
