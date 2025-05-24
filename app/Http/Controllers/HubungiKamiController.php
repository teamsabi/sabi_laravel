<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HubungiKamiController extends Controller
{
    public function kirim(Request $request)
    {
        $request->validate([
            'pesan' => 'required|string|max:10000',
        ]);

        $data = [
            'nama' => Auth::user()->nama_lengkap,
            'email' => Auth::user()->email,
            'pesan' => $request->pesan,
        ];

        Mail::send('mail.hubungi_kami', $data, function ($message) use ($data) {
            $message->to('sabiteam23@gmail.com')
                    ->subject('Pesan dari User: ' . $data['nama']);
        });

        return redirect()->back()->with('success', 'Pesan telah terkirim');
    }
}
