<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceTicket;
use Illuminate\Http\Request;

class MaintenanceTicketController extends Controller
{
    public function index()
    {
        return response()->json(MaintenanceTicket::with(['room', 'reporter', 'assignedUser'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'nullable|exists:rooms,id',
            'reported_by' => 'nullable|exists:users,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'assigned_to' => 'nullable|exists:users,id',
            'status' => 'in:open,in_progress,waiting_parts,closed',
            'priority' => 'integer',
            'sla_due_at' => 'nullable|date',
            'closed_at' => 'nullable|date',
        ]);

        $ticket = MaintenanceTicket::create($request->all());
        return response()->json($ticket, 201);
    }

    public function show(MaintenanceTicket $maintenanceTicket)
    {
        return response()->json($maintenanceTicket->load(['room', 'reporter', 'assignedUser']));
    }

    public function update(Request $request, MaintenanceTicket $maintenanceTicket)
    {
        $maintenanceTicket->update($request->all());
        return response()->json($maintenanceTicket);
    }

    public function destroy(MaintenanceTicket $maintenanceTicket)
    {
        $maintenanceTicket->delete();
        return response()->json(null, 204);
    }
}
