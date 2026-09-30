<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report; // Panggil Model yang tadi kita buat
use Illuminate\Support\Facades\Auth; // Untuk cek siapa yang lagi login

class ReportController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi (tambahin aturan buat foto)
        $request->validate([
            'judul' => 'required|min:5',
            'deskripsi' => 'required|min:10',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Maksimal 2MB
        ]);

        // 2. Logika simpan foto
        $namaFoto = null;
        if ($request->hasFile('foto')) {
            // Simpan foto ke folder storage/app/public/laporan
            $path = $request->file('foto')->store('laporan', 'public');
            $namaFoto = $path;
        }

        // 3. Simpan data ke database
        \App\Models\Report::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $namaFoto, // Bakal berisi path foto atau null kalau kosong
            'status' => 'PENDING',
        ]);

        return redirect()->back()->with('pesan', 'Laporan warga Plaju sudah masuk sistem!');
    }
}
