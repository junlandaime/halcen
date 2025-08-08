<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TwoFactorController extends Controller
{
    /**
     * Form OTP (menampilkan QR jika secret belum ada)
     */
    public function showForm()
    {
        $user      = Auth::user();
        $google2fa = new Google2FA();

        // kalau user belum punya secret → generate & simpan
        if (!$user->two_factor_secret) {
            $user->two_factor_secret = $google2fa->generateSecretKey(32);
            $user->save();
        }

        $qrUrl   = $google2fa->getQRCodeUrl(config('app.name'), $user->email, $user->two_factor_secret);
        $QR_Image = QrCode::size(200)->generate($qrUrl);

        return view('2fa.form', [   // views/auth/form.blade.php
            'QR_Image' => $QR_Image,
            'secret'   => $user->two_factor_secret,
        ]);
    }

    /**
     * Verifikasi kode OTP
     */
    public function verify(Request $request)
    {
        $request->validate(['one_time_password' => 'required|digits:6']);

        $google2fa = new Google2FA();
        $user      = Auth::user();

        if (
            $google2fa->verifyKey($user->two_factor_secret, $request->one_time_password)
        ) {
            session(['2fa_verified' => true]);

            // role-based redirect
            return $user->hasRole('superAdmin')
                ? redirect()->route('admin.dashboard')
                : redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['one_time_password' => 'Kode OTP salah.']);
    }
}
