<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    protected $fillable = [
        'participant_id',
        'presensi_pagi',
        'presensi_siang',
        // 'tanggal', // optional, kalau kamu simpan tanggalnya manual
    ];

    public function participant(): BelongsTo
    {
        return $this->belongsTo(Participant::class);
    }
}
