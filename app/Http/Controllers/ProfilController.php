<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfilController extends Controller
{
    function index(){
        return view('administrator/profil/index');
    }


    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_whatsapp' => 'nullable|string|unique:users,no_whatsapp,' . $user->id,
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        if ($request->hasFile('foto_profil')) {
            if ($user->foto_profil && Storage::disk('public')->exists($user->foto_profil)) {
                Storage::disk('public')->delete($user->foto_profil);
            }
    
            $namaFile = str_replace(' ', '_', strtolower($request->nama_lengkap)) . '.' . $request->file('foto_profil')->getClientOriginalExtension();
            $path = $request->file('foto_profil')->storeAs('foto_profil', $namaFile, 'public');
        }
    
        // Update data tanpa $user->save()
        $user->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_whatsapp' => $request->no_whatsapp,
            'foto_profil' => $path ?? $user->foto_profil,
        ]);
    
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
        
}