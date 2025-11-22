@extends('layouts.app')

@section('title', 'Folios')

@section('content')
<h1>Folios</h1>
<a href="{{ route('folios.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Folio</a>

<table class="table-auto w-full mt-4 border-collapse border">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Reservation</th>
            <th class="border px-4 py-2">Guest</th>
            <th class="border px-4 py-2">Balance</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($folios as $folio)
        <tr>
            <td class="border px-4 py-2">{{ $folio->id }}</td>
            <td class="border px-4 py-2">{{ $folio->reservation->id ?? 'N/A' }}</td>
            <td class="border px-4 py-2">{{ $folio->guest->first_name ?? '' }} {{ $folio->guest->last_name ?? '' }}</td>
            <td class="border px-4 py-2">{{ $folio->balance }}</td>
            <td class="border px-4 py-2">
                <a href="{{ route('folios.show', $folio) }}" class="text-blue-500">View</a>
                <a href="{{ route('folios.edit', $folio) }}" class="text-green-500 ml-2">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
