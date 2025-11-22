@extends('layouts.app')

@section('title', 'Maintenance Tickets')

@section('content')
<h1>Maintenance Tickets</h1>
<a href="{{ route('maintenance_tickets.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Ticket</a>

<table class="table-auto w-full mt-4 border-collapse border">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Title</th>
            <th class="border px-4 py-2">Room</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Priority</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tickets as $ticket)
        <tr>
            <td class="border px-4 py-2">{{ $ticket->id }}</td>
            <td class="border px-4 py-2">{{ $ticket->title }}</td>
            <td class="border px-4 py-2">{{ $ticket->room->number ?? 'N/A' }}</td>
            <td class="border px-4 py-2">{{ ucfirst($ticket->status) }}</td>
            <td class="border px-4 py-2">{{ $ticket->priority }}</td>
            <td class="border px-4 py-2">
                <a href="{{ route('maintenance_tickets.edit', $ticket) }}" class="text-blue-500">Edit</a>
                <form action="{{ route('maintenance_tickets.destroy', $ticket) }}" method="POST" class="inline">
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
