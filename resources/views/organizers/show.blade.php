@extends('layouts.app')

@section('content')
<h1>Organizer Details</h1>

<p><strong>Name:</strong> {{ $organizer->name }}</p>
<p><strong>Description:</strong> {{ $organizer->description }}</p>
<p><strong>Facebook Link:</strong> <a href="{{ $organizer->facebook_link }}">{{ $organizer->facebook_link }}</a></p>
<p><strong>X Link:</strong> <a href="{{ $organizer->x_link }}">{{ $organizer->x_link }}</a></p>
<p><strong>Website Link:</strong> <a href="{{ $organizer->website_link }}">{{ $organizer->website_link }}</a></p>
<p><strong>Active:</strong> {{ $organizer->active ? 'Yes' : 'No' }}</p>

<a href="{{ route('organizers.index') }}" class="btn btn-secondary">Back to Organizers</a>
@endsection
