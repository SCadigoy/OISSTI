<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('type')->get();
        return response()->json($rooms);
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|string|unique:rooms',
            'room_type_id' => 'required|exists:room_types,id',
            'status' => 'in:clean,dirty,inspected,out_of_order,occupied',
            'floor' => 'nullable|string',
            'amenities' => 'nullable|array',
        ]);

        $room = Room::create($request->all());
        return response()->json($room, 201);
    }

    public function show(Room $room)
    {
        return response()->json($room->load('type'));
    }

    public function update(Request $request, Room $room)
    {
        $room->update($request->all());
        return response()->json($room);
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return response()->json(null, 204);
    }
}
