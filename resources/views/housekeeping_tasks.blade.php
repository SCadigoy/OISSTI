@extends('layouts.app')

@section('title', 'Housekeeping Tasks')

@section('content')
<h1>{{ isset($task) ? 'Edit' : 'Create' }} Housekeeping Task</h1>

<form action="{{ isset($task) ? route('housekeeping_tasks.update', $task) : route('housekeeping_tasks.store') }}" method="POST">
    @csrf
    @if(isset($task)) @method('PUT') @endif

    <div>
        <label>Room</label>
        <select name="room_id" class="border p-2">
            @foreach($rooms as $room)
            <option value="{{ $room->id }}" {{ (isset($task) && $task->room_id == $room->id) ? 'selected' : '' }}>
                {{ $room->number }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Priority</label>
        <input type="number" name="priority" value="{{ $task->priority ?? 0 }}" class="border p-2">
    </div>

    <div>
        <label>Reason</label>
        <select name="reason" class="border p-2">
            @foreach(['stayover','checkout','deep_clean','early_checkin','vip'] as $reason)
            <option value="{{ $reason }}" {{ (isset($task) && $task->reason == $reason) ? 'selected' : '' }}>{{ ucfirst($reason) }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Assigned To</label>
        <select name="assigned_to" class="border p-2">
            <option value="">-- Select User --</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}" {{ (isset($task) && $task->assigned_to == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Status</label>
        <select name="status" class="border p-2">
            @foreach(['pending','in_progress','completed','skipped'] as $status)
            <option value="{{ $status }}" {{ (isset($task) && $task->status == $status) ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Notes</label>
        <textarea name="notes" class="border p-2 w-full">{{ $task->notes ?? '' }}</textarea>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2 rounded">
        {{ isset($task) ? 'Update' : 'Create' }}
    </button>
</form>
@endsection
