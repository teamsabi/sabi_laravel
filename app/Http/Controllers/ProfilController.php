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
    
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_whatsapp' => 'nullable|string|unique:users,no_whatsapp,' . $user->id,
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->no_whatsapp = $request->no_whatsapp;
    
        if ($request->hasFile('foto_profil')) {
            $user->foto_profil = $request->file('foto_profil');
        }
    
        try {
            $user->save();
            return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
