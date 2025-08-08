<?php

namespace App\Imports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;

class ParticipantsImport implements OnEachRow, WithHeadingRow
{
    protected $program_layanan_id;
    protected $batch_id;

    public function __construct($program_layanan_id, $batch_id = null)
    {
        $this->program_layanan_id = $program_layanan_id;
        $this->batch_id = $batch_id;
    }

   public function onRow(Row $row)
    {
        $rowNumber = $row->getIndex();
        $row = $row->toArray();

        // Tentukan batch
        if ($rowNumber >= 2 && $rowNumber <= 295) {
            $batchId = 1;
        } elseif ($rowNumber >= 296 && $rowNumber <= 926) {
            $batchId = 2;
        } else {
            $batchId = null;
        }

        // Bersihkan WA dan Email
        $wa = ltrim($row['wa'], '0');
        $email = strtolower(trim($row['email']));

        // ✅ Cek duplikat WA + batch
        $waExists = Participant::where('wa', $wa)
            ->where('batch_id', $batchId)
            ->exists();

        // ✅ Cek duplikat email
        $emailExists = Participant::where('email', $email)
            ->exists();

        // ❌ Skip jika salah satu duplikat
        if ($waExists || $emailExists) {
            return;
        }

        // Bersihkan dan proses data seperti biasa
        $kelamin = strtolower($row['kelamin'] ?? $row['jenis_kelamin']);
        $kelamin = $kelamin === 'laki-laki' || $kelamin === 'pria' ? 'pria' : 'wanita';
        $pernah = strtolower(trim($row['pernah_mengikuti'] ?? 'tidak')) === 'ya' ? 'Ya' : 'Tidak';
        $siap = $this->normalizeSiapMengikuti($row['siap_mengikuti'] ?? '');

        // Simpan ke database
        Participant::create([
            'email'              => $row['email'],
            'program_layanan_id' => $this->program_layanan_id,
            'batch_id'           => $batchId,
            'nama'               => $row['nama'],
            'kelamin'            => $kelamin,
            'usia'               => (int) $row['usia'],
            'sapaan'             => $row['sapaan'] ?? null,
            'wa'                 => ltrim($row['wa'], '0'),
            'alamat_ktp'         => $row['alamat_ktp'] ?? null,
            'provinsi'           => $row['provinsi'] ?? null,
            'kota'               => $row['kota'] ?? null,
            'kecamatan'          => null,
            'kelurahan'          => null,
            'pendidikan'         => $row['pendidikan'] ?? null,
            'sekolah'            => $row['sekolah'] ?? null,
            'pekerjaan'          => $row['pekerjaan'] ?? null,
            'instansi'           => $row['instansi'] ?? null,
            'info_dari'          => $row['info_dari'] ?? null,
            'info_lainnya'       => null,
            'pernah_mengikuti'   => $pernah,
            'batch_lama'         => null,
            'siap_mengikuti'     => $siap,
            'syarat'             => false,
        ]);
    }

    /**
     * Fungsi bantu untuk normalisasi nilai enum siap_mengikuti
     */
    private function normalizeSiapMengikuti(string $value): ?string
    {
        $value = strtolower($value);

        if (str_contains($value, 'hadir') || str_contains($value, 'semua')) {
            return 'Ya';
        }

        if (str_contains($value, 'usahakan') || str_contains($value, 'insya')) {
            return 'Insyaallah diusahakan';
        }

        return null;
    }
}
