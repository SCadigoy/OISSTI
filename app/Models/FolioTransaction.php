<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FolioTransaction extends Model
{
    protected $fillable = ['folio_id', 'type', 'amount', 'posted_by', 'posted_at', 'description', 'source_reference'];

    protected $casts = [
        'posted_at' => 'datetime',
        'source_reference' => 'array',
    ];

    public function folio(): BelongsTo
    {
        return $this->belongsTo(Folio::class);
    }

    public function postedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'posted_by');
    }
}
