@extends('layouts.app')

@section('content')
<h1>Create Event Category</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('event-categories.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="active">Active</label>
        <select class="form-control" id="active" name="active" required>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Event Category</button>
</form>
@endsection
