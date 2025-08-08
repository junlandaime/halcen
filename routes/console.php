<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\ProgramBatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    $now = Carbon::now();

    if ($now->isFriday() && $now->format('H:i') === '08:00') {
        $updated = ProgramBatch::whereDate('tanggal_mulai_program', '<=', $now)
            ->where('status', 'aktif')
            ->where('Sesi', '<=', 15)
            ->update([
                'Sesi' => DB::raw('Sesi + 1')
            ]);

        \Log::info("Berhasil update sesi pada $updated batch.");
    } else {
        \Log::info("Lewatkan. Hari ini bukan Jumat Jam 08:00.");
    }
})->everyMinute();
