<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'position',
        'company',
        'content',
        'image',
        'rating',
        'is_featured',
        'order'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'rating' => 'integer',
        'order' => 'integer'
    ];
}
