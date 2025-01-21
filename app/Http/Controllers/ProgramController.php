<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::with('schedules')->get();
        return view('programs.index', compact('programs'));
    }

    public function show($slug)
    {
        $program = Program::with(['schedules' => function($query) {
            $query->where('status', 'active')
                  ->where('start_date', '>', now())
                  ->orderBy('start_date');
        }])->where('slug', $slug)->firstOrFail();
        
        return view('programs.show', compact('program'));
    }

    public function register(Request $request, Program $program)
    {
        $validated = $request->validate([
            'program_schedule_id' => 'required|exists:program_schedules,id',
            'notes' => 'nullable|string'
        ]);

        $registration = $program->registrations()->create([
            'program_schedule_id' => $validated['program_schedule_id'],
            'user_id' => auth()->id(),
            'notes' => $validated['notes'] ?? null
        ]);

        return redirect()->route('registrations.show', $registration)
            ->with('success', 'Pendaftaran berhasil! Silakan lakukan pembayaran.');
    }
}
