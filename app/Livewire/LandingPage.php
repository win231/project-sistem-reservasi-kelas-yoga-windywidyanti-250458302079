<?php

namespace App\Livewire;

use App\Models\ClassSchedule;
use App\Models\Instructor;
use Livewire\Component;

class LandingPage extends Component
{
    public $schedules = [];
    public $instructors = [];

    public function mount()
    {
        // Ambil 3 jadwal terdekat untuk hari ini
        $this->schedules = ClassSchedule::where('start_time', '>', now())
            ->with(['class.type', 'instructor'])
            ->orderBy('start_time', 'asc')
            ->limit(3)
            ->get()
            ->map(function($schedule) {
                $bookedCount = $schedule->bookings()->where('status', 'confirmed')->count();
                $isFull = $bookedCount >= $schedule->max_capacity;
                
                return [
                    'time' => $schedule->start_time->format('H:i') . ' WIB',
                    'class_name' => $schedule->class->name ?? 'N/A',
                    'location' => $schedule->location ?? 'Studio',
                    'instructor_name' => $schedule->instructor->name ?? 'N/A',
                    'level' => $this->getClassLevel($schedule->class->type->slug ?? ''),
                    'is_full' => $isFull,
                ];
            });

        // Ambil semua instructor dari tabel instructors
        $this->instructors = Instructor::all()
            ->map(function($instructor) {
                return [
                    'name' => $instructor->name ?? 'N/A',
                    'specialization' => $instructor->bio ?? 'Instruktur Yoga',
                    'photo' => $instructor->profile_image_url ? asset('storage/' . $instructor->profile_image_url) : 'https://ui-avatars.com/api/?name=' . urlencode($instructor->name ?? 'Instructor') . '&size=200',
                ];
            });
    }

    private function getClassLevel($slug)
    {
        $levels = [
            'hatha-yoga' => ['label' => 'Pemula', 'color' => 'info'],
            'vinyasa-flow' => ['label' => 'Mahir', 'color' => 'danger'],
            'yin-yoga' => ['label' => 'Menengah', 'color' => 'warning'],
        ];

        return $levels[$slug] ?? ['label' => 'Semua Level', 'color' => 'success'];
    }

    public function render()
    {
        return view('livewire.landing-page')->layout('components.layouts.app');
    }
}
