<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // ================= LOGIN =================
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // Validasi 1: Email dan password tidak boleh kosong
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'username/password incorrect',
            'password.required' => 'username/password incorrect'
        ]);

        $email = $request->email;
        $password = $request->password;

        // Validasi 2: Email harus format valid dan domain tidak boleh @ganteng.com
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || str_ends_with(strtolower($email), '@ganteng.com')) {
            throw ValidationException::withMessages([
                'login' => 'username/password incorrect'
            ]);
        }

        // Validasi 3: Password harus lebih dari 8 karakter
        if (strlen($password) < 8) {
            throw ValidationException::withMessages([
                'login' => 'username/password incorrect'
            ]);
        }

        // Attempt login
        $credentials = ['email' => $email, 'password' => $password];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Generate token untuk API (menggunakan Sanctum)
            $token = $request->user()->createToken('auth-token', ['*'], now()->addMinutes(30))->plainTextToken;
            
            // Simpan token di session untuk digunakan di frontend jika perlu
            session(['api_token' => $token]);
            
            return redirect()->intended('/dashboard');
        }

        // Jika gagal login
        throw ValidationException::withMessages([
            'login' => 'username/password incorrect'
        ]);
    }

    // ================= REGISTER =================
    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Custom validation messages
        $messages = [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'username/password incorrect',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password harus lebih dari 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok'
        ];

        // Validasi dasar
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ], $messages);

        $email = $request->email;

        // Validasi domain tidak boleh @ganteng.com
        if (str_ends_with(strtolower($email), '@ganteng.com')) {
            throw ValidationException::withMessages([
                'email' => 'username/password incorrect'
            ]);
        }

        // Buat user baru dengan hashed password
        $user = User::create([
            'name' => $request->name,
            'email' => $email,
            'password' => $request->password // Kolom ini akan otomatis di-hash oleh cast
        ]);

        return redirect('/login')
            ->with('success', 'Registrasi berhasil! Silakan login dengan akun Anda.');
    }

    // ================= FORGOT PASSWORD =================
    public function showForgotPassword()
    {
        return view('forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        // Validasi 1: Email tidak boleh kosong
        $request->validate([
            'email' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong'
        ]);

        $email = $request->email;

        // Validasi 2: Email harus format valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw ValidationException::withMessages([
                'email' => 'Email Anda Salah'
            ]);
        }

        // Cek apakah email terdaftar
        $user = User::where('email', $email)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => 'Email tidak terdaftar dalam sistem'
            ]);
        }

        // Generate OTP dan reset token
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $resetToken = Str::random(60);

        // Simpan token ke database
        $user->update([
            'reset_token' => $resetToken
        ]);

        // Kirim email dengan OTP dan link reset
        try {
            Mail::send('emails.reset-password', [
                'user' => $user,
                'otp' => $otp,
                'resetLink' => url('/reset-password?token=' . $resetToken . '&email=' . urlencode($email))
            ], function ($message) use ($email) {
                $message->to($email)
                    ->subject('Reset Password - Sleepy Panda');
            });

            return back()->with('success', 'Link reset password dan OTP telah dikirim ke email Anda');
        } catch (\Exception $e) {
            // Log actual error untuk debugging
            \Log::error('Email send error: ' . $e->getMessage());
            
            return back()->withErrors([
                'email' => 'Gagal mengirim email: ' . $e->getMessage()
            ]);
        }
    }

    // ================= LOGOUT =================
    public function logout(Request $request)
    {
        // Hapus token jika ada
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }

    // ================= RESET PASSWORD FORM =================
    public function showResetPassword(Request $request)
    {
        $token = $request->query('token');
        $email = $request->query('email');

        if (!$token || !$email) {
            return redirect('/login')->withErrors(['message' => 'Invalid reset link']);
        }

        return view('reset-password', [
            'token' => $token,
            'email' => $email
        ]);
    }

    // ================= UPDATE PASSWORD =================
    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'otp' => 'required|digits:6',
            'password' => 'required|min:8|confirmed'
        ], [
            'otp.required' => 'OTP tidak boleh kosong',
            'otp.digits' => 'OTP harus 6 digit',
            'password.min' => 'Password harus lebih dari 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok'
        ]);

        // Cek email terdaftar
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => 'Email tidak terdaftar'
            ]);
        }

        // Validasi token (simple validation - dalam production bisa lebih complex)
        if ($user->reset_token !== $request->token) {
            throw ValidationException::withMessages([
                'token' => 'Invalid atau expired reset token'
            ]);
        }

        // Update password dan clear reset token
        $user->update([
            'password' => Hash::make($request->password),
            'reset_token' => null // Clear token setelah digunakan
        ]);

        return redirect('/login')
            ->with('success', 'Password berhasil direset! Silakan login dengan password baru Anda.');
    }

    // ================= DASHBOARD =================
    public function dashboard()
    {
        return view('dashboard');
    }
}
