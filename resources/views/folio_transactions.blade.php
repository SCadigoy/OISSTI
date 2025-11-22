@extends('layouts.app')

@section('title', 'Folio Transactions')

@section('content')
<h1>{{ isset($transaction) ? 'Edit' : 'Create' }} Transaction</h1>

<form action="{{ isset($transaction) ? route('folio_transactions.update', $transaction) : route('folio_transactions.store') }}" method="POST">
    @csrf
    @if(isset($transaction)) @method('PUT') @endif

    <div>
        <label>Folio</label>
        <select name="folio_id" class="border p-2">
            @foreach($folios as $folio)
            <option value="{{ $folio->id }}" {{ isset($transaction) && $transaction->folio_id == $folio->id ? 'selected' : '' }}>
                #{{ $folio->id }} ({{ $folio->guest->first_name ?? '' }})
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Type</label>
        <select name="type" class="border p-2">
            @foreach(['charge','payment','adjustment'] as $type)
            <option value="{{ $type }}" {{ isset($transaction) && $transaction->type == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Amount</label>
        <input type="number" step="0.01" name="amount" value="{{ $transaction->amount ?? '' }}" class="border p-2">
    </div>

    <div>
        <label>Posted By</label>
        <select name="posted_by" class="border p-2">
            <option value="">-- Select User --</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}" {{ isset($transaction) && $transaction->posted_by == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Posted At</label>
        <input type="datetime-local" name="posted_at" value="{{ isset($transaction) ? $transaction->posted_at->format('Y-m-d\TH:i') : '' }}" class="border p-2">
    </div>

    <div>
        <label>Description</label>
        <textarea name="description" class="border p-2 w-full">{{ $transaction->description ?? '' }}</textarea>
    </div>

    <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-2 rounded">
        {{ isset($transaction) ? 'Update' : 'Create' }}
    </button>
</form>
@endsection
