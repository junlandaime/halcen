<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [FrontController::class, 'index'])->name('front.index');
// Route::get('/rapihan', [FrontController::class, 'rapih'])->name('front.rapih');

Route::get('/kuliah-halal', [FrontController::class, 'kuliah'])->name('front.kuliah-halal');
Route::get('/juleha', [FrontController::class, 'juleha'])->name('front.juleha');
Route::get('/p3h', [FrontController::class, 'p3h'])->name('front.p3h');
Route::get('/sertifikasi', [FrontController::class, 'sertifikasi'])->name('front.sertifikasi');
Route::get('/ppk', [FrontController::class, 'ppk'])->name('front.ppk');

Route::get('/video', [FrontController::class, 'video'])->name('front.video');
Route::get('/article', [FrontController::class, 'article'])->name('front.article');
Route::get('/article-detail', [FrontController::class, 'article_detail'])->name('front.article-detail');
Route::get('/regulasi', [FrontController::class, 'regulasi'])->name('front.regulasi');

Route::get('/halcen', [FrontController::class, 'halcen'])->name('front.halcen');
Route::get('/lp3h', [FrontController::class, 'lp3h'])->name('front.lp3h');
Route::get('/lph', [FrontController::class, 'lph'])->name('front.lph');
Route::get('/salman', [FrontController::class, 'salman'])->name('front.salman');
// Route::get('/events/{event:slug}', [FrontController::class, 'details'])->name('front.details');

Route::get('/kontak', [FrontController::class, 'kontak'])->name('front.kontak');
// Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('front.category');

// Route::get('/features', [FrontController::class, 'features'])->name('front.features');

// Route::get('/informations', [FrontController::class, 'informations'])->name('front.informations');
// Route::get('/informations/{post:slug}', [FrontController::class, 'infomore'])->name('front.infomore');

// Route::get('/blogs', [FrontController::class, 'blogs'])->name('front.blogs');
// Route::get('/blogs/{post:slug}', [FrontController::class, 'readmore'])->name('front.readmore');


// Route::get('/about', [FrontController::class, 'about'])->name('front.about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
