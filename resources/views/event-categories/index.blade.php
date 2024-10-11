@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Event Categories</h1>
    <a href="{{ route('event-categories.create') }}" class="btn btn-primary mb-3">Create Event Category</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td><a href="{{ route('event-categories.show', $category->id) }}">{{ $category->name }}</a></td>
                <td>{{ $category->active ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('event-categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('event-categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">No event categories found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
