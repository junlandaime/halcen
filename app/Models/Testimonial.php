<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use SoftDeletes;

    // protected $fillable = [
    //     'name',
    //     'position',
    //     'company',
    //     'content',
    //     'image',
    //     'rating',
    //     'is_featured',
    //     'order'
    // ];

    // protected $casts = [
    //     'rating' => 'integer',
    //     'is_featured' => 'boolean'
    // ];

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
