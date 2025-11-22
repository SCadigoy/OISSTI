<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::all();
        return response()->json($roomTypes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'capacity' => 'required|integer',
            'rate' => 'required|numeric',
        ]);

        $roomType = RoomType::create($request->all());
        return response()->json($roomType, 201);
    }

    public function show(RoomType $roomType)
    {
        return response()->json($roomType);
    }

    public function update(Request $request, RoomType $roomType)
    {
        $roomType->update($request->all());
        return response()->json($roomType);
    }

    public function destroy(RoomType $roomType)
    {
        $roomType->delete();
        return response()->json(null, 204);
    }
}
