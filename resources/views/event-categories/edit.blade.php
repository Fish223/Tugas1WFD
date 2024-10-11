@extends('layouts.app')

@section('content')
<h1>Edit Event Category: {{ $category->name }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('event-categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
    </div>

    <div class="form-group">
        <label for="active">Active</label>
        <select class="form-control" id="active" name="active" required>
            <option value="1" {{ $category->active ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ !$category->active ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Event Category</button>
</form>

<a href="{{ route('event-categories.index') }}" class="btn btn-secondary mt-3">Back to Event Categories</a>
@endsection
