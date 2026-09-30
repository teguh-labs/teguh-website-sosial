<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    // Kasih izin biar judul dan isi boleh diisi manual
    protected $fillable = ['judul', 'isi_informasi'];
}
