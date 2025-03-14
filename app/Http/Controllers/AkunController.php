<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AkunController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('administrator.akun.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('administrator.akun.add', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('akun.index')->with('success', 'Data Akun berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'no_whatsapp' => 'required|numeric',
            'role' => 'required|in:Admin,User',
            'password' => 'nullable|min:6',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $user = User::findOrFail($id);
    
        $user->nama_lengkap = $request->nama;
        $user->email = $request->email;
        $user->no_whatsapp = $request->no_whatsapp;
        $user->role = $request->role;
    
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
    
        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama jika ada
            if ($user->foto_profil && Storage::disk('public')->exists($user->foto_profil)) {
                Storage::disk('public')->delete($user->foto_profil);
            }
    
            // Buat nama file unik dengan menambahkan timestamp
            $namaFile = str_replace(' ', '_', strtolower($request->nama)) . '_' . time() . '.' . $request->file('foto_profil')->getClientOriginalExtension();
    
            // Simpan file ke folder `storage/app/public/profile_pictures`
            $path = $request->file('foto_profil')->storeAs('profile_pictures', $namaFile, 'public');
    
            $user->foto_profil = $path;
        }
    
        $user->save();
    
        return redirect()->route('akun.index')->with('success', 'Data Akun berhasil diubah.');
    }    

        public function create()
    {
        return view('administrator.akun.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'no_whatsapp' => 'required|string|max:15',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable|string|min:6',
            'role' => 'required|string|in:Admin,User',
        ]);
    
        $fotoProfil = null;
    
        if ($request->hasFile('foto_profil')) {
            $namaFile = str_replace(' ', '_', strtolower($request->nama_lengkap)) . '.' . $request->file('foto_profil')->getClientOriginalExtension();

            if (!file_exists(storage_path('app/public/profile_pictures'))) {
                mkdir(storage_path('app/public/profile_pictures'), 0777, true);
            }

            $fotoProfil = $request->file('foto_profil')->storeAs('profile_pictures', $namaFile, 'public');
        }
    
        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_whatsapp' => $request->no_whatsapp,
            'foto_profil' => $fotoProfil,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
    
        return redirect()->route('akun.index')->with('success', 'Data Akun berhasil ditambahkan.');
    }    

}
