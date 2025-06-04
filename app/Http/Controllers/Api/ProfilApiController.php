<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class ProfilApiController extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_whatsapp' => 'nullable|string|unique:users,no_whatsapp,' . $user->id,
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        // Handle upload foto profil jika ada
        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama jika ada
            if ($user->foto_profil && Storage::disk('public')->exists($user->foto_profil)) {
                Storage::disk('public')->delete($user->foto_profil);
            }

            // Simpan foto baru
            $namaFile = str_replace(' ', '_', strtolower($request->nama_lengkap)) . '.' . $request->file('foto_profil')->getClientOriginalExtension();
            $path = $request->file('foto_profil')->storeAs('foto_profil', $namaFile, 'public');
        }

        // Update data user
        $user->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_whatsapp' => $request->no_whatsapp,
            'foto_profil' => $path ?? $user->foto_profil,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Profil berhasil diperbarui',
            'data' => $user,
        ]);
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8',
        ], [
            'currentPassword.required' => 'Password saat ini wajib diisi',
            'newPassword.required' => 'Password baru wajib diisi',
            'newPassword.min' => 'Password baru minimal 8 karakter',
        ]);

        if (!Hash::check($request->currentPassword, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Password saat ini tidak cocok',
            ], 400);
        }

        $user->update([
            'password' => Hash::make($request->newPassword),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Password Anda berhasil diperbarui',
        ]);
    }

    public function hapusAkunApi(Request $request)
    {
        $user = $request->user();

        // Hapus foto profil jika ada
        if ($user->foto_profil && Storage::disk('public')->exists($user->foto_profil)) {
            Storage::disk('public')->delete($user->foto_profil);
        }

        // Hapus token Sanctum yang sedang digunakan
        $currentToken = $user->currentAccessToken();
        if ($currentToken instanceof PersonalAccessToken) {
            $currentToken->delete();
        }

        // (Opsional) Hapus semua token aktif user
        // $user->tokens()->delete();

        // Hapus user
        $user->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Akun Anda berhasil dihapus. Anda dapat mendaftar ulang jika ingin membuat akun baru.',
        ]);
    }
}
