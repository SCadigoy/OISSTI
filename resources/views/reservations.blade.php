@extends('layouts.app')

@section('title', 'Reservations')

@section('content')
<h1>{{ isset($reservation) ? 'Edit' : 'Create' }} Reservation</h1>

<form action="{{ isset($reservation) ? route('reservations.update', $reservation) : route('reservations.store') }}" method="POST">
    @csrf
    @if(isset($reservation)) @method('PUT') @endif

    <div>
        <label>Guest</label>
        <select name="guest_id" required class="border p-2">
            @foreach($guests as $guest)
            <option value="{{ $guest->id }}" {{ (isset($reservation) && $reservation->guest_id == $guest->id) ? 'selected' : '' }}>
                {{ $guest->first_name }} {{ $guest->last_name }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Room</label>
        <select name="room_id" class="border p-2">
            <option value="">Select room</option>
            @foreach($rooms as $room)
            <option value="{{ $room->id }}" {{ (isset($reservation) && $reservation->room_id == $room->id) ? 'selected' : '' }}>
                {{ $room->number }} ({{ $room->type->name ?? '' }})
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Check-in</label>
        <input type="date" name="check_in_at" value="{{ $reservation->check_in_at ?? '' }}" class="border p-2">
    </div>

    <div>
        <label>Check-out</label>
        <input type="date" name="check_out_at" value="{{ $reservation->check_out_at ?? '' }}" class="border p-2">
    </div>

    <div>
        <label>Status</label>
        <select name="status" class="border p-2">
            @foreach(['booked','checked_in','checked_out','cancelled','no_show'] as $status)
            <option value="{{ $status }}" {{ (isset($reservation) && $reservation->status == $status) ? 'selected' : '' }}>
                {{ ucfirst(str_replace('_',' ',$status)) }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Source</label>
        <input type="text" name="source" value="{{ $reservation->source ?? '' }}" class="border p-2">
    </div>

    <div>
        <label>
            <input type="checkbox" name="is_vip" {{ (isset($reservation) && $reservation->is_vip) ? 'checked' : '' }}> VIP
        </label>
    </div>

    <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-2 rounded">
        {{ isset($reservation) ? 'Update' : 'Create' }}
    </button>
</form>
@endsection
