<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumentasiPenyerahan extends Model
{
    use HasFactory;

    protected $table = 'dokumentasi_penyerahan';

    protected $fillable = [
        'kategori_donasi_id',
        'judul_dokumentasi',
        'tgl_penyerahan',
        'nama_penerima',
        'deskripsi',
        'bukti',
    ];

    /**
     * Relasi ke tabel kategori_donasi
     */
    public function kategoriDonasi()
    {
        return $this->belongsTo(KategoriDonasi::class, 'kategori_donasi_id');
    }
}
