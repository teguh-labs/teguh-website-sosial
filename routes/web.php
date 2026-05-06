<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController; // Tambahkan ini di atas
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // 1. Ambil semua laporan milik user yang lagi login, urutkan dari yang paling baru
    $laporanKu = App\Models\Report::where('user_id', Auth::id())->latest()->get();

    // 2. Bawa datanya ke tampilan (view) dashboard
    return view('dashboard', ['laporan' => $laporanKu]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::post('/lapor', [ReportController::class, 'store'])->name('lapor.store');

    // (Bawahnya biarin rute profile bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
