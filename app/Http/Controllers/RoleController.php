<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $roles = Role::all();  // Fetch all roles from the database
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|unique:roles|max:20',
            'description' => 'required',
        ]);

        // Create a new role with the validated data
        $role = Role::create($validatedData);

        // Optionally, you can redirect to the index page or show the newly created role
        return redirect()->route('roles.index')
            ->with('success', "Role <strong>{$role->name} ({$role->id})</strong> created successfully");
    }


    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * using Role Model binding with Routing. $role should already
     * contain the data, unless ID is not found URL
     */
    public function edit(Role $role)
    {
        return view('role.edit', compact('role'));
    }
    
    // --- alternative code
    // public function edit($id)
    // {
    //     $role = Role::findOrFail($id);
    //     return view('role.edit', compact('role'));
    // }    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|max:20|unique:roles,name,' . $role->id, // Ensure the name is unique except for the current role
            'description' => 'required',
        ]);

        // Update the role with the validated data
        $role->update($validatedData);

        // Optionally, you can redirect to the index page or show the updated role
        return redirect()->route('roles.edit', $role->id)
            ->with('success', 'Role updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
