<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokumentasiPenyerahan;
use App\Models\KategoriDonasi;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    public function index()
    {
        $dokumentasi = DokumentasiPenyerahan::with('kategoriDonasi')->get();
        return view('administrator.dokumentasi.index', compact('dokumentasi'));
    }

    public function create()
    {
        $kategori = KategoriDonasi::pluck('judul_donasi', 'id');
        return view('administrator.dokumentasi.add', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_dokumentasi' => 'required|string|max:255',
            'tgl_penyerahan' => 'required|date',
            'kategori_donasi' => 'required|exists:kategori_donasi,id',
            'nama_penerima' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'bukti' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $path = $request->file('bukti')->store('bukti_dokumentasi', 'public');

        DokumentasiPenyerahan::create([
            'judul_dokumentasi' => $request->judul_dokumentasi,
            'tgl_penyerahan' => $request->tgl_penyerahan,
            'kategori_donasi_id' => $request->kategori_donasi,
            'nama_penerima' => $request->nama_penerima,
            'deskripsi' => $request->deskripsi,
            'bukti' => $path,
        ]);

        return redirect()->route('admin.dokumentasi.index')->with('success', 'Dokumentasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dokumentasi = DokumentasiPenyerahan::findOrFail($id);
        $kategori = KategoriDonasi::pluck('judul_donasi', 'id');
        return view('administrator.dokumentasi.edit', compact('dokumentasi', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_dokumentasi' => 'required|string|max:255',
            'tgl_penyerahan' => 'required|date',
            'kategori_donasi' => 'required|exists:kategori_donasi,id',
            'nama_penerima' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'bukti' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $dokumentasi = DokumentasiPenyerahan::findOrFail($id);

        $dokumentasi->judul_dokumentasi = $request->judul_dokumentasi;
        $dokumentasi->tgl_penyerahan = $request->tgl_penyerahan;
        $dokumentasi->kategori_donasi_id = $request->kategori_donasi;
        $dokumentasi->nama_penerima = $request->nama_penerima;
        $dokumentasi->deskripsi = $request->deskripsi;

        if ($request->hasFile('bukti')) {
            // Hapus file lama jika ada
            if ($dokumentasi->bukti && Storage::exists('public/' . $dokumentasi->bukti)) {
                Storage::delete('public/' . $dokumentasi->bukti);
            }

            // Simpan file baru
            $path = $request->file('bukti')->store('bukti_dokumentasi', 'public');
            $dokumentasi->bukti = $path;
        }

        $dokumentasi->save();

        return redirect()->route('admin.dokumentasi.index')->with('success', 'Dokumentasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dokumentasi = DokumentasiPenyerahan::findOrFail($id);

        if ($dokumentasi->bukti && Storage::exists('public/' . $dokumentasi->bukti)) {
            Storage::delete('public/' . $dokumentasi->bukti);
        }

        $dokumentasi->delete();

        return redirect()->route('admin.dokumentasi.index')->with('success', 'Dokumentasi berhasil dihapus.');
    }

    public function showuser()
    {
        $dokumentasi = DokumentasiPenyerahan::all();

        return view('user.dokumentasi.index', compact('dokumentasi'));
    }

    public function show($id)
    {
        $dokumentasi = DokumentasiPenyerahan::findOrFail($id);

        $dokumentasiLainnya = DokumentasiPenyerahan::where('id', '!=', $id)
            ->latest()
            ->take(3)
            ->get();

        return view('user.dokumentasi.detail_dokumentasi', compact('dokumentasi', 'dokumentasiLainnya'));
    }
}
