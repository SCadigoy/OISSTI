@extends('layouts.app')

@section('title', 'Users')

@section('content')
<h1>{{ isset($user) ? 'Edit' : 'Add' }} User</h1>

<form action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}" method="POST">
    @csrf
    @if(isset($user)) @method('PUT') @endif

    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ $user->name ?? '' }}" class="border p-2">
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email ?? '' }}" class="border p-2">
    </div>

    <div>
        <label>Password</label>
        <input type="password" name="password" class="border p-2">
        @if(isset($user))
            <small>Leave blank to keep existing password.</small>
        @endif
    </div>

    <div>
        <label>Role</label>
        <select name="role" class="border p-2">
            @foreach(['frontdesk','housekeeping','maintenance','supervisor'] as $role)
            <option value="{{ $role }}" {{ isset($user) && $user->role == $role ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-2 rounded">
        {{ isset($user) ? 'Update' : 'Create' }}
    </button>
</form>
@endsection
