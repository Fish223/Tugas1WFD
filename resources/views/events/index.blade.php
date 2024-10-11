@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Events</h1>
        <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Create Event</a>

        <table id="events-table" class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Venue</th>
                    <th>Date</th>
                    <th>Start Time</th> <!-- Add Start Time column -->
                    <th>Organizer</th>
                    <th>Category</th>
                    <th>Booking URL</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->venue }}</td>
                    <td>{{ $event->date->format('Y-m-d') }}</td>
                    <td>{{ $event->start_time->format('H:i') }}</td> <!-- Display Start Time -->
                    <td>{{ $event->organizer ? $event->organizer->name : 'No Organizer' }}</td>
                    <td>{{ $event->category ? $event->category->name : 'No Category' }}</td>
                    <td>
                        @if($event->booking_url)
                            <a href="{{ $event->booking_url }}" target="_blank">Book Now</a>
                        @else
                            No Booking URL
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">No events found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#events-table').DataTable();
    });
</script>
@endpush
