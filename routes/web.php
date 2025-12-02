<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route untuk Halaman Login
Route::get('/login', function () {
    return view('livewire.auth.login');
})->name('login');

// Route untuk Halaman Registrasi
Route::get('/register', function () {
    return view('livewire.auth.register');
})->name('register');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');

Route::prefix('member')->middleware(['auth', 'isMember'])->group(function () {

    // 4. Dashboard Member (Beranda)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('member.dashboard');

    // 5. Jadwal Kelas
    Route::get('/jadwal', function () {
        return view('jadwal');
    })->name('jadwal.member'); 

    // 6. Booking Saya (History)
    Route::get('/history', function () {
        return view('history');
    })->name('history.member'); 

    // 7. Profil Saya
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile.member'); 
});

