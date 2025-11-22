<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return response()->json(Feedback::with(['reservation', 'guest'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservation_id' => 'nullable|exists:reservations,id',
            'guest_id' => 'nullable|exists:guests,id',
            'content' => 'required|string',
            'category' => 'required|in:housekeeping,maintenance,service,billing',
            'severity' => 'required|in:info,minor,major',
            'resolved' => 'boolean',
        ]);

        $feedback = Feedback::create($request->all());
        return response()->json($feedback, 201);
    }

    public function show(Feedback $feedback)
    {
        return response()->json($feedback->load(['reservation', 'guest']));
    }

    public function update(Request $request, Feedback $feedback)
    {
        $feedback->update($request->all());
        return response()->json($feedback);
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return response()->json(null, 204);
    }
}
