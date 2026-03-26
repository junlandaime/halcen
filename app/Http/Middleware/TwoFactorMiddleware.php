<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TwoFactorMiddleware
{
    public function handle($request, Closure $next)
    {

        // Jika 2FA dinonaktifkan secara global, langsung lewati
        if (!config('services.2fa.enabled', true)) {
            return $next($request);
        }

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->two_factor_secret && !session('2fa_verified')) {
            return redirect()->route('2fa.form');
        }

        return $next($request);
    }
}
