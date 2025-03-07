<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfilController extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
    
        // Validasi input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_whatsapp' => 'required|string|unique:users,no_whatsapp,' . $user->id,
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Update data user
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->no_whatsapp = $request->no_whatsapp;
    
        // Jika ada foto profil baru yang diunggah
        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama jika ada
            if ($user->foto_profil && Storage::disk('public')->exists($user->foto_profil)) {
                Storage::disk('public')->delete($user->foto_profil);
            }
    
            // Simpan foto baru
            $path = $request->file('foto_profil')->store('profile_pictures', 'public');
            $user->foto_profil = $path;
        }
    
        $user->save(); // Simpan perubahan ke database
    
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}

