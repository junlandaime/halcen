<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'youtube_id',
        'duration',
        'video_category_id',
        'is_active',
        'order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'duration' => 'integer'
    ];

    public function category()
    {
        return $this->belongsTo(VideoCategory::class, 'video_category_id');
    }

    public function getYoutubeUrlAttribute()
    {
        return "https://www.youtube.com/embed/{$this->youtube_id}";
    }

    public function getDurationForHumansAttribute()
    {
        return "{$this->duration} menit";
    }
}
