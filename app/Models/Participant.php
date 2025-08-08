<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Participant extends Model
{
protected $fillable = [
    'nama', 'email', 'kelamin', 'usia', 'sapaan', 'wa',
    'alamat_ktp', 'provinsi', 'kota', 'kecamatan', 'kelurahan',
    'pendidikan', 'sekolah', 'pekerjaan', 'instansi',
    'info_dari', 'info_lainnya', 'pernah_mengikuti',
    'batch_lama', 'siap_mengikuti', 'syarat',
    'kategori', 'alamat_instansi',
];


    protected $casts = [
        'syarat' => 'boolean',
    ];

    public function batch(): BelongsTo
    {
        return $this->belongsTo(ProgramBatch::class);
    }

    public function programLayanan(): BelongsTo
    {
        return $this->belongsTo(\App\Models\ProgramLayanan::class);
    }

    public function attendances()
    {
        return $this->hasMany(\App\Models\Attendance::class);
    }
    public function attendance()
    {
    return $this->hasOne(\App\Models\Attendance::class);
    }

}
