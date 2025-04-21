<?php

namespace App\Http\Controllers;

use App\Mail\AuthMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ResetPasswordToken;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;



class AuthController extends Controller
{
    function index(){
        return view('auth.login');
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
    
        if (Auth::attempt($infologin)) {
            if (Auth::user()->email_verified_at != null) {
                $user = Auth::user();
                $message = $user->role === 'admin'
                    ? 'Halo '. $user->nama_lengkap.', anda berhasil login sebagai admin'
                    : 'Halo '. $user->nama_lengkap . ', selamat anda berhasil login';
        
                return $user->role === 'admin'
                    ? redirect()->route('dashboard')->with('success', $message)
                    : redirect()->route('beranda.login')->with('success', $message);
            } else {
                Auth::logout();
                return redirect()->route('auth.login')->withErrors('Akun anda belum aktif. Harap verifikasi terlebih dahulu');
            }
        } else {
            return back()->withErrors(['login' => 'Email atau Password salah'])->withInput();
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
            'no_whatsapp' => 'required|min:10|unique:users',
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
    
        try {
            Mail::to($inforegister['email'])->send(new AuthMail($details));
        } catch (\Exception $e) {
            return redirect()->route('auth.login')->withErrors('Gagal mengirim email verifikasi. Coba lagi nanti.');
        }
    
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

    // Halaman Lupa Password
    public function showForgotPasswordForm()
    {
        return view('auth.lupa_password');
    }

    // Kirim Link Reset Password
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();
        $token = Str::random(64);

        // Menyimpan token reset password ke database
        ResetPasswordToken::create([
            'user_id'    => $user->id,
            'email'      => $user->email,
            'token'      => $token,
            'created_at' => now(),
            'expired_at' => now()->addMinutes(30),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $resetLink = url('/lupa-password/new-password?token=' . $token);

        // Mengirim email dengan link reset password
        Mail::raw("Klik link ini untuk reset password: $resetLink", function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Reset Password');
        });

        return back()->with('success', 'Link reset password telah dikirim ke email.');
    }

    // Tampilkan Form Password Baru
    public function showResetForm(Request $request)
    {
        $token = $request->query('token');
        $tokenData = ResetPasswordToken::where('token', $token)->first();

        // Cek apakah token valid dan belum expired
        if (!$tokenData || $tokenData->expired_at < now() || $tokenData->used_at !== null) {
            return redirect()->route('auth.login')->withErrors('Token tidak valid atau sudah kedaluwarsa.');
        }

        return view('auth.new_password', [
            'token' => $token,
            'email' => $tokenData->email,
        ]);
    }

    // Update Password Baru
    public function updatePassword(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $tokenData = ResetPasswordToken::where('token', $request->token)
            ->where('email', $request->email)
            ->first();

        // Cek apakah token valid dan belum expired
        if (!$tokenData || $tokenData->expired_at < now() || $tokenData->used_at !== null) {
            return redirect()->route('auth.login')->withErrors('Token tidak valid atau sudah kedaluwarsa.');
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Tandai token sebagai sudah digunakan
        $tokenData->used_at = now();
        $tokenData->save();

        return redirect()->route('auth.login')->with('success', 'Password berhasil diubah. Silakan login.');
    }
}
