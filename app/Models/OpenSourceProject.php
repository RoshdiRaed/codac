<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenSourceProject extends Model
{
    protected $fillable = [
        'title',
        'description',
        'github_url',
        'demo_url',
        'image',
        'stars_count',
    ];

}
