<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HubungiKamiApi extends Controller
{
    public function kirimPesanApi(Request $request)
    {
        $request->validate([
            'pesan' => 'required|string|max:10000',
        ]);

        $user = $request->user(); // Menggunakan Sanctum

        $data = [
            'nama'  => $user->nama_lengkap,
            'email' => $user->email,
            'pesan' => $request->pesan,
        ];

        Mail::send('mail.hubungi_kami', $data, function ($message) use ($data) {
            $message->to('sabiteam23@gmail.com')
                    ->subject('Pesan dari User: ' . $data['nama']);
        });

        return response()->json([
            'status'  => 'success',
            'message' => 'Pesan telah berhasil dikirim.',
        ]);
    }
}
