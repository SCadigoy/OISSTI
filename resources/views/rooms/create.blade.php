@extends('layouts.app')

@section('content')
<h1>Add Room</h1>
<form action="{{ route('rooms.store') }}" method="POST">
    @csrf
    <label>Number</label>
    <input type="text" name="number" required>

    <label>Type</label>
    <select name="room_type_id" required>
        @foreach($roomTypes as $type)
        <option value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
    </select>

    <label>Status</label>
    <select name="status">
        <option value="clean">Clean</option>
        <option value="dirty">Dirty</option>
        <option value="inspected">Inspected</option>
        <option value="out_of_order">Out of Order</option>
        <option value="occupied">Occupied</option>
    </select>

    <label>Floor</label>
    <input type="text" name="floor">

    <label>Amenities (comma separated)</label>
    <input type="text" name="amenities">

    <button type="submit">Save</button>
</form>
@endsection
