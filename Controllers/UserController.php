<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        // Return view for creating new user
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'name' => 'required',
        ]);

        // Create new user
        User::create($request->all());

        // Redirect back with success message
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Add other CRUD methods as needed
}
