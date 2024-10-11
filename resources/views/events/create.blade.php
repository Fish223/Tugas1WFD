@extends('layouts.app')

@section('content')
<h1>Create Event</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('events.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>

    <div class="form-group">
        <label for="venue">Venue</label>
        <input type="text" class="form-control" id="venue" name="venue" required>
    </div>

    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" name="date" required>
    </div>

    <div class="form-group">
        <label for="start_time">Start Time</label>
        <input type="time" class="form-control" id="start_time" name="start_time" required>
    </div>

    <div class="form-group">
        <label for="organizer">Organizer</label>
        <select class="form-control" id="organizer" name="organizer_id" required>
            <option value="">Select Organizer</option>
            @foreach ($organizers as $organizer)
                <option value="{{ $organizer->id }}">{{ $organizer->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="event_category">Category</label>
        <select class="form-control" id="event_category" name="event_category_id" required>
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="tags">Tags</label>
        <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter tags, separated by commas">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Create Event</button>
</form>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/xv9cmw1iqpagrtx13hrs0e10uo4j6mzwjubxgi9ovgletv0j/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    // tinymce.init({
    //     selector: 'textarea#description' // Initialize TinyMCE on the description textarea
    // });
</script>
@endpush
