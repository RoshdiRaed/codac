<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubTrack extends Model
{
    use HasFactory;

    protected $fillable = [
        'track_id', // 👈 أضف هذا
        'title',
        'description',
        'content',
        'icon',
    ];

    public function track()
    {
        return $this->belongsTo(Track::class);
    }
}
