<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    function index(){
        return view('auth/login');
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)){
            return "Login Success";
        } else{
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
            'email' => 'required|unique:users,admin',
            'password' => 'required|min:6',
            'no_whatsapp' => 'required|min:10',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap harus diisi',
            'nama_lengkap.min' => 'Nama Lengkap harus lebih dari 5 karakter',
            'email.required' => 'Email Wajib diisi',
            'email.unique' => 'Email telah terdaftar',
            'password.required' => 'Password Wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'no_whatsapp.required' => 'No Whatsapp Wajib diisi',
            'no_whatsapp.min' => 'No Whatsapp minimal 12 karakter',
        ]);

        $inforegister = [
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => $request->password,
            'no_whatsapp' => $request->no_whatsapp,
            'verify_key' => $str,
        ];


    }
}
