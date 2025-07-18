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

        if ($user->foto_profil && Storage::disk('public')->exists($user->foto_profil)) {
            Storage::disk('public')->delete($user->foto_profil);
        }
    
        $user->delete();
    
        return redirect()->route('akun.index')->with('success', 'Data Akun berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'no_whatsapp' => 'required|string|max:20|unique:users,no_whatsapp,' . $id,
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4000',
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:admin,user',
        ]);
    
        $data = $request->except(['password', 'foto_profil']);
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
    
        if ($request->hasFile('foto_profil')) {
            if ($user->foto_profil) {
                Storage::disk('public')->delete($user->foto_profil);
            }
    
            $namaFile = str_replace(' ', ' ', strtolower($request->nama_lengkap)) . '.' . $request->file('foto_profil')->getClientOriginalExtension();
            $path = $request->file('foto_profil')->storeAs('foto_profil', $namaFile, 'public');
            $data['foto_profil'] = $path;
        }
    
        $user->update($data);
    
        return redirect()->route('akun.index')->with('success', 'Data Akun berhasil diperbarui.');
    }      

}
