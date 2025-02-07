<?php

namespace App\Http\Controllers\LPH;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LPHController extends Controller
{
    public function index()
    {
        return view('lph.home');
    }

    public function service()
    {
        return view('lph.service');
    }

    public function about()
    {
        return view('lph.about');
    }
}
