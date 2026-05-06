<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report; // Panggil Model yang tadi kita buat
use Illuminate\Support\Facades\Auth; // Untuk cek siapa yang lagi login

class ReportController extends Controller
{
    // Fungsi untuk menyimpan laporan (POST)
    public function store(Request $request)
    {
        // 1. Validasi: Pastikan judul dan deskripsi nggak kosong
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        // 2. Simpan ke database pakai konsep OOP
        Report::create([
            'user_id' => Auth::id(), // Otomatis ngambil ID user yang login
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            // (Foto kita skip dulu untuk tes tahap pertama biar gampang)
        ]);

        // 3. Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('pesan', 'Mantap! Laporan berhasil dikirim.');
    }
}
