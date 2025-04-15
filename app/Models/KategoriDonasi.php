<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDonasi extends Model
{
    use HasFactory;

    protected $table = 'kategori_donasi';

    protected $fillable = [
        'id_user',              // ⬅️ Tambahkan ini
        'judul_donasi',
        'gambar',
        'deskripsi',
        'target_dana',
        'jumlah_donatur',
        'donasi_terkumpul',
        'dedline',
        'tanggal_buat',
        'status',
    ];
}