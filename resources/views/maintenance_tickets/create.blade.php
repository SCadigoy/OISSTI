@extends('layouts.app')

@section('title', isset($ticket) ? 'Edit Ticket' : 'Create Ticket')

@section('content')
<h1>{{ isset($ticket) ? 'Edit' : 'Create' }} Maintenance Ticket</h1>

<form action="{{ isset($ticket) ? route('maintenance_tickets.update', $ticket) : route('maintenance_tickets.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($ticket)) @method('PUT') @endif

    <div>
        <label>Room</label>
        <select name="room_id" class="border p-2">
            @foreach($rooms as $room)
            <option value="{{ $room->id }}" {{ isset($ticket) && $ticket->room_id == $room->id ? 'selected' : '' }}>
                {{ $room->number }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Reported By</label>
        <select name="reported_by" class="border p-2">
            <option value="">-- Select User --</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}" {{ isset($ticket) && $ticket->reported_by == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Assigned To</label>
        <select name="assigned_to" class="border p-2">
            <option value="">-- Select User --</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}" {{ isset($ticket) && $ticket->assigned_to == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Title</label>
        <input type="text" name="title" value="{{ $ticket->title ?? '' }}" class="border p-2">
    </div>

    <div>
        <label>Description</label>
        <textarea name="description" class="border p-2 w-full">{{ $ticket->description ?? '' }}</textarea>
    </div>

    <div>
        <label>Status</label>
        <select name="status" class="border p-2">
            @foreach(['open','in_progress','waiting_parts','closed'] as $status)
            <option value="{{ $status }}" {{ isset($ticket) && $ticket->status == $status ? 'selected' : '' }}>
                {{ ucfirst(str_replace('_',' ',$status)) }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Priority</label>
        <input type="number" name="priority" value="{{ $ticket->priority ?? 0 }}" class="border p-2">
    </div>

    <div>
        <label>SLA Due At</label>
        <input type="datetime-local" name="sla_due_at" value="{{ isset($ticket) ? $ticket->sla_due_at->format('Y-m-d\TH:i') : '' }}" class="border p-2">
    </div>

    <div>
        <label>Closed At</label>
        <input type="datetime-local" name="closed_at" value="{{ isset($ticket) && $ticket->closed_at ? $ticket->closed_at->format('Y-m-d\TH:i') : '' }}" class="border p-2">
    </div>

    <div>
        <label>Photos (optional)</label>
        <input type="file" name="photos[]" multiple class="border p-2">
    </div>

    <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-2 rounded">
        {{ isset($ticket) ? 'Update' : 'Create' }}
    </button>
</form>
@endsection
