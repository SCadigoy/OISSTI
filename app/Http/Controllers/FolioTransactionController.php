<?php

namespace App\Http\Controllers;

use App\Models\FolioTransaction;
use Illuminate\Http\Request;

class FolioTransactionController extends Controller
{
    public function index()
    {
        return response()->json(FolioTransaction::with(['folio', 'postedBy'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'folio_id' => 'required|exists:folios,id',
            'type' => 'required|in:charge,payment,adjustment',
            'amount' => 'required|numeric',
            'posted_by' => 'nullable|exists:users,id',
            'posted_at' => 'required|date',
        ]);

        $transaction = FolioTransaction::create($request->all());
        return response()->json($transaction, 201);
    }

    public function show(FolioTransaction $folioTransaction)
    {
        return response()->json($folioTransaction->load(['folio', 'postedBy']));
    }

    public function update(Request $request, FolioTransaction $folioTransaction)
    {
        $folioTransaction->update($request->all());
        return response()->json($folioTransaction);
    }

    public function destroy(FolioTransaction $folioTransaction)
    {
        $folioTransaction->delete();
        return response()->json(null, 204);
    }
}
