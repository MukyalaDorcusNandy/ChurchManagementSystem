<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;  // <-- Add this import
use App\Models\Ministry;
use Illuminate\Http\Request;

class AdminMinistryController extends Controller
{
    // Show a list of ministries
    public function index()
    {
        $ministries = Ministry::all();  // Retrieve all ministries
        return view('admin.ministries.index', compact('ministries'));
    }

    // Show the form to create a new ministry
    public function create()
    {
        return view('admin.ministries.create');
    }

    // Store a newly created ministry in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Ministry::create($request->all());  // Save the new ministry

        return redirect()->route('admin.ministries.index')->with('success', 'Ministry created successfully');
    }

    // Show the form to edit an existing ministry
    public function edit(Ministry $ministry)
    {
        return view('admin.ministries.edit', compact('ministry'));
    }

    // Update an existing ministry
    public function update(Request $request, Ministry $ministry)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $ministry->update($request->all());  // Update the ministry

        return redirect()->route('admin.ministries.index')->with('success', 'Ministry updated successfully');
    }

    // Delete a ministry
    public function destroy(Ministry $ministry)
    {
        $ministry->delete();  // Delete the ministry

        return redirect()->route('admin.ministries.index')->with('success', 'Ministry deleted successfully');
    }
}
