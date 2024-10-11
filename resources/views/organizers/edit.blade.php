@extends('layouts.app')

@section('content')
<h1>Edit Organizer: {{ $organizer->name }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('organizers.update', $organizer->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $organizer->name) }}" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description">{{ old('description', $organizer->description) }}</textarea>
    </div>

    <div class="form-group">
        <label for="facebook_link">Facebook Link</label>
        <input type="url" class="form-control" id="facebook_link" name="facebook_link" value="{{ old('facebook_link', $organizer->facebook_link) }}">
    </div>

    <div class="form-group">
        <label for="x_link">X (Twitter) Link</label>
        <input type="url" class="form-control" id="x_link" name="x_link" value="{{ old('x_link', $organizer->x_link) }}">
    </div>

    <div class="form-group">
        <label for="website_link">Website Link</label>
        <input type="url" class="form-control" id="website_link" name="website_link" value="{{ old('website_link', $organizer->website_link) }}">
    </div>

    <div class="form-group">
        <label for="active">Active</label>
        <select class="form-control" id="active" name="active" required>
            <option value="1" {{ $organizer->active ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ !$organizer->active ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Organizer</button>
</form>

<a href="{{ route('organizers.index') }}" class="btn btn-secondary mt-3">Back to Organizers</a>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/xv9cmw1iqpagrtx13hrs0e10uo4j6mzwjubxgi9ovgletv0j/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    // tinymce.init({
    //     selector: 'textarea#description' // Initialize TinyMCE on the description textarea
    // });
</script>
@endpush

