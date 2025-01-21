<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_id',
        'name',
        'position',
        'image',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
