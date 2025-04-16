<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriDonasi;
use Illuminate\Support\Facades\Storage;

class KategoriDonasiController extends Controller
{
    // Tampilkan semua data kategori donasi
    public function index()
    {
        $kategoriDonasi = KategoriDonasi::all();
        return view('administrator.kategori.index', compact('kategoriDonasi'));
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('administrator.kategori.add');
    }

    // Simpan data baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'judul_donasi' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'deskripsi' => 'required|string',
            'target_dana' => 'required|numeric|min:0',
            'dedline' => 'required|date|after:today',
        ]);
    
        $gambar = $request->file('gambar')->store('gambar_donasi', 'public');
    
        KategoriDonasi::create([
            'id_user' => $request->id_user,
            'judul_donasi' => $request->judul_donasi,
            'gambar' => $gambar,
            'deskripsi' => $request->deskripsi,
            'target_dana' => $request->target_dana,
            'dedline' => $request->dedline,
            'tanggal_buat' => now(), // otomatis tanggal hari ini
        ]);
    
        return redirect()->route('kategori.index')->with('success', 'Kategori Donasi berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $kategori = KategoriDonasi::findOrFail($id);
        return view('administrator.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriDonasi::findOrFail($id);
    
        $request->validate([
            'judul_donasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'deskripsi' => 'required|string',
            'target_dana' => 'required|numeric|min:0',
            'dedline' => 'required|date',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);
    
        // Update gambar jika ada file baru diunggah
        if ($request->hasFile('gambar')) {
            if ($kategori->gambar && Storage::exists('public/' . $kategori->gambar)) {
                Storage::delete('public/' . $kategori->gambar);
            }
    
            $gambar = $request->file('gambar')->store('gambar_donasi', 'public');
            $kategori->gambar = $gambar;
        }
    
        // Update data lainnya
        $kategori->update([
            'judul_donasi' => $request->judul_donasi,
            'deskripsi' => $request->deskripsi,
            'target_dana' => $request->target_dana,
            'dedline' => $request->dedline,
            'status' => $request->status,
            'gambar' => $kategori->gambar, // gunakan gambar yang ada jika tidak diubah
        ]);
    
        return redirect()->route('kategori.index')->with('success', 'Kategori Donasi berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $kategori = KategoriDonasi::findOrFail($id);

        if ($kategori->gambar && Storage::exists('public/' . $kategori->gambar)) {
            Storage::delete('public/' . $kategori->gambar);
        }

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori Donasi berhasil dihapus.');
    }
}
