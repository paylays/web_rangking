<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubKriteriaController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index']);

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria');
    
    Route::get('/sub-kriteria', [SubKriteriaController::class, 'index'])->name('sub-kriteria');
});

Route::fallback(function () {
    abort(404);
});
