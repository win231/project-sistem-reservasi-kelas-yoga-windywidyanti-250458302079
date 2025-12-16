<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Member\Dashboard;
use App\Livewire\Member\Kelas;
use App\Livewire\Member\JadwalKelas;
use App\Livewire\Member\Booking;
use App\Livewire\Member\Profil;
use App\Livewire\Member\DaftarTunggu;
use App\Livewire\Member\Ulasan;
use App\Models\ClassSchedule;
use App\Models\Instructor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Ambil 3 jadwal terdekat
    $schedules = ClassSchedule::where('start_time', '>', now())
        ->with(['class.type', 'instructor'])
        ->orderBy('start_time', 'asc')
        ->limit(3)
        ->get()
        ->map(function($schedule) {
            $bookedCount = $schedule->bookings()->where('status', 'confirmed')->count();
            $isFull = $bookedCount >= $schedule->max_capacity;
            
            $levels = [
                'hatha-yoga' => ['label' => 'Pemula', 'color' => 'info'],
                'vinyasa-flow' => ['label' => 'Mahir', 'color' => 'danger'],
                'yin-yoga' => ['label' => 'Menengah', 'color' => 'warning'],
            ];
            
            $level = $levels[$schedule->class->type->slug ?? ''] ?? ['label' => 'Semua Level', 'color' => 'success'];
            
            return [
                'time' => $schedule->start_time->format('H:i') . ' WIB',
                'class_name' => $schedule->class->name ?? 'N/A',
                'location' => $schedule->location ?? 'Studio',
                'instructor_name' => $schedule->instructor->name ?? 'N/A',
                'level' => $level,
                'is_full' => $isFull,
            ];
        });

    // Ambil semua instructor
    $instructors = Instructor::all()
        ->map(function($instructor) {
            return [
                'name' => $instructor->name ?? 'N/A',
                'specialization' => $instructor->bio ?? 'Instruktur Yoga',
                'photo' => $instructor->profile_image_url ? asset('storage/' . $instructor->profile_image_url) : 'https://ui-avatars.com/api/?name=' . urlencode($instructor->name ?? 'Instructor') . '&size=200',
            ];
        });

    return view('welcome', compact('schedules', 'instructors'));
})->name('home');

// Route untuk Halaman Login
Route::get('/login', Login::class)->name('login');

// Livewire menangani view dan submit sekaligus
Route::get('/register', Register::class)->name('register');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');

// Member Routes - Protected
Route::middleware(['auth'])->group(function () {
    Route::get('/member/dashboard', Dashboard::class)->name('member.dashboard');
    Route::get('/member/booking', Booking::class)->name('member.booking');
    Route::get('/member/kelas', Kelas::class)->name('member.kelas');
    Route::get('/member/jadwal', JadwalKelas::class)->name('member.jadwal');
    Route::get('/member/daftar-tunggu', DaftarTunggu::class)->name('member.daftar-tunggu');
    Route::get('/member/ulasan', Ulasan::class)->name('member.ulasan');
    Route::get('/member/profil', Profil::class)->name('member.profil');
    
    // Instructor Export Routes
    Route::get('/instructor/schedule/{schedule}/export', [\App\Http\Controllers\Instructor\ExportController::class, 'exportScheduleDetail'])
        ->name('instructor.schedule.export')
        ->middleware(\App\Http\Middleware\IsInstructor::class);
});

