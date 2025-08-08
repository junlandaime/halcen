<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan form login.
     */
    public function create(Request $request)
{
    if (Auth::check()) {
        $user = Auth::user();

        // Jika user sudah login & mencoba akses halaman login
        // kita paksa logout
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->withErrors([
            'email' => 'Anda telah logout secara otomatis.',
        ]);
    }

    return view('auth.login');
}


    /**
     * Tangani request login.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'Email atau password salah.',
            ]);
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // Cek role & redirect sesuai hak akses
if ($user->hasAnyRole(['superAdmin', 'admin', 'author'])) {
    return redirect()->route('admin.dashboard');
}


        // Role tidak valid: logout paksa
        Auth::logout();
        return redirect()->route('login')->withErrors([
            'email' => 'Akun Anda tidak memiliki hak akses.',
        ]);
    }

    /**
     * Logout user.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
