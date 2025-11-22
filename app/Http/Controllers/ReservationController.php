<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return response()->json(Reservation::with(['guest', 'room'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'room_id' => 'nullable|exists:rooms,id',
            'check_in_at' => 'required|date',
            'check_out_at' => 'required|date|after:check_in_at',
            'status' => 'in:booked,checked_in,checked_out,cancelled,no_show',
            'source' => 'nullable|string',
            'is_vip' => 'boolean',
            'created_by' => 'nullable|exists:users,id',
        ]);

        $reservation = Reservation::create($request->all());
        return response()->json($reservation, 201);
    }

    public function show(Reservation $reservation)
    {
        return response()->json($reservation->load(['guest', 'room']));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->all());
        return response()->json($reservation);
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return response()->json(null, 204);
    }
}
