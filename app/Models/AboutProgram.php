<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_id',
        'title',
        'description',
        'icon',
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
