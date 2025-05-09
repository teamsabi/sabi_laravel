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
}