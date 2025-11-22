<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaintenanceTicket extends Model
{
    protected $fillable = ['room_id', 'reported_by', 'title', 'description', 'photos', 'assigned_to', 'status', 'sla_due_at', 'closed_at', 'priority'];

    protected $casts = [
        'photos' => 'array',
        'sla_due_at' => 'datetime',
        'closed_at' => 'datetime',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_by');
    }

    public function assignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
