<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_batch_id',
        'title',
        'slug',
        'jadwal_pertemuan',
        'narahubung',
        'is_active',
        'order',
        'link',
    ];

    public function programBatch()
    {
        return $this->belongsTo(ProgramBatch::class);
    }

}
