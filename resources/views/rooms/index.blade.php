@extends('layouts.app')

@section('content')
<h1>Rooms</h1>
<a href="{{ route('rooms.create') }}">Add Room</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Number</th>
            <th>Type</th>
            <th>Status</th>
            <th>Floor</th>
            <th>Amenities</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rooms as $room)
        <tr>
            <td>{{ $room->id }}</td>
            <td>{{ $room->number }}</td>
            <td>{{ $room->type->name ?? 'N/A' }}</td>
            <td>{{ $room->status }}</td>
            <td>{{ $room->floor }}</td>
            <td>{{ implode(', ', $room->amenities ?? []) }}</td>
            <td>
                <a href="{{ route('rooms.edit', $room) }}">Edit</a>
                <form action="{{ route('rooms.destroy', $room) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
