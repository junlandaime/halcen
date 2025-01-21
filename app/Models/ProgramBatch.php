<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgramBatch extends Model
{
    protected $table = 'program_batch';

    protected $fillable = [
        'program_layanan_id',
        'nama_batch',
        'batch_ke',
        'tanggal_mulai_pendaftaran',
        'tanggal_selesai_pendaftaran',
        'tanggal_mulai_program',
        'tanggal_selesai_program',
        'kuota',
        'harga',
        'status',
        'external_link',
        'catatan_batch'
    ];

    protected $casts = [
        'tanggal_mulai_pendaftaran' => 'date',
        'tanggal_selesai_pendaftaran' => 'date',
        'tanggal_mulai_program' => 'date',
        'tanggal_selesai_program' => 'date',
    ];

    public function programLayanan(): BelongsTo
    {
        return $this->belongsTo(ProgramLayanan::class, 'program_layanan_id');
    }

    public function isOpenForRegistration(): bool
    {
        $now = now();
        return $this->status === 'aktif' &&
            $now->between($this->tanggal_mulai_pendaftaran, $this->tanggal_selesai_pendaftaran);
    }

    public function getStatusPendaftaranAttribute(): string
    {
        if ($this->status !== 'aktif') {
            return 'Tidak Aktif';
        }

        $now = now();
        if ($now->lt($this->tanggal_mulai_pendaftaran)) {
            return 'Akan Dibuka';
        } elseif ($now->between($this->tanggal_mulai_pendaftaran, $this->tanggal_selesai_pendaftaran)) {
            return 'Sedang Dibuka';
        } else {
            return 'Sudah Ditutup';
        }
    }
}
