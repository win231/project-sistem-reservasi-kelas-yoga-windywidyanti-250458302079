<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginPage()
    {
        return view('livewire.auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Coba login
        if (Auth::attempt($request->only('email', 'password'))) {

            $request->session()->regenerate();

            // Cek role untuk redirect
            $role = Auth::user()->role;

            return redirect(match ($role) {
                'admin' => '/admin',
                'dosen' => '/dosen',
                'mahasiswa' => '/mahasiswa',
                default => '/',
            });
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ])->withInput();
    }

    public function showRegisterPage()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'member'
        ]);

        Auth::login($user);

        return redirect(match ($user->role) {
            'admin' => '/admin',
            'instructor' => '/dosen',
            'member' => route('member.dasboard'),
            default => '/',
        });
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
