@extends('layouts.app')

@section('content')
<h1>Event Category Details</h1>

<p><strong>Name:</strong> {{ $category->name }}</p>
<p><strong>Active:</strong> {{ $category->active ? 'Yes' : 'No' }}</p>

<a href="{{ route('event-categories.index') }}" class="btn btn-secondary">Back to Event Categories</a>
@endsection
