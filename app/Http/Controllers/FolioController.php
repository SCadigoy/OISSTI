<?php

namespace App\Http\Controllers;

use App\Models\Folio;
use Illuminate\Http\Request;

class FolioController extends Controller
{
    public function index()
    {
        return response()->json(Folio::with(['reservation', 'guest', 'transactions'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservation_id' => 'nullable|exists:reservations,id',
            'guest_id' => 'nullable|exists:guests,id',
            'balance' => 'numeric',
        ]);

        $folio = Folio::create($request->all());
        return response()->json($folio, 201);
    }

    public function show(Folio $folio)
    {
        return response()->json($folio->load(['reservation', 'guest', 'transactions']));
    }

    public function update(Request $request, Folio $folio)
    {
        $folio->update($request->all());
        return response()->json($folio);
    }

    public function destroy(Folio $folio)
    {
        $folio->delete();
        return response()->json(null, 204);
    }
}
