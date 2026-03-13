<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    // Front & umum
    FrontController,
    RegistrationFormController,
    AttendanceController,
    ProgramLayananController,
    FaqController,
    VideoController,
    ArticleController,
    RegulationController,
    AboutController,

    // Auth & dashboard
    TwoFactorController,
    DashboardController,
    ProfileController,
    Auth\AuthenticatedSessionController,
    Auth\SocialiteController,

    // Admin area
    UserController,
    CategoryController,
    LandingPageController,
    PartnerController,
    TestimonialController,
    ProgramBatchController,
    VideoCategoryController,
    FaqCategoryController,
    ProgramLayananController as PLController
};
use App\Http\Controllers\Admin\{
    AboutTeamController,
    AboutProgramController,
    AboutSectionController
};

/* ----------------------------------------------------------
 | 🔓 PUBLIC ROUTES
 * ---------------------------------------------------------- */

Route::get('/', [FrontController::class, 'index'])->name('front.index');

Route::get('/pendaftaran/{slug}', [RegistrationFormController::class, 'showBySlug'])->name('registration.form.show');
Route::post('/pendaftaran/{slug}', [RegistrationFormController::class, 'store'])->name('registration.form.store');

Route::get('/attendance', [AttendanceController::class, 'index']);
Route::get('/search-participant', [AttendanceController::class, 'searchParticipant']);
Route::post('/attendance', [AttendanceController::class, 'store']);

Route::prefix('program-layanan')->name('program-layanan.')->group(function () {
    Route::get('/search', [FrontController::class, 'search'])->name('search');
    Route::get('/filter', [FrontController::class, 'filter'])->name('filter');
    Route::get('/{programLayanan:slug}', [FrontController::class, 'show_program'])->name('show');
    Route::post('/{programLayanan}/daftar', [FrontController::class, 'daftar'])->name('daftar')->middleware('auth');
});

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

/* ----------------------------------------------------------
 | 🔐 AUTH + 2FA
 * ---------------------------------------------------------- */
