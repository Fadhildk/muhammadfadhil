<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        if (!$request->username || !$request->password) {
            return back()->withErrors([
                'login' => 'username/password incorrect'
            ]);
        }

        if (!str_contains($request->username, '@')) {
            return back()->withErrors([
                'login' => 'username/password incorrect'
            ]);
        }

        $domain = explode('@', $request->username)[1];
        if ($domain === 'ganteng.com') {
            return back()->withErrors([
                'login' => 'username/password incorrect'
            ]);
        }

        if (strlen($request->password) < 8) {
            return back()->withErrors([
                'login' => 'username/password incorrect'
            ]);
        }

        $validUsername = 'admin@mail.com';
        $validPassword = 'password123';

        if ($request->username === $validUsername && $request->password !== $validPassword) {
            return redirect()->route('password.request');
        }

        if ($request->username === $validUsername && $request->password === $validPassword) {
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'login' => 'username/password incorrect'
        ]);
    }

    public function forgot()
    {
        return view('auth.forgot-password');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordConfirmation = $request->input('password_confirmation');

        if (empty($name) || empty($email) || empty($password) || empty($passwordConfirmation)) {
            return back()->withErrors(['register' => 'Semua field harus diisi'])->withInput();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return back()->withErrors(['register' => 'Format email tidak valid'])->withInput();
        }

        if (strlen($password) < 8) {
            return back()->withErrors(['register' => 'Password minimal 8 karakter'])->withInput();
        }

        if ($password !== $passwordConfirmation) {
            return back()->withErrors(['register' => 'Konfirmasi password tidak cocok'])->withInput();
        }

        $checkEmail = User::where('email', $email)->count();
        if ($checkEmail > 0) {
            return back()->withErrors(['register' => 'Email sudah terdaftar'])->withInput();
        }

        try {
            $newUser = new User();
            $newUser->name = $name;
            $newUser->email = $email;
            $newUser->password = Hash::make($password);
            $newUser->save();

            Auth::login($newUser);

            return redirect('/dashboard');
        } catch (\Exception $e) {
            return back()->withErrors(['register' => 'Terjadi kesalahan, coba lagi'])->withInput();
        }
    }
}