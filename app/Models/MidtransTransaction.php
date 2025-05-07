<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MidtransTransaction extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'kategori_donasi_id',
        'gross_amount',
        'payment_type',
        'transaction_status',
        'fraud_status',
        'bank',
        'va_number',
        'pdf_url',
        'payload',
    ];

    protected $casts = [
        'payload' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategoriDonasi()
    {
        return $this->belongsTo(KategoriDonasi::class, 'kategori_donasi_id');
    }
}
