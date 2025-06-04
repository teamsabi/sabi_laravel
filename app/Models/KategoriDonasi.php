<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function dokumentasi()
    {
        return $this->hasMany(DokumentasiPenyerahan::class, 'kategori_donasi_id');
    }

    public function transaksi()
    {
        return $this->hasMany(MidtransTransaction::class, 'kategori_donasi_id');
    }

    public function dataDonatur()
    {
        return $this->hasMany(DataDonatur::class, 'kategori_donasi_id');
    }

    public function getTanggalBuatIndoAttribute()
    {
        return Carbon::parse($this->tanggal_buat)
            ->translatedFormat('d F Y');
    }

    public function getTanggalBuatRelativeAttribute()
    {
        return Carbon::parse($this->tanggal_buat)
            ->diffForHumans();
    }
}
