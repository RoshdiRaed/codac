<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DevTool extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description',
        'order',
        'link',
    ];
}
