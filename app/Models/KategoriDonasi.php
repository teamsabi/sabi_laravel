<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDonasi extends Model
{
    use HasFactory;

    protected $table = 'kategori_donasi';

    protected $fillable = [
        'id_user',
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

    /**
     * Relasi ke tabel users
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Relasi ke tabel dokumentasi_penyerahan
     */
    public function dokumentasi()
    {
        return $this->hasMany(DokumentasiPenyerahan::class, 'kategori_donasi_id');
    }

    public function transaksi()
    {
        return $this->hasMany(MidtransTransaction::class, 'kategori_donasi_id');
    }

}
