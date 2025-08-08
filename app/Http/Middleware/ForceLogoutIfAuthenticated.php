<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForceLogoutIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Kalau punya role tertentu, langsung arahkan ke dashboard masing-masing
            if ($user->hasRole('superAdmin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('author')) {
                return redirect()->route('article.index');
            }

            // Jika role tidak sesuai, paksa logout
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors([
                'email' => 'Akun Anda tidak memiliki akses.',
            ]);
        }

        return $next($request);
    }
}
