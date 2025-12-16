<?php

namespace App\Livewire\Member;

use App\Models\Classes;
use App\Models\ClassSchedule;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('member.layouts')]
class Kelas extends Component
{
    use WithPagination;

    public $search = '';
    public $difficultyFilter = '';

    // Widget statistik
    public $totalKelas = 0;
    public $kelasTersedia = 0;
    public $kelasPenuh = 0;
    public $kelasSelesai = 0;
    
    // Statistik per level
    public $kelasBeginner = 0;
    public $kelasIntermediate = 0;
    public $kelasAdvanced = 0;
    public $kelasAllLevels = 0;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->loadStatistics();
    }

    public function loadStatistics()
    {
        // Statistik Kelas (dari semua jadwal yang tersedia)
        $this->totalKelas = ClassSchedule::where('start_time', '>', now())->count();
        
        $this->kelasTersedia = ClassSchedule::where('start_time', '>', now())
            ->whereRaw('(SELECT COUNT(*) FROM bookings WHERE bookings.class_schedule_id = class_schedules.id AND bookings.status = "confirmed") < class_schedules.max_capacity')
            ->count();
            
        $this->kelasPenuh = ClassSchedule::where('start_time', '>', now())
            ->whereRaw('(SELECT COUNT(*) FROM bookings WHERE bookings.class_schedule_id = class_schedules.id AND bookings.status = "confirmed") >= class_schedules.max_capacity')
            ->count();
            
        $this->kelasSelesai = ClassSchedule::where('start_time', '<', now())->count();
        
        // Statistik per Level
        $this->kelasBeginner = Classes::where('difficulty_level', 'beginner')->count();
        $this->kelasIntermediate = Classes::where('difficulty_level', 'intermediate')->count();
        $this->kelasAdvanced = Classes::where('difficulty_level', 'advanced')->count();
        $this->kelasAllLevels = Classes::where('difficulty_level', 'all_levels')->count();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingDifficultyFilter()
    {
        $this->resetPage();
    }

    public function getDifficultyLabel($level)
    {
        return match($level) {
            'beginner' => 'Pemula',
            'intermediate' => 'Menengah',
            'advanced' => 'Lanjutan',
            'all_levels' => 'Semua Level',
            default => $level
        };
    }

    public function render()
    {
        $kelas = Classes::with(['type', 'schedules' => function($query) {
                $query->where('start_time', '>', now())
                    ->orderBy('start_time', 'asc');
            }])
            ->when($this->search, function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhereHas('type', function($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    });
            })
            ->when($this->difficultyFilter, function($query) {
                $query->where('difficulty_level', $this->difficultyFilter);
            })
            ->orderBy('name', 'asc')
            ->paginate(9);

        return view('livewire.member.kelas', [
            'kelas' => $kelas
        ]);
    }
}
