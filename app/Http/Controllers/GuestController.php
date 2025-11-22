<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        return response()->json(Guest::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'nullable|email|unique:guests',
            'phone' => 'nullable|string',
        ]);

        $guest = Guest::create($request->all());
        return response()->json($guest, 201);
    }

    public function show(Guest $guest)
    {
        return response()->json($guest);
    }

    public function update(Request $request, Guest $guest)
    {
        $guest->update($request->all());
        return response()->json($guest);
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();
        return response()->json(null, 204);
    }
}
