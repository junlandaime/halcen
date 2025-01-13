<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return view('admin.dashboard');
    }

    public function article()
    {

        return view('admin.articles.index');
    }

    public function media()
    {

        return view('admin.media.index');
    }

    public function program()
    {

        return view('admin.programs.index');
    }

    public function certifications()
    {

        return view('admin.certification.index');
    }

    public function clients()
    {

        return view('admin.clients.index');
    }
    public function laboratory()
    {

        return view('admin.laboratory.index');
    }




    public function messages()
    {

        return view('admin.messages.index');
    }
    public function reports()
    {

        return view('admin.reports.index');
    }
    public function settings()
    {

        return view('admin.settings.index');
    }
}
