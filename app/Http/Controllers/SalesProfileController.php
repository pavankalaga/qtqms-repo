<?php

namespace App\Http\Controllers;

use App\Models\Salesheadquarter;
use App\Models\TreeRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class SalesProfileController extends Controller
{
    public function index()
    {
        $sales_users = User::get();
        return view('users.index', compact('sales_users'));
    }

    public function create()
    {
        $sales_headquarters = Salesheadquarter::get();
        $treeRoles = TreeRole::get();

        return view('users.create', compact('sales_headquarters', 'treeRoles'));
    }
// In app/Http/Controllers/SalesProfileController.php

public function getReportedRoles($role)
{
    // Find the TreeRole node for the selected role
    $roleNode = TreeRole::where('reported_role', $role)->first();
    
    if (!$roleNode) {
        return response()->json([]);
    }

    // Get children nodes of the selected role to use in reported_to and reported_user
    $reportedRoles = $roleNode->children()->pluck('reported_role', 'id');

    return response()->json($reportedRoles);
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
        'role' => 'required',
        'sales_headquarter_id' => 'required',
        // 'parent' => 'nullable|exists:tree_roles,id', // Check if parent exists
    ]);

    \Log::info('Incoming Request Data:', $request->all());

    try {
        // Create the TreeRole
        $tree_role = TreeRole::create([
            'reported_role' => $request->first_name . ' ' . $request->last_name,
        ]);
        
        if ($tree_role) {
            $node = TreeRole::find($request->parent);
            if ($node) {
                $node->appendNode($tree_role);
            }
        }
        // Handle the parent node
        
        try {
            //code...
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
                'role' => $request->role,
                'reported_to' => $request->reported_to, // Use reported_to from request
                'password' => Hash::make('password'),
                'tree_role_id' => $tree_role->id,
            ]);
        } catch (\Exception $th) {
            dd($th->getMessage());
        }
        // dd($request->all());
        
        \Log::info('User Created:', $user->toArray());

        return redirect()->route('profile.index')->with('success', 'User created successfully');

    } catch (\Exception $e) {
        \Log::error('Failed to save user: ' . $e->getMessage());
        return back()->withErrors(['error' => 'Failed to save user: ' . $e->getMessage()]);
    }
}




}
