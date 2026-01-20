<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NestedRole;
use App\Models\Salesheadquarter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
class LeadProfileController extends Controller
{
    public function index()
    {
        $sales_headquarters = Salesheadquarter::all();
        $categories = NestedRole::get();
        return view('leadprofile.index', compact('sales_headquarters', 'categories'));
    }
    public function getProfiles(Request $request)
    {
        $reports = User::with(['sales_headquarter', 'assign_user'])->orderBy('id', 'desc');

        return DataTables::of($reports)
            ->addColumn('action', function ($report) {
                return '
                <a href="' . route('lead.profile.view', $report->id) . '" class="view-link"><i class="far fa-eye"></i></a>
                <a href="' . route('lead.profile.edit', $report->id) . '" class="edit-link"><i class="fas fa-edit"></i></a>
                 <span class="delete-link" style="cursor:pointer;" onclick="confirmDelete(' . $report->id . ')"><i class="fas fa-trash"></i></span>
            ';
            })
            ->editColumn('name', function ($report) {
                return trim($report->first_name . ' ' . $report->last_name) ?? ''; // Ensure there is a space between names
            })
            ->addColumn('email', function ($report) {
                return $report->email ?? '';
            })
            ->addColumn('phone', function ($report) {
                return $report->number ?? '';
            })
            ->addColumn('headquarters', function ($report) {
                return $report->sales_headquarter->name ?? ''; // Accessing the sales headquarter name
            })
            ->addColumn('role', function ($report) {
                return $report->role ?? ''; // Accessing the sales headquarter name
            })
            ->addColumn('reported_to', function ($report) {
                return $report->reported_to ?? ''; // Accessing the sales headquarter name
            })
            ->addColumn('assign_user', function ($report) {
                return $report->assign_user->name ?? ''; // Accessing the NestedRole name
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function create()
    {
        $sales_headquarters = Salesheadquarter::all();
        $categories = NestedRole::get();
        return view('leadprofile.create', compact('sales_headquarters', 'categories'));
    }
    public function edit($id)
    {
        $sales_headquarters = Salesheadquarter::all();
        $categories = NestedRole::get();
        $user = User::with(['sales_headquarter', 'assign_user'])->find($id);
        return view('leadprofile.edit', compact('sales_headquarters', 'categories', 'user'));
    }

    public function view($id)
    {
        $sales_headquarters = Salesheadquarter::all();
        $categories = NestedRole::get();
        $user = User::with(['sales_headquarter', 'assign_user'])->find($id);
        return view('leadprofile.view', compact('sales_headquarters', 'categories', 'user'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required|max:15',
            'last_name' => 'required|max:20',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required',
            'address' => 'required|max:40',
            'number' => 'required|numeric',
            'city' => 'required|max:20',
            'state' => 'required|max:20',
            'role' => 'required', // Use role_id
            'reported_to' => 'required', // Validate against users table
            'sales_headquarter_id' => 'required',
        ]);

        try {
            // Create the TreeRole
            $tree_role = NestedRole::create([
                'name' => $request->first_name . ' ' . $request->last_name,
            ]);

            if ($tree_role) {
                $node = NestedRole::find($request->parent);
                if ($node) {
                    $node->appendNode($tree_role);
                }
            }

            // Create User
            try {
                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'number' => $request->number,
                    'city' => $request->city,
                    'state' => $request->state,
                    'sales_headquarter_id' => $request->sales_headquarter_id,
                    'role' => $request->role, // Save role_id instead of role
                    'reported_to' => $request->reported_to, // Save reported_to_id instead of reported_to
                    'password' => Hash::make('password'),
                    'tree_role_id' => $tree_role->id,
                ]);
            } catch (\Exception $th) {
                dd($th->getMessage());
            }

            return redirect()->route('lead.profile')->with('success', 'User created successfully');

        } catch (\Exception $e) {
            dd('Failed to save user: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to save user: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {

        // Validate the request data
        $request->validate([
            'first_name' => 'required|max:15',
            'last_name' => 'required|max:20',
            'email' => 'required|email|unique:users,email,' . $id, // Allow current email
            'gender' => 'required',
            'address' => 'required|max:40',
            'number' => 'required|numeric',
            'city' => 'required|max:20',
            'state' => 'required|max:20',
            'role' => 'required',
            'reported_to' => 'required',
            'sales_headquarter_id' => 'required',
        ]);

        try {
            // Update the TreeRole
            $tree_role = NestedRole::find($request->parent);

            // If tree_role does not exist, handle accordingly
            if (!$tree_role) {
                return back()->withErrors(['parent' => 'Parent role not found.']);
            }

            // Update tree role with the user's full name
            $tree_role->name = $request->first_name . ' ' . $request->last_name;
            $tree_role->save(); // Save changes

            // Update User details
            $user = User::findOrFail($id); // Use findOrFail for better error handling
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'gender' => $request->gender,
                'address' => $request->address,
                'number' => $request->number,
                'city' => $request->city,
                'state' => $request->state,
                'sales_headquarter_id' => $request->sales_headquarter_id,
                'role' => $request->role, // Adjust this based on your DB column
                'reported_to' => $request->reported_to, // Adjust this based on your DB column
                'password' => Hash::make('password'), // If you are setting a default password, else remove this line
                'tree_role_id' => $tree_role->id,
            ]);

            return redirect()->route('lead.profile')->with('success', 'User updated successfully');

        } catch (\Exception $e) {
            dd($e->getMessage());
            // Handle exceptions more gracefully
            return back()->withErrors(['error' => 'Failed to update user: ' . $e->getMessage()]);
        }
    }

    // app/Http/Controllers/UserController.php

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return response()->json(['success' => 'User deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete user: ' . $e->getMessage()], 500);
        }
    }


}
