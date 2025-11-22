<?php

namespace App\Http\Controllers;

use App\Models\HousekeepingTask;
use Illuminate\Http\Request;

class HousekeepingTaskController extends Controller
{
    public function index()
    {
        return response()->json(HousekeepingTask::with(['room', 'assignedUser'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'priority' => 'integer',
            'reason' => 'required|in:stayover,checkout,deep_clean,early_checkin,vip',
            'assigned_to' => 'nullable|exists:users,id',
            'status' => 'in:pending,in_progress,completed,skipped',
        ]);

        $task = HousekeepingTask::create($request->all());
        return response()->json($task, 201);
    }

    public function show(HousekeepingTask $housekeepingTask)
    {
        return response()->json($housekeepingTask->load(['room', 'assignedUser']));
    }

    public function update(Request $request, HousekeepingTask $housekeepingTask)
    {
        $housekeepingTask->update($request->all());
        return response()->json($housekeepingTask);
    }

    public function destroy(HousekeepingTask $housekeepingTask)
    {
        $housekeepingTask->delete();
        return response()->json(null, 204);
    }
}
