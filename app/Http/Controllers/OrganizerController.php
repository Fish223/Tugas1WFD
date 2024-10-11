<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function index()
    {
        $organizers = Organizer::all(); // Fetch all organizers
        return view('organizers.index', compact('organizers')); // Pass organizers to the view
    }

    public function create()
    {
        return view('organizers.create'); // Show form to create organizer
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'facebook_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'website_link' => 'nullable|url',
            'active' => 'required|boolean',
        ]);

        Organizer::create($request->all()); // Store organizer
        return redirect()->route('organizers.index')->with('success', 'Organizer created successfully.');
    }

    public function show($id)
    {
        $organizer = Organizer::findOrFail($id); // Fetch organizer details
        return view('organizers.show', compact('organizer')); // Pass organizer to the view
    }

    public function edit($id)
    {
        $organizer = Organizer::findOrFail($id); // Fetch organizer for editing
        return view('organizers.edit', compact('organizer')); // Pass organizer to the edit view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'facebook_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'website_link' => 'nullable|url',
            'active' => 'required|boolean',
        ]);

        $organizer = Organizer::findOrFail($id); // Fetch organizer
        $organizer->update($request->all()); // Update organizer
        return redirect()->route('organizers.index')->with('success', 'Organizer updated successfully.');
    }

    public function destroy($id)
    {
        $organizer = Organizer::findOrFail($id);
        $organizer->delete(); // Delete organizer
        return redirect()->route('organizers.index')->with('success', 'Organizer deleted successfully.');
    }
}

