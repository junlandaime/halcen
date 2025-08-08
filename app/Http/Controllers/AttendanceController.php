<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Models\ProgramBatch;
use App\Models\ProgramLayanan;
use Illuminate\Support\Facades\Cache;

class AttendanceController extends Controller
{
    // Form presensi peserta
public function index()
{
    $programLayanan = ProgramLayanan::orderBy('nama_program')->get();
    return view('admin.attendance.show', compact('programLayanan'));
}


    // Simpan presensi
    public function store(Request $request)
    {
        $request->validate([
            'participant_id' => 'required|exists:participants,id',
        ]);

        $now = now();
        $currentMinutes = $now->hour * 60 + $now->minute;
        $participantId = $request->participant_id;

        $pagiStart = 14 * 60 + 12;     // 14:12
        $pagiEnd = 14 * 60 + 30;       // 14:30
        $siangStart = 15 * 60;         // 15:00
        $siangEnd = 15 * 60 + 50;      // 15:50

        $dateKey = now()->toDateString();
        $pagiKey = "presensi_pagi_{$participantId}_{$dateKey}";
        $siangKey = "presensi_siang_{$participantId}_{$dateKey}";

        $attendance = Attendance::firstOrCreate(
            ['participant_id' => $participantId],
            ['presensi_pagi' => 0, 'presensi_siang' => 0]
        );

        if ($currentMinutes >= $pagiStart && $currentMinutes <= $pagiEnd) {
            if (!Cache::has($pagiKey)) {
                $attendance->increment('presensi_pagi');
                Cache::put($pagiKey, true, now()->addDay());
                return back()->with('success', 'Presensi pagi berhasil.');
            }
            return back()->with('error', 'Sudah presensi pagi.');
        }

        if ($currentMinutes >= $siangStart && $currentMinutes <= $siangEnd) {
            if (!Cache::has($siangKey)) {
                $attendance->increment('presensi_siang');
                Cache::put($siangKey, true, now()->addDay());
                return back()->with('success', 'Presensi siang berhasil.');
            }
            return back()->with('error', 'Sudah presensi siang.');
        }

        return back()->with('error', 'Di luar jam presensi.');
    }

    // Rekap presensi admin
    public function rekap(Request $request)
    {
        $batchId = $request->query('batch');
        $programLayananId = $request->query('program_layanan');

        // Validasi jika batch_id tidak ada
        if (!$batchId) {
            return redirect()->route('admin.pilih-batch')
                ->with('error', 'Silakan pilih batch terlebih dahulu.');
        }

        // Ambil informasi batch beserta program layanan
        $batch = ProgramBatch::with('programLayanan')->find($batchId);

        if (!$batch) {
            return redirect()->route('admin.pilih-batch')
                ->with('error', 'Batch tidak ditemukan.');
        }

        $participants = Participant::with('attendance')
            ->where('batch_id', $batchId)
            ->orderBy('nama', 'asc')
            ->get();

        // Hitung statistik presensi
        foreach ($participants as $p) {
            $p->presensi_pagi = $p->attendance->presensi_pagi ?? 0;
            $p->presensi_siang = $p->attendance->presensi_siang ?? 0;
            $totalSesi = 14;
            $totalHadir = $p->presensi_pagi + $p->presensi_siang;
            $p->persentase = round(($totalHadir / ($totalSesi * 2)) * 100, 2);
            $p->keterangan = $p->persentase >= 70 ? 'Lulus' : 'Tidak Lulus';
        }

        // Statistik keseluruhan
        $totalParticipants = $participants->count();
        $lulusCount = $participants->where('keterangan', 'Lulus')->count();
        $tidakLulusCount = $totalParticipants - $lulusCount;
        $avgPersentase = $participants->avg('persentase');

        $statistics = [
            'total_participants' => $totalParticipants,
            'lulus_count' => $lulusCount,
            'tidak_lulus_count' => $tidakLulusCount,
            'avg_persentase' => round($avgPersentase, 2),
            'lulus_percentage' => $totalParticipants > 0 ? round(($lulusCount / $totalParticipants) * 100, 2) : 0
        ];

        return view('admin.attendance.index', compact('participants', 'batch', 'statistics'));
    }

    // Autocomplete search peserta
    public function searchParticipant(Request $request)
    {
        $q = $request->query('q');

        $participants = Participant::with(['batch.programLayanan'])
            ->where('nama', 'like', "%$q%")
            ->take(10)
            ->get();

        $result = $participants->map(function ($p) {
            return [
                'id' => $p->id,
                'nama' => $p->nama,
                'batch' => $p->batch ? $p->batch->nama_batch : 'Batch tidak diketahui',
                'program' => $p->batch && $p->batch->programLayanan ? $p->batch->programLayanan->nama_program : 'Program tidak diketahui',
            ];
        });

        return response()->json($result);
    }

    // Daftar peserta
    public function show()
    {
        $participants = Participant::with(['batch.programLayanan'])->get();
        return view('admin.participants.index', compact('participants'));
    }

