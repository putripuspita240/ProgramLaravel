<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Fetch all contacts
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        // Return view for creating new contact
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'user_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:contacts',
            'phone' => 'required',
        ]);

        // Create new contact
        Contact::create($request->all());

        // Redirect back with success message
        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    // Add other CRUD methods as needed
}
