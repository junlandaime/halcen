<?php

namespace App\Providers;

use App\Models\About;
use App\Models\LandingPage;
use App\Models\ProgramLayanan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewInstance;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Make sure to use the correct view path
        View::composer('layouts.header', function (ViewInstance $view) {
            $programs = ProgramLayanan::query()
                ->where('status', 'aktif')
                ->orderBy('id', 'asc')
                ->get();

            $abouts = About::query()
                ->where('is_active', true)
                ->orderBy('order', 'asc')
                ->get();


            $view->with([
                'headerPrograms' => $programs,
                'headerAbouts' => $abouts,

            ]);
        });

        View::composer('layouts.footer', function (ViewInstance $view) {
            $landingpage = LandingPage::firstOrFail();
            $programs = ProgramLayanan::query()
                ->where('status', 'aktif')
                ->orderBy('id', 'asc')
                ->get();

            $view->with([
                'footerLandingPage' => $landingpage,
                'footerPrograms' => $programs
            ]);
        });

        View::composer('layouts.front', function (ViewInstance $view) {
            $landingpage = LandingPage::firstOrFail();

            $view->with([
                'frontLandingPage' => $landingpage
            ]);
        });
    }
}
