<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    function index(){
        return view('administrator.profil.index');
    }


    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_whatsapp' => 'nullable|string|unique:users,no_whatsapp,' . $user->id,
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
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

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
    
        // Validasi password saat ini dan password baru
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8',
        ], [
            'currentPassword.required' => 'Password saat ini wajib diisi',
            'newPassword.required' => 'Password baru wajib diisi',
            'newPassword.min' => 'Password baru minimal 8 karakter',
        ]);
    
        // Verifikasi password saat ini
        if (!Hash::check($request->currentPassword, $user->password)) {
            return back()->withErrors(['currentPassword' => 'Password saat ini tidak cocok']);
        }
    
        // Update password baru
        $user->update([
            'password' => Hash::make($request->newPassword),
        ]);
    
        // Mengirim SweetAlert Info bahwa password berhasil diperbarui
        return redirect()->route('admin.profil.pengaturan-akun')->with('success', 'Password Anda berhasil diperbarui');
    }
        
}