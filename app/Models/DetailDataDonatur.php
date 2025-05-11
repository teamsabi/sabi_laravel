<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailDataDonatur extends Model
{
    use HasFactory;

    protected $table = 'detail_data_donatur';

    protected $fillable = [
        'data_donatur_id',
        'nama_donatur',
        'email',
        'no_whatsapp',
        'kategori_donasi',
        'nominal',
        'metode_pembayaran',
        'status',
        'tanggal_transaksi',
    ];

    // Relasi ke data donatur utama
    public function dataDonatur()
    {
        return $this->belongsTo(DataDonatur::class, 'data_donatur_id');
    }
}
