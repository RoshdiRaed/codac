<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'link',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Optional: Add accessor for full image URL
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }
        
        return Storage::url($this->image);
    }

    // Optional: Delete old image when updating
    protected static function booted()
    {
        static::updating(function ($community) {
            if ($community->isDirty('image') && $community->getOriginal('image')) {
                Storage::disk('public')->delete($community->getOriginal('image'));
            }
        });

        static::deleting(function ($community) {
            if ($community->image) {
                Storage::disk('public')->delete($community->image);
            }
        });
    }
}