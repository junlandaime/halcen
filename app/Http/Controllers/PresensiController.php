<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Presensi;

class PresensiController extends Controller
{
    public function index()
    {
    $participants = Participant::select('id', 'nama', 'batch')->get();
        return view('presensi.index', compact('participants'));
    }


    public function search(Request $request)
    {
        $search = $request->get('q');

        if (strlen($search) < 3) {
            return response()->json([]);
        }

        $results = Participant::where('nama', 'like', "%{$search}%")
            ->select('id', 'nama', 'batch')
            ->get();

        return response()->json($results);
    }

    public function store(Request $request)
    {
        $request->validate([
            'participant_id' => 'required|exists:participants,id',
        ]);

        Presensi::create([
            'participant_id' => $request->participant_id,
        ]);

        return redirect('/presensi')->with('success', 'Presensi berhasil dicatat!');
    }
}

