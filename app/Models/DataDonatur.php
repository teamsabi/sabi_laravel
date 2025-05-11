<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDonatur extends Model
{
    use HasFactory;

    protected $table = 'data_donatur';

    protected $fillable = [
        'user_id',
        'kategori_donasi_id',
        'transaction_id',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke kategori donasi
    public function kategoriDonasi()
    {
        return $this->belongsTo(KategoriDonasi::class, 'kategori_donasi_id');
    }

    // Relasi ke transaksi Midtrans
    public function transaksi()
    {
        return $this->belongsTo(MidtransTransaction::class, 'transaction_id');
    }

    // Relasi ke detail donatur
    public function detail()
    {
        return $this->hasMany(DetailDataDonatur::class, 'data_donatur_id');
    }
}
