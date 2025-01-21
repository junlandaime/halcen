<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'vision',
        'mission',
        'is_active',
        'order',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'mission' => 'array'
    ];

    public function sections()
    {
        return $this->hasMany(AboutSection::class);
    }

    public function teams()
    {
        return $this->hasMany(AboutTeam::class);
    }

    public function programs()
    {
        return $this->hasMany(AboutProgram::class);
    }
}
