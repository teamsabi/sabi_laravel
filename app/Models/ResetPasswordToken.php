<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class ResetPasswordToken extends Model
{
    use HasFactory;

    protected $table = 'reset_password_tokens';

    protected $fillable = [
        'user_id',
        'email',
        'token',
        'created_at',
        'expired_at',
        'used_at',
        'ip_address',
        'user_agent',
    ];

    public $timestamps = false;

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Cek apakah token sudah expired
    public function isExpired()
    {
        return Carbon::now()->greaterThan($this->expired_at);
    }

    // Cek apakah token sudah digunakan
    public function isUsed()
    {
        return !is_null($this->used_at);
    }
}
