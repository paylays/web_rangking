<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HasilSeleksiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SubKriteriaController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index']);

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria');
    
    Route::get('/sub-kriteria', [SubKriteriaController::class, 'index'])->name('sub-kriteria');
    
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::get('/siswa/template-download', [SiswaController::class, 'downloadTemplate'])->name('siswa.template-download');
    Route::post('/siswa/import', [SiswaController::class, 'importExcel'])->name('siswa.import');

    Route::get('/penilaian', [PenilaianController::class, 'konversiFuzzy'])->name('penilaian');
    
    Route::get('/hasil-seleksi', [HasilSeleksiController::class, 'perankingan'])->name('ranking');
});

Route::fallback(function () {
    abort(404);
});
