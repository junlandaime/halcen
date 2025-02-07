<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LPH\LPHController;

Route::get('/', [LPHController::class, 'index'])->name('lph.index');
Route::get('/service', [LPHController::class, 'service'])->name('lph.service');
Route::get('/about', [LPHController::class, 'about'])->name('lph.about');
