@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Organizers</h1>
    <a href="{{ route('organizers.create') }}" class="btn btn-primary mb-3">Create Organizer</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($organizers as $organizer)
            <tr>
                <td><a href="{{ route('organizers.show', $organizer->id) }}">{{ $organizer->name }}</a></td>
                <td>{{ $organizer->description }}</td>
                <td>
                    <a href="{{ route('organizers.edit', $organizer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('organizers.destroy', $organizer->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">No organizers found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
