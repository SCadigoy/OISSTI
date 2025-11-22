<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // --------------------
    // Relationships
    // --------------------

    // Reservations created by the user
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'created_by');
    }

    // Housekeeping tasks assigned to the user
    public function housekeepingTasks(): HasMany
    {
        return $this->hasMany(HousekeepingTask::class, 'assigned_to');
    }

    // Maintenance tickets reported by the user
    public function reportedTickets(): HasMany
    {
        return $this->hasMany(MaintenanceTicket::class, 'reported_by');
    }

    // Maintenance tickets assigned to the user
    public function assignedTickets(): HasMany
    {
        return $this->hasMany(MaintenanceTicket::class, 'assigned_to');
    }

    // Folio transactions posted by the user
    public function folioTransactions(): HasMany
    {
        return $this->hasMany(FolioTransaction::class, 'posted_by');
    }

    // --------------------
    // Helper functions
    // --------------------
    public function isFrontdesk(): bool
    {
        return $this->role === 'frontdesk';
    }

    public function isHousekeeping(): bool
    {
        return $this->role === 'housekeeping';
    }

    public function isMaintenance(): bool
    {
        return $this->role === 'maintenance';
    }

    public function isSupervisor(): bool
    {
        return $this->role === 'supervisor';
    }
}
