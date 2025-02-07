<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegulationController;
use App\Http\Controllers\FaqCategoryController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ProgramBatchController;
use App\Http\Controllers\VideoCategoryController;
use App\Http\Controllers\ProgramLayananController;
use App\Http\Controllers\Admin\AboutTeamController;
use App\Http\Controllers\Admin\AboutProgramController;
use App\Http\Controllers\Admin\AboutSectionController;

// Route::get('/', function () {
//     return 'First sub domain';
// })->domain('blog.' . env('APP_URL'));

Route::domain(env('APP_URL'))->group(function () {
    Route::get('/welcome', function () {
        return view('welcome');
    });

    Route::get('/', [FrontController::class, 'index'])->name('front.index');

    // Front-end routes
    Route::prefix('program-layanan')->name('program-layanan.')->group(function () {
        // Route::get('/', [FrontController::class, 'index_program'])->name('index');
        Route::get('/search', [FrontController::class, 'search'])->name('search');
        Route::get('/filter', [FrontController::class, 'filter'])->name('filter');
        Route::get('/{programLayanan:slug}', [FrontController::class, 'show_program'])->name('show');
        Route::post('/{programLayanan}/daftar', [FrontController::class, 'daftar'])
            ->name('daftar')
            ->middleware(['auth']);
    });

    // Article Routes
    Route::prefix('articles')->name('articles.')->group(function () {
        Route::get('/', [FrontController::class, 'article'])->name('index');
        Route::get('/{article:slug}', [FrontController::class, 'showArticle'])->name('show');
        Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('category');
    });

    Route::get('/regulasi', [FrontController::class, 'index_regulasi'])->name('regulations.index');
    Route::get('/regulasi/{regulation}', [FrontController::class, 'show_regulasi'])->name('regulations.show');

    Route::get('/video', [FrontController::class, 'index_video'])->name('videos.index');
    Route::get('/video/{video}', [FrontController::class, 'show_video'])->name('videos.show');

    Route::get('/tentang', [FrontController::class, 'index_about'])->name('abouts.index');
    Route::get('/tentang/{about:slug}', [FrontController::class, 'show_about'])->name('abouts.show');


    Route::get('/kontak', [FrontController::class, 'kontak'])->name('front.kontak');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/articles-index', [DashboardController::class, 'article'])->middleware(['auth', 'verified'])->name('article.index')->middleware('role:superAdmin|author');
    Route::get('/articles-create', [DashboardController::class, 'article_create'])->middleware(['auth', 'verified'])->name('article.create')->middleware('role:superAdmin|author');
    // Route::post('/articles', [ArticleController::class, 'store'])->middleware(['auth', 'verified'])->name('admin.articles.store');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::prefix('admin')->name('admin.')->group(function () {
            // Dashboard
            Route::middleware('role:superAdmin')->group(function () {
                Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

                // Landing Page Management
                Route::get('/landing-page/edit', [LandingPageController::class, 'edit'])->name('landing-page.edit');
                Route::put('/landing-page/update', [LandingPageController::class, 'update'])->name('landing-page.update');

                // Category Management
                Route::resource('categories', CategoryController::class)->except(['create', 'edit', 'show']);
                Route::post('/categories/update-order', [CategoryController::class, 'updateOrder'])->name('categories.updateOrder');

                Route::resource('program-layanan', ProgramLayananController::class);
                Route::get('/program-layanan/{program}/batch/create', [ProgramBatchController::class, 'create'])->name('program-layanan.batch.create');
                Route::post('/program-layanan/{program}/batch', [ProgramBatchController::class, 'store'])->name('program-layanan.batch.store');
                Route::get('/program-layanan/{program}/batch/{batch}/edit', [ProgramBatchController::class, 'edit'])->name('program-layanan.batch.edit');
                Route::put('/program-layanan/{program}/batch/{batch}', [ProgramBatchController::class, 'update'])->name('program-layanan.batch.update');
                Route::delete('/program-layanan/{program}/batch/{batch}', [ProgramBatchController::class, 'destroy'])->name('program-layanan.batch.destroy');

                // Partner Management
                Route::resource('partners', PartnerController::class)->except(['create', 'edit', 'show']);
                Route::post('/partners/update-order', [PartnerController::class, 'updateOrder'])->name('partners.updateOrder');

                // Testimonial Management
                Route::resource('testimonials', TestimonialController::class)->except(['create', 'edit', 'show']);
                Route::post('/testimonials/update-order', [TestimonialController::class, 'updateOrder'])->name('testimonials.updateOrder');


                Route::resource('regulations', RegulationController::class);
                Route::resource('videos', VideoController::class);
                Route::resource('video-categories', VideoCategoryController::class)->except(['create', 'edit', 'show']);
                Route::post('/videos-categories/update-order', [VideoCategoryController::class, 'updateOrder'])->name('video-categories.updateOrder');

                Route::resource('faqs', FaqController::class);
                Route::resource('faq-categories', FaqCategoryController::class)->except(['create', 'edit', 'show']);
                Route::resource('abouts', AboutController::class);
                // About Sections
                Route::resource('about-sections', AboutSectionController::class)->except(['index']);

                // About Teams
                Route::resource('about-teams', AboutTeamController::class)->except(['index']);

                // About Programs
                Route::resource('about-programs', AboutProgramController::class)->except(['index']);

                Route::resource('users', UserController::class);
            });


            Route::middleware('role:superAdmin|author')->group(function () {
                // Article Management
                Route::resource('articles', ArticleController::class);
                Route::post('/articles/{article}/toggle-featured', [ArticleController::class, 'toggleFeatured'])->name('articles.toggleFeatured');
                Route::post('/articles/{article}/toggle-status', [ArticleController::class, 'toggleStatus'])->name('articles.toggleStatus');
                Route::post('/articles/update-order', [ArticleController::class, 'updateOrder'])->name('articles.updateOrder');
            });
        });

        // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

    // ->middleware('role:superAdmin|author')
    // ->names('candidates');

    // Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/settings', [DashboardController::class, 'settings'])->name('admin.settings');

    require __DIR__ . '/auth.php';
});
