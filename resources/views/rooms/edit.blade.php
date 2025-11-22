@extends('layouts.app')

@section('content')
<h1>Edit Room</h1>
<form action="{{ route('rooms.update', $room) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Number</label>
    <input type="text" name="number" value="{{ $room->number }}" required>

    <label>Type</label>
    <select name="room_type_id" required>
        @foreach($roomTypes as $type)
        <option value="{{ $type->id }}" {{ $room->room_type_id == $type->id ? 'selected' : '' }}>
            {{ $type->name }}
        </option>
        @endforeach
    </select>

    <label>Status</label>
    <select name="status">
        @foreach(['clean','dirty','inspected','out_of_order','occupied'] as $status)
        <option value="{{ $status }}" {{ $room->status == $status ? 'selected' : '' }}>{{ $status }}</option>
        @endforeach
    </select>

    <label>Floor</label>
    <input type="text" name="floor" value="{{ $room->floor }}">

    <label>Amenities (comma separated)</label>
    <input type="text" name="amenities" value="{{ implode(',', $room->amenities ?? []) }}">

    <button type="submit">Update</button>
</form>
@endsection
