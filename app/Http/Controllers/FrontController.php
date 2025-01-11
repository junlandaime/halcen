<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {

        return view('front.index');
    }

    public function kuliah()
    {

        return view('front.kuliah-halal');
    }

    public function juleha()
    {

        return view('front.juleha');
    }

    public function p3h()
    {

        return view('front.p3h');
    }

    public function sertifikasi()
    {

        return view('front.sertifikasi');
    }

    public function ppk()
    {

        return view('front.ppk');
    }


    public function video()
    {

        return view('front.video');
    }

    public function article()
    {

        return view('front.article');
    }

    public function article_detail()
    {

        return view('front.article-detail');
    }

    public function regulasi()
    {

        return view('front.regulasi');
    }




    public function halcen()
    {

        return view('front.halcen');
    }

    public function lp3h()
    {

        return view('front.lp3h');
    }

    public function lph()
    {

        return view('front.lph');
    }

    public function salman()
    {

        return view('front.salman');
    }




    public function kontak()
    {

        return view('front.kontak');
    }
}
