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
            return back()->withErrors(['auth.login' => 'Email atau Password salah'])->withInput();
        }
    }
    
    

    function create(){
        return view('auth.registrasi');
    }

    function register(Request $request){

        $str = Str::random(100);
    
        $request->validate([
            'nama_lengkap' => 'required|min:5',
            'email' => 'required|unique:users|email',
            'no_whatsapp' => 'required|min:10|unique:users',
            'no_whatsapp' => 'required|min:10',
            'password' => 'required|min:8',
            'confirm' => 'required|same:password',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap harus diisi',
            'nama_lengkap.min' => 'Nama Lengkap harus lebih dari 5 karakter',
            'email.required' => 'Email Wajib diisi',
            'email.unique' => 'Email telah terdaftar',
            'password.required' => 'Password Wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
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

            return redirect()->route('auth.login')->with('success', 'Verifikasi Berhasil. Akun Anda Sudah Aktif');
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

        Mail::send([], [], function ($message) use ($user, $resetLink) {
            $message->to($user->email)
                    ->subject('Reset Password')
                    ->html('
                        <h3>Halo ' . e($user->nama_lengkap) . ',</h3>
                        <p>Silakan klik tombol di bawah ini untuk mengatur ulang kata sandi Anda:</p>
                        <a href="' . e($resetLink) . '" style="
                            display: inline-block;
                            padding: 10px 20px;
                            font-size: 16px;
                            color: white;
                            background-color: #4A90E2;
                            border-radius: 5px;
                            text-decoration: none;
                            margin-top: 10px;
                        ">
                            Reset Password
                        </a>
                        <p style="margin-top: 20px;">Jika kamu tidak meminta pengaturan ulang kata sandi, abaikan email ini.</p>
                    ');
        });

        return back()->with('success', 'Link reset password telah dikirim ke email.');
    }

    // Tampilkan Form Password Baru
    public function showResetForm(Request $request)
    {
        $token = $request->query('token');
        $tokenData = ResetPasswordToken::where('token', $token)->first();

        if (!$tokenData || $tokenData->expired_at < now() || $tokenData->used_at !== null) {
            return redirect()->route('auth.login')->withErrors('Token tidak valid atau sudah kedaluwarsa.');
        }

        return view('auth.new_password', [
            'token' => $token,
            'email' => $tokenData->email,
        ]);
    }

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

        if (!$tokenData || $tokenData->expired_at < now() || $tokenData->used_at !== null) {
            return redirect()->route('auth.login')->withErrors('Token tidak valid atau sudah kedaluwarsa.');
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        $tokenData->used_at = now();
        $tokenData->save();

        return redirect()->route('auth.login')->with('success', 'Password berhasil diubah. Silakan login.');
    }

    public function updateEmail(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'emailBaru' => 'required|email|unique:users,email',
        ], [
            'emailBaru.required' => 'Email baru wajib diisi',
            'emailBaru.email' => 'Format email tidak valid',
            'emailBaru.unique' => 'Email ini sudah terdaftar',
        ]);

        $verify_key = Str::random(100);

        $user->update([
            'email' => $request->emailBaru,
            'verify_key' => $verify_key,
            'email_verified_at' => null
        ]);

        $details = [
            'name' => $user->nama_lengkap,
            'role' => $user->role,
            'datetime' => now(),
            'website' => 'JTICare - Verifikasi Email Baru',
            'url' => url("/verify-email-baru/{$verify_key}"),
        ];

        try {
            Mail::to($request->emailBaru)->send(new AuthMail($details));
        } catch (\Exception $e) {
            return redirect()->route('auth.login')->withErrors('Gagal mengirim email verifikasi. Coba lagi nanti.');
        }

        Auth::logout();
        return redirect()->route('auth.login')->with('success', 'Akun email anda sedang dibuild kembali menjadi email yang baru. Silahkan cek email baru anda untuk verifikasi.');
    }

    public function verifyNewEmail($verify_key)
    {
        $user = User::where('verify_key', $verify_key)->first();
    
        if (!$user) {
            return redirect()->route('auth.login')->withErrors('Key verifikasi tidak valid');
        }
    
        $user->email_verified_at = now();
        $user->save();
    
        return redirect()->route('auth.login')->with('success', 'Akun anda berhasil diverifikasi. Silahkan login');
    }
}
