@extends('layouts.app')

@section('content')
<h1>{{ $event->title }}</h1>

<!-- Display a random image using Lorem Picsum -->
<img src="https://picsum.photos/800/400?random={{ $event->id }}" class="img-fluid" alt="{{ $event->title }}">

<!-- Display event details -->
<p><strong>Date:</strong> {{ $event->date->format('Y-m-d') }}</p>
<p><strong>Start Time:</strong> {{ $event->start_time->format('H:i') }}</p>
<p><strong>Venue:</strong> {{ $event->venue }}</p>
<p><strong>Organizer:</strong> {{ $event->organizer->name }}</p>
<p><strong>Category:</strong> {{ $event->category->name }}</p>
<p><strong>Description:</strong> {{ $event->description }}</p>
<p><strong>Booking URL:</strong> <a href="{{ $event->booking_url }}">{{ $event->booking_url }}</a></p>
<p><strong>Tag:</strong> {{ $event->tags }}</p>

<!-- Back button to return to events page -->
<a href="{{ route('events.page') }}" class="btn btn-secondary">Back to Events</a>
@endsection
