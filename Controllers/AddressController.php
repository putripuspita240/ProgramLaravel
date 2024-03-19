<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        // Fetch all addresses
        $addresses = Address::all();
        return view('addresses.index', compact('addresses'));
    }

    public function create()
    {
        // Return view for creating new address
        return view('addresses.create');
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'user_id' => 'required',
            'street' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
        ]);

        // Create new address
        Address::create($request->all());

        // Redirect back with success message
        return redirect()->route('addresses.index')->with('success', 'Address created successfully.');
    }

    // Add other CRUD methods as needed
}
