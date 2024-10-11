<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    public function index()
    {
        $categories = EventCategory::all(); // Fetch all event categories
        return view('event-categories.index', compact('categories')); // Pass categories to the view
    }

    public function create()
    {
        return view('event-categories.create'); // Show form to create category
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active' => 'required|boolean',
        ]);

        EventCategory::create($request->all()); // Store event category
        return redirect()->route('event-categories.index')->with('success', 'Event Category created successfully.');
    }

    public function show($id)
    {
        $category = EventCategory::findOrFail($id); // Fetch category details
        return view('event-categories.show', compact('category')); // Pass category to the view
    }

    public function edit($id)
    {
        $category = EventCategory::findOrFail($id); // Fetch category for editing
        return view('event-categories.edit', compact('category')); // Pass category to the edit view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active' => 'required|boolean',
        ]);

        $category = EventCategory::findOrFail($id); // Fetch category
        $category->update($request->all()); // Update category
        return redirect()->route('event-categories.index')->with('success', 'Event Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = EventCategory::findOrFail($id);
        $category->delete(); // Delete category
        return redirect()->route('event-categories.index')->with('success', 'Event Category deleted successfully.');
    }
}


