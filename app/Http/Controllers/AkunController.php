<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        $users = User::all(); // Ambil semua data dari tabel users
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
}
