<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [
        'title',
        'category',
        'icon',
        'description',
        'content', // <-- أضف هذا
    ];

    public function subTracks()
{
    return $this->hasMany(SubTrack::class);
}

}
