<?php

namespace App\Imports;

use App\Models\Attendance;
use App\Models\Participant;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AttendanceImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            // Skip header jika masih kebaca
            if ($index < 1) continue;

            $email = trim($row[1]); // kolom B
            $wa = preg_replace('/\D/', '', $row[2]); // kolom C (WA), dibersihkan

            $participant = Participant::where('email', $email)
                ->orWhere('wa', 'like', '%' . $wa . '%')
                ->first();

            if (!$participant) continue;

            $presensiPagi = 0;
            $presensiSiang = 0;

            // Mulai dari kolom D (index 3), tiap 2 kolom: pagi, siang
            for ($i = 3; $i < count($row); $i += 2) {
    $pagi = intval($row[$i]);
    $siang = isset($row[$i + 1]) ? intval($row[$i + 1]) : 0;

    // Pastikan hanya 0 atau 1 yang dihitung
    $presensiPagi += ($pagi === 1 || $pagi === 0) ? $pagi : 0;
    $presensiSiang += ($siang === 1 || $siang === 0) ? $siang : 0;
}


            Attendance::updateOrCreate(
                ['participant_id' => $participant->id],
                [
                    'presensi_pagi' => $presensiPagi,
                    'presensi_siang' => $presensiSiang
                ]
            );
        }
    }
}
