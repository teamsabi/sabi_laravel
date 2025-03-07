<?php

namespace App\Http\Controllers;

use App\Mail\AuthMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    function index(){
        return view('auth/login');
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password Wajib Diisi',
        ]);
    
        $infologin = $request->only('email', 'password');
    
        if (Auth::attempt($infologin)){
            if(Auth::user()->email_verified_at != null){
                $message = Auth::user()->role === 'admin' 
                    ? 'Halo Admin, anda berhasil login'
                    : 'Anda berhasil login';
    
                return Auth::user()->role === 'admin' 
                    ? redirect()->route('dashboard')->with('success', $message)
                    : redirect()->route('home.index')->with('success', $message);
            } else {
                Auth::logout();
                return redirect()->route('auth.login')->withErrors('Akun anda belum aktif. Harap verifikasi terlebih dahulu');
            }
        } else {
            return redirect()->route('auth.login')->withErrors('Email atau Password salah');
        }
    }
    
    

    function create(){
        return view('auth/registrasi');
    }

    function register(Request $request){

        $str = Str::random(100);
    
        $request->validate([
            'nama_lengkap' => 'required|min:5',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'no_whatsapp' => 'required|min:10',
            'confirm' => 'required|same:password',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap harus diisi',
            'nama_lengkap.min' => 'Nama Lengkap harus lebih dari 5 karakter',
            'email.required' => 'Email Wajib diisi',
            'email.unique' => 'Email telah terdaftar',
            'password.required' => 'Password Wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'no_whatsapp.required' => 'No Whatsapp Wajib diisi',
            'no_whatsapp.min' => 'No Whatsapp minimal 12 karakter',
            'confirm.required' => 'Konfirmasi Password Wajib diisi',
            'confirm.same' => 'Konfirmasi Password harus sama dengan password',
        ]);
    
        $inforegister = [
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => $request->password,
            'no_whatsapp' => $request->no_whatsapp,
            'verify_key' => $str,
        ];
    
        User::create($inforegister);
    
        $details = [
            'name' => $inforegister['nama_lengkap'],
            'role' => 'user',
            'datetime' => date('Y-m-d H:i:s'),
            'website' => 'JTICare - Pendaftaran Akun JTICare Verify',
            'url' => 'http://' . request()->getHttpHost() . "/" . "verify/" . $inforegister['verify_key'],
        ];
    
        Mail::to($inforegister['email'])->send(new AuthMail($details));
    
        return redirect()->route('auth.login')->with('success', 'Link Verifikasi telah dikirim ke email anda, Cek email anda untuk melakukan verifikasi');
    }
    

    function verify($verify_key){
        $keyCheck = User::select('verify_key')
        ->where('verify_key', $verify_key)
        ->exists();

        if($keyCheck){
            $user = User::where('verify_key', $verify_key)->update(['email_verified_at' => date('Y-m-d H:i:s')]);

            return redirect()->route('auth.login')->with('success', 'Verifikasi Berhasil. Anda Sudah Aktif');
        }else {
            return redirect()->route('auth.login')->withErrors('Key tidak valid. Pastikan Telah melakukan register')->withInput();
        }
    }

    function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login')->with('success', 'Anda berhasil logout');
    }
}
