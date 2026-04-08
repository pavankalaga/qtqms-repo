<?php

namespace App\Http\Controllers;

use App\Models\Role;

class RoleController extends Controller
{
    public function show($id)
    {
        // Find the role by ID
        $role = Role::find($id);
        
        // Access the permissions for this role
        $permissions = $role->permissions;

        // Return view or JSON response
        return view('roles.show', compact('role', 'permissions'));
        // Or return response()->json($permissions); for API
    }
}
