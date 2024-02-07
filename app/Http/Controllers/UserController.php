<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(15);
        return view("user.index", compact("users"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();  // Fetch all roles from the database
        return view('user.edit', compact('user','roles'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validation_rule = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:users,id,'.$user->id,
        ];

        if ($request->filled('password')) {
            $validation_rule['password'] = [ Password::defaults() ];
        }

        $request->validate( $validation_rule);

        $user->update($request->only(['name', 'email']));

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        // Sync user roles
        $user->roles()->sync( $request->input('roles', []) );

        return redirect()->route('users.edit', $user->id)
        ->with('success', 'User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
