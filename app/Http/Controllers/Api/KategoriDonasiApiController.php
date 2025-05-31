<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriDonasi;
use Illuminate\Http\JsonResponse;

class KategoriDonasiApiController extends Controller
{
    public function index(): JsonResponse
    {
        $data = KategoriDonasi::where('status', 'aktif')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data kategori donasi berhasil diambil.',
            'data' => $data
        ]);
    }

    public function getFormDonasiData($id)
    {
        $kategori = KategoriDonasi::find($id);

        if (!$kategori) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kategori donasi tidak ditemukan.',
            ], 404);
        }

        if (strtolower($kategori->status) !== 'aktif') {
            return response()->json([
                'status' => 'error',
                'message' => 'Donasi untuk kategori ini sudah tidak aktif.',
            ], 403);
        }

        if ($kategori->donasi_terkumpul >= $kategori->target_dana) {
            return response()->json([
                'status' => 'error',
                'message' => 'Donasi untuk kategori ini sudah terpenuhi.',
            ], 403);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data kategori tersedia.',
            'data' => [
                'id' => $kategori->id,
                'judul_donasi' => $kategori->judul_donasi,
                'deskripsi' => $kategori->deskripsi,
                'target_dana' => $kategori->target_dana,
                'donasi_terkumpul' => $kategori->donasi_terkumpul,
                'gambar' => asset('storage/' . $kategori->gambar),
                'status' => $kategori->status,
                'deadline' => $kategori->dedline,
            ],
        ]);
    }
}