<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTwoFactorCodeIsVerified
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->google2fa_secret) {
            if (!session('2fa_verified')) {
                return redirect()->route('2fa.form')->with('error', 'Silakan verifikasi kode 2FA terlebih dahulu.');
            }
        }

        return $next($request);
    }
}
