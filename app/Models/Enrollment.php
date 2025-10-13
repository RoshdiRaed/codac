<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enrollment extends Model
{
    protected $fillable = [
        'user_id',
        'track_id',
        'status', // مثلا: 'in_progress', 'completed'
    ];

    public function track(): BelongsTo
    {
        return $this->belongsTo(Track::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
