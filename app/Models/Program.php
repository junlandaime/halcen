<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'duration',
        'capacity',
        'price',
        'category',
        'image_url',
        'status'
    ];

    public function schedules()
    {
        return $this->hasMany(ProgramSchedule::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
