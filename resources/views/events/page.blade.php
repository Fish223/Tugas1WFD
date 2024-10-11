@extends('layouts.app')

@section('content')
<h1>Upcoming Events</h1>

<div class="row">
    @foreach($events as $event)
    <div class="col-md-4 mb-4">
        <div class="card">
            <img src="https://picsum.photos/300/200?random={{ $loop->index }}" class="card-img-top" alt="{{ $event->title }}"> 
            <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text">Date: {{ $event->date->format('Y-m-d') }} at {{ $event->start_time->format('H:i') }}</p>
                <p class="card-text">Venue: {{ $event->venue }}</p>
                <p class="card-text">Organizer: {{ $event->organizer->name }}</p>
                <a href="{{ route('events.details', $event->id) }}" class="btn btn-primary">View Details</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