Route::middleware(['auth', 'verified'])->group(function () {

    // 2FA Setup & Verification
    Route::get('/2fa', [TwoFactorController::class, 'showForm'])->name('2fa.form');
    Route::post('/2fa', [TwoFactorController::class, 'verify'])->name('2fa.verify');

    Route::middleware('2fa')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        // Akses umum: edit & update
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

        // Hanya superAdmin yang bisa delete profile
        Route::middleware('role:superAdmin')->group(function () {
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        Route::prefix('admin')->name('admin.')->group(function () {

            // Dashboard akses umum untuk semua role admin
            Route::middleware('role:superAdmin|admin|author')->group(function () {
                Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            });

            // 🔐 superAdmin only
            Route::middleware('role:superAdmin')->group(function () {
                Route::resource('users', UserController::class);
                Route::patch('/users/{user}/enable-2fa', [UserController::class, 'enable2FA'])->name('users.enable2fa');
                Route::patch('/users/{user}/disable-2fa', [UserController::class, 'disable2FA'])->name('users.disable2fa');
                Route::get('/users/{user}/qr', [UserController::class, 'showQr'])->name('users.qr');

                Route::resource('categories', CategoryController::class)->except(['create', 'edit', 'show']);
                Route::post('/categories/update-order', [CategoryController::class, 'updateOrder'])->name('categories.updateOrder');

                Route::post('/tambah-sesi-manual', [ProgramLayananController::class, 'tambahSesiManual'])->name('sesi.tambah.manual');
                Route::get('/program-layanan/{program}/{batch}/detail', [ProgramBatchController::class, 'detail'])->name('program-layanan.detail');
                Route::resource('program-layanan', PLController::class);
                Route::get('/program-layanan/{program}/batch/create', [ProgramBatchController::class, 'create'])->name('program-layanan.batch.create');
                Route::post('/program-layanan/{program}/batch', [ProgramBatchController::class, 'store'])->name('program-layanan.batch.store');
                Route::get('/program-layanan/{program}/batch/{batch}/edit', [ProgramBatchController::class, 'edit'])->name('program-layanan.batch.edit');
                Route::put('/program-layanan/{program}/batch/{batch}', [ProgramBatchController::class, 'update'])->name('program-layanan.batch.update');
                Route::delete('/program-layanan/{program}/batch/{batch}', [ProgramBatchController::class, 'destroy'])->name('program-layanan.batch.destroy');

                Route::resource('testimonials', TestimonialController::class)->except(['create', 'edit', 'show']);
                Route::post('/testimonials/update-order', [TestimonialController::class, 'updateOrder'])->name('testimonials.updateOrder');

                Route::resource('regulations', RegulationController::class);

                Route::resource('videos', VideoController::class);
                Route::resource('video-categories', VideoCategoryController::class)->except(['create', 'edit', 'show']);
                Route::post('/videos-categories/update-order', [VideoCategoryController::class, 'updateOrder'])->name('video-categories.updateOrder');

                Route::resource('faqs', FaqController::class);
                Route::resource('faq-categories', FaqCategoryController::class)->except(['create', 'edit', 'show']);

                Route::resource('abouts', AboutController::class);
                Route::resource('about-sections', AboutSectionController::class)->except(['index']);
                Route::resource('about-teams', AboutTeamController::class)->except(['index']);
                Route::resource('about-programs', AboutProgramController::class)->except(['index']);
            });

            // 🔐 Routes yang bisa diakses oleh superAdmin|admin|author
            Route::middleware('role:superAdmin|admin|author')->group(function () {

                // Peserta Program
                Route::get('/participants', [AttendanceController::class, 'show'])->name('participants.show');

                // Rekap Presensi - Updated routes
                Route::get('/pilih-batch-presensi', [AttendanceController::class, 'pilihBatch'])->name('presensi.pilih');
                Route::get('/pilih-batch', [AttendanceController::class, 'pilihBatch'])->name('pilih-batch'); // Alias route
                Route::get('/rekap-presensi', [AttendanceController::class, 'rekap'])->name('rekap-presensi');

                // AJAX Routes untuk batch selection
                Route::get('/get-batches-by-program', [AttendanceController::class, 'getBatchesByProgram'])->name('get-batches-by-program');
                Route::get('/search-participant', [AttendanceController::class, 'searchParticipant'])->name('search-participant');
                Route::get('/statistik-batch', [AttendanceController::class, 'getStatistikBatch'])->name('statistik-batch');

                // Export Routes
                Route::get('/export-rekap', [AttendanceController::class, 'exportRekap'])->name('export-rekap');

                // Form Presensi
                Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
                Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
            });

            // 🔐 Routes khusus untuk superAdmin (admin utilities)
            Route::middleware('role:superAdmin')->group(function () {
                Route::post('/reset-presensi-harian', [AttendanceController::class, 'resetPresensiHarian'])->name('reset-presensi-harian');
            });


            // Mitra → superAdmin & admin
            Route::middleware('role:superAdmin|admin')->group(function () {
                Route::resource('partners', PartnerController::class)->except(['create', 'edit', 'show']);
                Route::post('/partners/update-order', [PartnerController::class, 'updateOrder'])->name('partners.updateOrder');
            });

            // Artikel → superAdmin & author
            Route::middleware('role:superAdmin|author|admin')->group(function () {
                Route::resource('articles', ArticleController::class);
                Route::post('/articles/{article}/toggle-featured', [ArticleController::class, 'toggleFeatured'])->name('articles.toggleFeatured');
                Route::post('/articles/{article}/toggle-status', [ArticleController::class, 'toggleStatus'])->name('articles.toggleStatus');
            });
        });

        // Optional: akses cepat artikel dari dashboard
        Route::middleware('role:superAdmin|author')->group(function () {
            Route::get('/articles-index', [DashboardController::class, 'article'])->name('article.index');
            Route::get('/articles-create', [DashboardController::class, 'article_create'])->name('article.create');
        });
    });
});

/* ----------------------------------------------------------
 | 🔐 GOOGLE SOCIAL LOGIN
 * ---------------------------------------------------------- */
Route::get('login/google', [SocialiteController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

/* ----------------------------------------------------------
 | 🔐 LOGIN LOGOUT (MODIFIED)
 * ---------------------------------------------------------- */
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

/* ----------------------------------------------------------
 | 🔐 DEFAULT AUTH ROUTES
 * ---------------------------------------------------------- */
require __DIR__ . '/auth.php';
