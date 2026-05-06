<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            // foreignId = Menyambungkan laporan ini ke user yang sedang login
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('judul');        // Misalnya: "Jalan rusak dekat Ampera"
            $table->text('deskripsi');      // Penjelasan panjang
            $table->string('foto')->nullable(); // Foto bukti (nullable = boleh kosong)
            $table->enum('status', ['pending', 'diproses', 'selesai'])->default('pending');
            $table->timestamps(); // Otomatis bikin kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
