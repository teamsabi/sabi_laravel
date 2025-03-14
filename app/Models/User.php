<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nama_lengkap',
        'email',
        'password',
        'no_whatsapp',
        'verify_key',
        'role',
        'foto_profil',
    ];

    public function getFotoProfilUrlAttribute()
    {
        if ($this->foto_profil) {
            return asset('storage/' . $this->foto_profil);
        }
        return asset('template/assets/img/Foto Team/Syaiful.png');
    }

    public function setFotoProfilAttribute($value)
    {
        if ($value instanceof \Illuminate\Http\UploadedFile) {
            // Hapus file lama jika ada
            if ($this->foto_profil && Storage::disk('public')->exists($this->foto_profil)) {
                Storage::disk('public')->delete($this->foto_profil);
            }
    
            $fileName = time() . '_' . $value->getClientOriginalName();
            $path = $value->storeAs('profile_pictures', $fileName, 'public');
    
            $this->attributes['foto_profil'] = $path;
        }
    }

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => 'string',         
        'verify_key' => 'string',   
    ];
}
