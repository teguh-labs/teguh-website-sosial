<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $laporanKu = App\Models\Report::where('user_id', Auth::id())->latest()->get();
    return view('dashboard', ['laporan' => $laporanKu]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute Halaman Informasi untuk Warga
Route::get('/informasi', function () {
    $infoAdmin = App\Models\Pengumuman::latest()->get();
    return view('informasi', ['pengumuman' => $infoAdmin]);
})->middleware(['auth', 'verified'])->name('informasi');


Route::middleware('auth')->group(function () {
    Route::post('/lapor', [ReportController::class, 'store'])->name('lapor.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// =====================================
// RUTE KHUSUS ADMIN
// =====================================
Route::middleware(['auth'])->group(function () {

    // 1. Halaman Dashboard Admin
    Route::get('/admin/dashboard', function () {
        if (Auth::user()->email !== 'teguhp@admin.com') { // Ganti pakai email admin lo
            abort(403, 'Lo bukan admin, Bro! Balik ke dashboard sana.');
        }

        $semuaLaporan = App\Models\Report::with('user')->latest()->get();

        // NARIK DATA PENGUMUMAN BUAT ADMIN
        $semuaPengumuman = App\Models\Pengumuman::latest()->get();

        return view('admin.index', [
            'laporan' => $semuaLaporan,
            'pengumuman' => $semuaPengumuman // Dikirim ke view admin
        ]);
    })->name('admin.dashboard');

    // 2. Update Status Laporan Warga
    Route::patch('/admin/laporan/{id}/update', function ($id) {
        $laporan = App\Models\Report::findOrFail($id);
        $laporan->update(['status' => request('status')]);
        return redirect()->back()->with('pesan', 'Status laporan berhasil diupdate!');
    })->name('admin.update');

    // 3. Tambah Pengumuman Baru
    Route::post('/admin/pengumuman', function () {
        request()->validate([
            'judul' => 'required',
            'isi_informasi' => 'required'
        ]);

        App\Models\Pengumuman::create([
            'judul' => request('judul'),
            'isi_informasi' => request('isi_informasi'),
        ]);

        return redirect()->back()->with('pesan', 'Pengumuman berhasil disebar!');
    })->name('admin.pengumuman.store');

    // 4. HAPUS PENGUMUMAN (RUTE BARU)
    Route::delete('/admin/pengumuman/{id}', function ($id) {
        App\Models\Pengumuman::findOrFail($id)->delete();
        return redirect()->back()->with('pesan', 'Pengumuman berhasil dihapus dari sistem!');
    })->name('admin.pengumuman.destroy');

});

Route::get('/tentang-pengembang', function () {
    return view('tentang-pengembang');
})->name('tentang-pengembang');
