@extends('layouts.app')

@section('title', 'Event Details')

@section('content')
<div class="container">
    <h1>{{ $event->title }}</h1>
    <p><strong>Venue:</strong> {{ $event->venue }}</p>
    <p><strong>Date:</strong> {{ $event->date->format('Y-m-d') }}</p>
    <p><strong>Description:</strong> {{ $event->description }}</p>
    
    <p><strong>Organizer:</strong> 
        {{ $event->organizer ? $event->organizer->name : 'No organizer found' }}
    </p>
    
    <p><strong>Category:</strong> 
        {{ $event->category ? $event->category->name : 'No category found' }}
    </p>
    
    <p><strong>Booking URL:</strong> <a href="{{ $event->booking_url }}">{{ $event->booking_url }}</a></p>
    
    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to Events</a>
</div>
@endsection
