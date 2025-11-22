@extends('layouts.app')

@section('content')
<h1>Create Room Type</h1>
<form action="{{ route('room_types.store') }}" method="POST">
    @csrf
    <label>Name</label>
    <input type="text" name="name" required>
    <label>Capacity</label>
    <input type="number" name="capacity" required>
    <label>Rate</label>
    <input type="number" step="0.01" name="rate" required>
    <button type="submit">Save</button>
</form>
@endsection
