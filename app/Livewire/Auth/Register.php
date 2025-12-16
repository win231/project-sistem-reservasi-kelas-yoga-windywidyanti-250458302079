<?php

namespace App\Livewire\Auth;

use layout;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{

    // 1. PROPERTI
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $gender = '';
    public $phone = '';

    // 2. VALIDASI
    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'gender' => ['required', 'string', 'in:male,female'],
        'phone' => ['required', 'string', 'max:20'],
    ];


    // 3. FUNGSI SUBMIT
    public function submit()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'gender' => $this->gender,
            'phone' => $this->phone,
            'role' => 'member',
        ]);

        Auth::login($user);

        return redirect()->route('member.dashboard')->with('success', 'Pendaftaran berhasil! Selamat datang.');
    }

    public function render()
    {
        return view('livewire.auth.register')
        ->layout('components.layouts.auth-layout', ['title' => 'Gymora Register']);
    }
}
