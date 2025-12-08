<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WargaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rute yang bisa diakses publik (tanpa perlu login)
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Web Routes yang Dilindungi
|--------------------------------------------------------------------------
|
| Semua rute di dalam grup ini WAJIB login.
| Jika belum login, akan otomatis diarahkan ke halaman login.
|
*/

Route::middleware([
    'auth:sanctum',       // Middleware otentikasi Jetstream
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('dashboard', WargaController::class);
    Route::resource('data-warga', WargaController::class);
    Route::get('/warga', function () {
        return view('warga.index');
    })->name('warga');
});

Route::get('peta-saya', function () {
    return view('peta');
});
