@extends('layouts.app')

@section('content')
<h1>Edit Room Type</h1>
<form action="{{ route('room_types.update', $roomType) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Name</label>
    <input type="text" name="name" value="{{ $roomType->name }}" required>
    <label>Capacity</label>
    <input type="number" name="capacity" value="{{ $roomType->capacity }}" required>
    <label>Rate</label>
    <input type="number" step="0.01" name="rate" value="{{ $roomType->rate }}" required>
    <button type="submit">Update</button>
</form>
@endsection
