@extends('layouts.app')

@section('content')
<h1>Create Organizer</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('organizers.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>

    <div class="form-group">
        <label for="facebook_link">Facebook Link</label>
        <input type="url" class="form-control" id="facebook_link" name="facebook_link">
    </div>

    <div class="form-group">
        <label for="x_link">X (Twitter) Link</label>
        <input type="url" class="form-control" id="x_link" name="x_link">
    </div>

    <div class="form-group">
        <label for="website_link">Website Link</label>
        <input type="url" class="form-control" id="website_link" name="website_link">
    </div>

    <div class="form-group">
        <label for="active">Active</label>
        <select class="form-control" id="active" name="active" required>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Organizer</button>
</form>
@endsection
