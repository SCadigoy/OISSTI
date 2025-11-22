@extends('layouts.app')

@section('title', 'Edit Guest')

@section('content')
<h1>Edit Guest</h1>
<form action="{{ route('guests.update', $guest) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>First Name</label>
        <input type="text" name="first_name" value="{{ $guest->first_name }}" class="border p-2">
    </div>
    <div>
        <label>Last Name</label>
        <input type="text" name="last_name" value="{{ $guest->last_name }}" class="border p-2">
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ $guest->email }}" class="border p-2">
    </div>
    <div>
        <label>Phone</label>
        <input type="text" name="phone" value="{{ $guest->phone }}" class="border p-2">
    </div>
    <div>
        <label>Government ID</label>
        <input type="text" name="government_id" value="{{ $guest->government_id }}" class="border p-2">
    </div>
    <div>
        <label>Loyalty Number</label>
        <input type="text" name="loyalty_number" value="{{ $guest->loyalty_number }}" class="border p-2">
    </div>
    <div>
        <label>Notes</label>
        <textarea name="notes" class="border p-2 w-full">{{ $guest->notes }}</textarea>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2 rounded">Update</button>
</form>
@endsection
