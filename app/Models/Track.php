<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use app\Models\Enrollment;

class Track extends Model
{
    protected $fillable = [
        'title',
        'category',
        'icon',
        'description',
        'content',
    ];

    // علاقة الوحدات الفرعية
    public function subTracks(): HasMany
    {
        return $this->hasMany(SubTrack::class);
    }

    // علاقة التسجيلات
    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    // علاقة التسجيلات المكتملة
    public function completedEnrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class)->where('status', 'completed');
    }

    // علاقة التقييمات
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
