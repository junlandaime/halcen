<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\Request;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        if ($user->two_factor_secret && !session('2fa_verified')) {
            return redirect()->route('2fa.form');
        }

        return redirect()->intended('/admin.dashboard');
    }
}