    // Pilih batch dengan filter program layanan
    public function pilihBatch()
    {
        // Ambil semua program layanan beserta batch-nya
        $programLayanan = ProgramLayanan::with(['batches' => function($query) {
            $query->orderBy('batch_ke', 'asc');
        }])
        ->whereHas('batches') // Hanya ambil program yang memiliki batch
        ->orderBy('nama_program', 'asc')
        ->get();

        // Untuk backward compatibility, ambil semua batch juga
        $batches = ProgramBatch::with('programLayanan')
                    ->orderBy('nama_batch')
                    ->get();

        return view('admin.attendance.batch_select', compact('programLayanan', 'batches'));
    }

    // Method untuk mendapatkan batch berdasarkan program layanan (AJAX)
    public function getBatchesByProgram(Request $request)
    {
        try {
            $programId = $request->get('program_id');

            if (!$programId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Program ID is required'
                ], 400);
            }

            $batches = ProgramBatch::where('program_layanan_id', $programId)
                        ->orderBy('batch_ke', 'asc')
                        ->get(['id', 'nama_batch', 'batch_ke']);

            return response()->json([
                'success' => true,
                'batches' => $batches,
                'count' => $batches->count()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data batch',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Method untuk export rekap presensi ke Excel/PDF (opsional)
    public function exportRekap(Request $request)
    {
        $batchId = $request->query('batch');
        $format = $request->query('format', 'excel'); // excel atau pdf

        if (!$batchId) {
            return redirect()->back()->with('error', 'Batch ID tidak ditemukan.');
        }

        $batch = ProgramBatch::with('programLayanan')->find($batchId);

        if (!$batch) {
            return redirect()->back()->with('error', 'Batch tidak ditemukan.');
        }

        $participants = Participant::with('attendance')
            ->where('batch_id', $batchId)
            ->orderBy('nama', 'asc')
            ->get();

        foreach ($participants as $p) {
            $p->presensi_pagi = $p->attendance->presensi_pagi ?? 0;
            $p->presensi_siang = $p->attendance->presensi_siang ?? 0;
            $totalSesi = 14;
            $totalHadir = $p->presensi_pagi + $p->presensi_siang;
            $p->persentase = round(($totalHadir / ($totalSesi * 2)) * 100, 2);
            $p->keterangan = $p->persentase >= 70 ? 'Lulus' : 'Tidak Lulus';
        }

        if ($format === 'pdf') {
            // Implementasi export PDF
            // return $this->exportToPDF($participants, $batch);
        }

        // Default: Export to Excel
        // return $this->exportToExcel($participants, $batch);

        // Sementara return view untuk development
        return view('admin.attendance.export', compact('participants', 'batch'));
    }

    // Method untuk reset presensi harian (untuk testing/admin)
    public function resetPresensiHarian(Request $request)
    {
        $request->validate([
            'batch_id' => 'required|exists:program_batches,id',
            'date' => 'required|date'
        ]);

        $batchId = $request->batch_id;
        $date = $request->date;

        // Hapus cache presensi untuk tanggal tersebut
        $participants = Participant::where('batch_id', $batchId)->get();

        foreach ($participants as $participant) {
            $pagiKey = "presensi_pagi_{$participant->id}_{$date}";
            $siangKey = "presensi_siang_{$participant->id}_{$date}";

            Cache::forget($pagiKey);
            Cache::forget($siangKey);
        }

        return response()->json([
            'success' => true,
            'message' => 'Cache presensi berhasil direset untuk tanggal ' . $date
        ]);
    }

    // Method untuk mendapatkan statistik presensi per batch
    public function getStatistikBatch(Request $request)
    {
        $batchId = $request->query('batch_id');

        if (!$batchId) {
            return response()->json(['error' => 'Batch ID required'], 400);
        }

        $participants = Participant::with('attendance')
            ->where('batch_id', $batchId)
            ->get();

        $stats = [
            'total_participants' => $participants->count(),
            'hadir_pagi_hari_ini' => 0,
            'hadir_siang_hari_ini' => 0,
            'rata_rata_kehadiran' => 0
        ];

        $today = now()->toDateString();
        $totalPersentase = 0;

        foreach ($participants as $participant) {
            $pagiKey = "presensi_pagi_{$participant->id}_{$today}";
            $siangKey = "presensi_siang_{$participant->id}_{$today}";

            if (Cache::has($pagiKey)) {
                $stats['hadir_pagi_hari_ini']++;
            }

            if (Cache::has($siangKey)) {
                $stats['hadir_siang_hari_ini']++;
            }

            // Hitung persentase kehadiran
            $presensiPagi = $participant->attendance->presensi_pagi ?? 0;
            $presensiSiang = $participant->attendance->presensi_siang ?? 0;
            $totalHadir = $presensiPagi + $presensiSiang;
            $persentase = round(($totalHadir / (14 * 2)) * 100, 2);
            $totalPersentase += $persentase;
        }

        $stats['rata_rata_kehadiran'] = $participants->count() > 0
            ? round($totalPersentase / $participants->count(), 2)
            : 0;

        return response()->json($stats);
    }
}
