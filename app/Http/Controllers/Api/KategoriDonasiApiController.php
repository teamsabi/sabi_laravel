<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriDonasi;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class KategoriDonasiApiController extends Controller
{
    public function index(): JsonResponse
    {
        $data = KategoriDonasi::where('status', 'aktif')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($kategori) {
                return [
                    'id' => $kategori->id,
                    'id_user' => $kategori->id_user ?? null,
                    'judul_donasi' => $kategori->judul_donasi,
                    'deskripsi' => $kategori->deskripsi,
                    'target_dana' => $kategori->target_dana,
                    'donasi_terkumpul' => $kategori->donasi_terkumpul,
                    'jumlah_donatur' => $kategori->jumlah_donatur,
                    'gambar' => asset('storage/' . $kategori->gambar),
                    'status' => $kategori->status,
                    'deadline' => $kategori->dedline,
                    'tanggal_buat' => $kategori->tanggal_buat,
                    'tanggal_buat_indo' => Carbon::parse($kategori->tanggal_buat)->translatedFormat('d F Y'),
                    'tanggal_buat_relative' => Carbon::parse($kategori->tanggal_buat)->diffForHumans(),                    
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Data kategori donasi berhasil diambil.',
            'data' => $data
        ]);
    }
    
    public function show($id)
    {
        \Carbon\Carbon::setLocale('id');

        $kategori = KategoriDonasi::find($id);

        if (!$kategori) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kategori donasi tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data kategori donasi berhasil ditemukan.',
            'data' => [
                'id' => $kategori->id,
                'judul_donasi' => $kategori->judul_donasi,
                'deskripsi' => $kategori->deskripsi,
                'target_dana' => $kategori->target_dana,
                'donasi_terkumpul' => $kategori->donasi_terkumpul,
                'jumlah_donatur' => $kategori->jumlah_donatur,
                'gambar' => asset('storage/' . $kategori->gambar),
                'status' => $kategori->status,
                'deadline' => $kategori->dedline,
                'tanggal_buat' => $kategori->tanggal_buat,
                'tanggal_buat_indo' => Carbon::parse($kategori->tanggal_buat)->translatedFormat('d F Y'),
                'tanggal_buat_relative' => Carbon::parse($kategori->tanggal_buat)->diffForHumans(),
            ],
        ]);
    }
}