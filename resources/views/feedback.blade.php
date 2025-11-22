@extends('layouts.app')

@section('title', 'Feedback')

@section('content')
<h1>{{ isset($feedback) ? 'Edit' : 'Add' }} Feedback</h1>

<form action="{{ isset($feedback) ? route('feedback.update', $feedback) : route('feedback.store') }}" method="POST">
    @csrf
    @if(isset($feedback)) @method('PUT') @endif

    <div>
        <label>Reservation</label>
        <select name="reservation_id" class="border p-2">
            <option value="">-- Select Reservation --</option>
            @foreach($reservations as $res)
            <option value="{{ $res->id }}" {{ isset($feedback) && $feedback->reservation_id == $res->id ? 'selected' : '' }}>
                #{{ $res->id }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Guest</label>
        <select name="guest_id" class="border p-2">
            <option value="">-- Select Guest --</option>
            @foreach($guests as $guest)
            <option value="{{ $guest->id }}" {{ isset($feedback) && $feedback->guest_id == $guest->id ? 'selected' : '' }}>
                {{ $guest->first_name }} {{ $guest->last_name }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Content</label>
        <textarea name="content" class="border p-2 w-full">{{ $feedback->content ?? '' }}</textarea>
    </div>

    <div>
        <label>Category</label>
        <select name="category" class="border p-2">
            @foreach(['housekeeping','maintenance','service','billing'] as $cat)
            <option value="{{ $cat }}" {{ isset($feedback) && $feedback->category == $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Severity</label>
        <select name="severity" class="border p-2">
            @foreach(['info','minor','major'] as $sev)
            <option value="{{ $sev }}" {{ isset($feedback) && $feedback->severity == $sev ? 'selected' : '' }}>{{ ucfirst($sev) }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>
            <input type="checkbox" name="resolved" {{ isset($feedback) && $feedback->resolved ? 'checked' : '' }}> Resolved
        </label>
    </div>

    <div>
        <label>Resolution Notes</label>
        <textarea name="resolution_notes" class="border p-2 w-full">{{ $feedback->resolution_notes ?? '' }}</textarea>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2 rounded">
        {{ isset($feedback) ? 'Update' : 'Submit' }}
    </button>
</form>
@endsection
