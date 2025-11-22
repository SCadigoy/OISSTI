@extends('layouts.app')

@section('title', 'Guests')

@section('content')
<h1>Guests</h1>
<a href="{{ route('guests.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Guest</a>

<table class="table-auto w-full mt-4 border-collapse border">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Phone</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($guests as $guest)
        <tr>
            <td class="border px-4 py-2">{{ $guest->id }}</td>
            <td class="border px-4 py-2">{{ $guest->first_name }} {{ $guest->last_name }}</td>
            <td class="border px-4 py-2">{{ $guest->email }}</td>
            <td class="border px-4 py-2">{{ $guest->phone }}</td>
            <td class="border px-4 py-2">
                <a href="{{ route('guests.edit', $guest) }}" class="text-blue-500">Edit</a>
                <form action="{{ route('guests.destroy', $guest) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 ml-2">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
