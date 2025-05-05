<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\AuthMail;
use App\Models\User;
use App\Models\ResetPasswordToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Email atau password salah'], 401);
        }

        if ($user->email_verified_at === null) {
            return response()->json(['message' => 'Email belum diverifikasi'], 403);
        }

        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'user'    => $user,
            'token'   => $token,
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|min:5',
            'email'        => 'required|email|unique:users',
            'password'     => 'required|min:6',
            'confirm'      => 'required|same:password',
            'no_whatsapp'  => 'required|min:10|unique:users',
        ]);

        $verify_key = Str::random(100);

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'no_whatsapp'  => $request->no_whatsapp,
            'verify_key'   => $verify_key,
        ]);

        $url = url("/verify/{$verify_key}");

        $details = [
            'name'     => $user->nama_lengkap,
            'role'     => 'user',
            'datetime' => now(),
            'website'  => 'JTICare - Verifikasi Email',
            'url'      => $url,
        ];

        try {
            Mail::to($user->email)->send(new AuthMail($details));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengirim email verifikasi'], 500);
        }

        return response()->json([
            'message' => 'Registrasi berhasil. Silakan cek email untuk verifikasi.',
        ]);
    }

    public function verify($verify_key)
    {
        $user = User::where('verify_key', $verify_key)->first();

        if (!$user) {
            return response()->json(['message' => 'Key verifikasi tidak valid'], 400);
        }

        $user->email_verified_at = now();
        $user->save();

        return response()->json(['message' => 'Email berhasil diverifikasi. Silakan login.']);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout berhasil. Token dihapus.']);
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();
        $token = Str::random(64);

        ResetPasswordToken::create([
            'user_id'    => $user->id,
            'email'      => $user->email,
            'token'      => $token,
            'created_at' => now(),
            'expired_at' => now()->addMinutes(30),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $resetLink = url("/lupa-password/new-password?token={$token}");

        try {
            Mail::send([], [], function ($message) use ($user, $resetLink) {
                $message->to($user->email)
                    ->subject('Reset Password')
                    ->html("
                        <h3>Halo {$user->nama_lengkap},</h3>
                        <p>Silakan klik tombol di bawah ini untuk reset password:</p>
                        <a href='{$resetLink}' style='
                            display:inline-block;
                            padding:10px 20px;
                            font-size:16px;
                            color:#fff;
                            background-color:#4A90E2;
                            border-radius:5px;
                            text-decoration:none;
                            margin-top:10px;
                        '>Reset Password</a>
                        <p>Jika tidak meminta reset, abaikan email ini.</p>
                    ");
            });
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengirim email reset password'], 500);
        }

        return response()->json(['message' => 'Link reset password telah dikirim ke email.']);
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

        if (!$tokenData || $tokenData->expired_at < now() || $tokenData->used_at) {
            return response()->json(['message' => 'Token tidak valid atau sudah kedaluwarsa'], 400);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        $tokenData->used_at = now();
        $tokenData->save();

        return response()->json(['message' => 'Password berhasil diubah. Silakan login.']);
    }

    public function updateEmail(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'emailBaru' => 'required|email|unique:users,email',
        ]);

        $verify_key = Str::random(100);

        $user->update([
            'email' => $request->emailBaru,
            'verify_key' => $verify_key,
            'email_verified_at' => null,
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
            return response()->json(['message' => 'Gagal mengirim email verifikasi email baru'], 500);
        }

        $user->tokens()->delete(); // Logout dari semua sesi

        return response()->json(['message' => 'Email sedang diverifikasi. Cek email baru Anda.']);
    }

    public function verifyNewEmail($verify_key)
    {
        $user = User::where('verify_key', $verify_key)->first();

        if (!$user) {
            return response()->json(['message' => 'Key verifikasi tidak valid'], 400);
        }

        $user->email_verified_at = now();
        $user->save();

        return response()->json(['message' => 'Email baru berhasil diverifikasi. Silakan login.']);
    }
}
