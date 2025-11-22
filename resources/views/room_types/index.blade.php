@extends('layouts.app')

@section('content')
<h1>Room Types</h1>
<a href="{{ route('room_types.create') }}">Add Room Type</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Capacity</th>
            <th>Rate</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roomTypes as $type)
        <tr>
            <td>{{ $type->id }}</td>
            <td>{{ $type->name }}</td>
            <td>{{ $type->capacity }}</td>
            <td>{{ $type->rate }}</td>
            <td>
                <a href="{{ route('room_types.edit', $type) }}">Edit</a>
                <form action="{{ route('room_types.destroy', $type) }}" method="POST" style="display:inline;">
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
