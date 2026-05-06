<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    // Mass Assignment: Kolom yang boleh diisi manual oleh user
    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'foto',
        'status',
    ];

    // Relasi: Satu laporan dimiliki oleh satu User 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
