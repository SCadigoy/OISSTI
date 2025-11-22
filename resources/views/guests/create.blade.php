@extends('layouts.app')

@section('title', 'Add Guest')

@section('content')
<h1>Add Guest</h1>
<form action="{{ route('guests.store') }}" method="POST">
    @csrf
    <div>
        <label>First Name</label>
        <input type="text" name="first_name" required class="border p-2">
    </div>
    <div>
        <label>Last Name</label>
        <input type="text" name="last_name" required class="border p-2">
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" class="border p-2">
    </div>
    <div>
        <label>Phone</label>
        <input type="text" name="phone" class="border p-2">
    </div>
    <div>
        <label>Government ID</label>
        <input type="text" name="government_id" class="border p-2">
    </div>
    <div>
        <label>Loyalty Number</label>
        <input type="text" name="loyalty_number" class="border p-2">
    </div>
    <div>
        <label>Notes</label>
        <textarea name="notes" class="border p-2 w-full"></textarea>
    </div>
    <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-2 rounded">Save</button>
</form>
@endsection
