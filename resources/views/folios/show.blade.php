@extends('layouts.app')

@section('title', 'Folio Details')

@section('content')
<h1>Folio #{{ $folio->id }}</h1>
<p>Guest: {{ $folio->guest->first_name ?? '' }} {{ $folio->guest->last_name ?? '' }}</p>
<p>Reservation ID: {{ $folio->reservation->id ?? 'N/A' }}</p>
<p>Balance: {{ $folio->balance }}</p>

<h2 class="mt-4">Transactions</h2>
<table class="table-auto w-full mt-2 border-collapse border">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Type</th>
            <th class="border px-4 py-2">Amount</th>
            <th class="border px-4 py-2">Posted By</th>
            <th class="border px-4 py-2">Posted At</th>
            <th class="border px-4 py-2">Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach($folio->transactions as $tx)
        <tr>
            <td class="border px-4 py-2">{{ $tx->id }}</td>
            <td class="border px-4 py-2">{{ ucfirst($tx->type) }}</td>
            <td class="border px-4 py-2">{{ $tx->amount }}</td>
            <td class="border px-4 py-2">{{ $tx->postedBy->name ?? 'N/A' }}</td>
            <td class="border px-4 py-2">{{ $tx->posted_at }}</td>
            <td class="border px-4 py-2">{{ $tx->description }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
