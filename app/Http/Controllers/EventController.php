<?php

namespace App\Http\Controllers;
use App\Models\Organizer;
use App\Models\EventCategory;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with(['organizer', 'category'])->get(); // Eager load organizer and category
        return view('events.index', compact('events')); // Pass events to the view
    }
    



public function create()
{
    $organizers = Organizer::all();
    $categories = EventCategory::all(); // Fetch all event categories
    return view('events.create', compact('organizers', 'categories')); // Pass both organizers and categories to the view
}



public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'venue' => 'required|string|max:255',
        'date' => 'required|date',
        'start_time' => 'required|date_format:H:i', // Validate the start time
        'organizer_id' => 'required|exists:organizers,id',
        'event_category_id' => 'required|exists:event_categories,id',
        'tags' => 'nullable|string',
        'description' => 'required|string',
        'booking_url' => 'nullable|url' // Validate booking URL (optional)
    ]);

    Event::create([
        'title' => $request->title,
        'venue' => $request->venue,
        'date' => $request->date,
        'start_time' => $request->start_time,
        'description' => $request->description,
        'organizer_id' => $request->organizer_id,
        'event_category_id' => $request->event_category_id,
        'tags' => $request->tags ?? '',
        'booking_url' => $request->booking_url, // Save the booking URL
        'active' => 1,
    ]);

    return redirect()->route('events.index')->with('success', 'Event created successfully.');
}






public function show($id)
{
    $event = Event::with(['organizer', 'category'])->findOrFail($id); // Eager load relationships
    return view('events.show', compact('event'));
}



public function edit($id)
{
    $event = Event::with(['organizer', 'category'])->findOrFail($id); // Fetch the event with relationships
    $organizers = Organizer::all(); // Fetch all organizers
    $categories = EventCategory::all(); // Fetch all categories

    return view('events.edit', compact('event', 'organizers', 'categories')); // Pass them to the view
}


public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'venue' => 'required|string|max:255',
        'date' => 'required|date',
        'start_time' => 'required|date_format:H:i', // Validate the start time
        'organizer_id' => 'required|exists:organizers,id',
        'event_category_id' => 'required|exists:event_categories,id',
        'tags' => 'nullable|string',
        'description' => 'required|string',
        'booking_url' => 'nullable|url' // Validate booking URL (optional)
    ]);

    $event = Event::findOrFail($id); // Find the event by ID

    $event->update([
        'title' => $request->title,
        'venue' => $request->venue,
        'date' => $request->date,
        'start_time' => $request->start_time,
        'description' => $request->description,
        'organizer_id' => $request->organizer_id,
        'event_category_id' => $request->event_category_id,
        'tags' => $request->tags ?? '',
        'booking_url' => $request->booking_url, // Update the booking URL
        'active' => 1,
    ]);

    return redirect()->route('events.index')->with('success', 'Event updated successfully.');
}


    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index');
    }


    public function eventsPage()
{
    $events = Event::with(['organizer', 'category'])->get(); // Fetch all events with relationships
    return view('events.page', compact('events')); // Return the events page view
}

public function eventDetails($id)
{
    $event = Event::with(['organizer', 'category'])->findOrFail($id); // Fetch the event with relationships
    return view('events.details', compact('event')); // Return the details view
}


}


