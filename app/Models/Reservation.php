<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends Model
{
    protected $fillable = ['guest_id', 'room_id', 'status', 'check_in_at', 'check_out_at', 'source', 'is_vip', 'created_by'];

    protected $casts = [
        'is_vip' => 'boolean',
        'check_in_at' => 'datetime',
        'check_out_at' => 'datetime',
    ];

    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function folio(): HasOne
    {
        return $this->hasOne(Folio::class);
    }

    public function feedback(): HasOne
    {
        return $this->hasOne(Feedback::class);
    }
}
