<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    /**
     * Tentukan kemana user akan diarahkan berdasarkan role.
     */
    protected function redirectUser($user)
    {
        switch ($user->role) {
            case 'admin':
                return redirect('/admin');
            case 'instructor': 
                return redirect('/instructor');
            case 'member':
                return redirect()->route('dashboard');
            default:
                // Logout dan redirect ke home
                Auth::logout();
                return redirect()->route('home')->with('error', 'Role pengguna tidak valid.');
        }
    }

    /**
     * Fungsi utama untuk otentikasi.
     */
    public function submit()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();

            // Redirect sesuai role user
            return $this->redirectUser(Auth::user()); // Panggil fungsi redirectUser
        }

        // Jika gagal
        $this->addError('email', 'Email atau password salah.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
