<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProgramLayanan extends Model
{
    use HasFactory;

    protected $table = 'program_layanan';

    protected $fillable = [
        'nama_program',
        'nama_banner',
        'slug',
        'deskripsi',
        'deskripsi_lengkap',
        'tipe_kelas',
        'durasi',
        'materi',
        'manfaat',
        'persyaratan',
        'alur_proses',
        'gambar_banner'
    ];

    protected $casts = [
        'materi' => 'array',
        'manfaat' => 'array',
        'persyaratan' => 'array',
        'alur_proses' => 'array'
    ];

    public function batches()
    {
        return $this->hasMany(ProgramBatch::class, 'program_layanan_id');
    }

    public function getActiveBatch()
    {
        return $this->batches()
            ->where('status', 'aktif')
            ->where('tanggal_mulai_pendaftaran', '<=', Carbon::now())
            ->where('tanggal_selesai_pendaftaran', '>=', Carbon::now())
            ->first();
    }

    public function getUpcomingBatches()
    {
        return $this->batches()
            ->where('status', 'aktif')
            ->where('tanggal_mulai_pendaftaran', '>', Carbon::now())
            ->orderBy('tanggal_mulai_pendaftaran', 'asc')
            ->get();
    }
}
