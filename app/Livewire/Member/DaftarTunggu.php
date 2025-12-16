<?php

namespace App\Livewire\Member;

use App\Models\WaitingList;
use App\Models\ClassSchedule;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

#[Layout('member.layouts')]
class DaftarTunggu extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = '';

    // Widget statistik
    public $totalDaftarTunggu = 0;
    public $daftarTungguAktif = 0;
    public $posisiTerbaik = 0;
    public $estimasiWaktu = 0;
    public $estimasiWaktuUnit = 'hari'; // 'hari' atau 'jam'
    
    // Statistik tambahan
    public $kelasTersedia = 0;
    public $kelasPenuh = 0;
    public $totalKelasMenunggu = 0;
    public $rataRataPosisi = 0;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->loadStatistics();
    }

    public function loadStatistics()
    {
        $userId = Auth::id();
        
        // Statistik Daftar Tunggu
        $this->totalDaftarTunggu = WaitingList::where('user_id', $userId)->count();
        
        // Daftar tunggu aktif (jadwal belum dimulai)
        $this->daftarTungguAktif = WaitingList::where('user_id', $userId)
            ->whereHas('classSchedule', function($query) {
                $query->where('start_time', '>', now());
            })
            ->count();
        
        // Posisi terbaik (posisi terkecil)
        $bestPosition = WaitingList::where('user_id', $userId)
            ->whereHas('classSchedule', function($query) {
                $query->where('start_time', '>', now());
            })
            ->get()
            ->map(function($waiting) {
                return WaitingList::where('class_schedule_id', $waiting->class_schedule_id)
                    ->where('registered_at', '<', $waiting->registered_at)
                    ->count() + 1;
            })
            ->min();
        $this->posisiTerbaik = $bestPosition ?? 0;
        
        // Estimasi waktu (rata-rata hari/jam sampai kelas dimulai)
        $waitingWithSchedules = WaitingList::where('user_id', $userId)
            ->whereHas('classSchedule', function($query) {
                $query->where('start_time', '>', now());
            })
            ->with('classSchedule')
            ->get();
            
        if ($waitingWithSchedules->isNotEmpty()) {
            $avgHours = $waitingWithSchedules->avg(function($waiting) {
                return now()->diffInHours($waiting->classSchedule->start_time);
            });
            
            if ($avgHours >= 24) {
                $this->estimasiWaktu = round($avgHours / 24);
                $this->estimasiWaktuUnit = 'hari';
            } else {
                $this->estimasiWaktu = round($avgHours);
                $this->estimasiWaktuUnit = 'jam';
            }
        } else {
            $this->estimasiWaktu = 0;
            $this->estimasiWaktuUnit = 'hari';
        }
        
        // Statistik Tambahan
        $this->kelasTersedia = ClassSchedule::where('start_time', '>', now())
            ->whereRaw('(SELECT COUNT(*) FROM bookings WHERE bookings.class_schedule_id = class_schedules.id AND bookings.status = "confirmed") < class_schedules.max_capacity')
            ->count();
            
        $this->kelasPenuh = ClassSchedule::where('start_time', '>', now())
            ->whereRaw('(SELECT COUNT(*) FROM bookings WHERE bookings.class_schedule_id = class_schedules.id AND bookings.status = "confirmed") >= class_schedules.max_capacity')
            ->count();
            
        $this->totalKelasMenunggu = WaitingList::where('user_id', $userId)
            ->distinct('class_schedule_id')
            ->count('class_schedule_id');
            
        // Rata-rata posisi dalam antrian
        $avgPosition = WaitingList::where('user_id', $userId)
            ->whereHas('classSchedule', function($query) {
                $query->where('start_time', '>', now());
            })
            ->get()
            ->map(function($waiting) {
                return WaitingList::where('class_schedule_id', $waiting->class_schedule_id)
                    ->where('registered_at', '<', $waiting->registered_at)
                    ->count() + 1;
            })
            ->avg();
        $this->rataRataPosisi = $avgPosition ? round($avgPosition, 1) : 0;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function getPosition($waitingListId)
    {
        $waiting = WaitingList::find($waitingListId);
        if (!$waiting) return 0;
        
        return WaitingList::where('class_schedule_id', $waiting->class_schedule_id)
            ->where('registered_at', '<', $waiting->registered_at)
            ->count() + 1;
    }

    public function cancelWaitingList($waitingListId)
    {
        $waiting = WaitingList::where('id', $waitingListId)
            ->where('user_id', Auth::id())
            ->first();
        
        if ($waiting) {
            $waiting->delete();
            session()->flash('message', 'Berhasil keluar dari daftar tunggu!');
            session()->flash('alert-type', 'success');
            $this->loadStatistics();
        }
    }

    public function render()
    {
        $waitingLists = WaitingList::with(['classSchedule.class.type', 'classSchedule.instructor'])
            ->where('user_id', Auth::id())
            ->when($this->search, function($query) {
                $query->whereHas('classSchedule.class', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('classSchedule.instructor', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->statusFilter == 'active', function($query) {
                $query->whereHas('classSchedule', function($q) {
                    $q->where('start_time', '>', now());
                });
            })
            ->when($this->statusFilter == 'expired', function($query) {
                $query->whereHas('classSchedule', function($q) {
                    $q->where('start_time', '<=', now());
                });
            })
            ->orderBy('registered_at', 'desc')
            ->paginate(9);

        return view('livewire.member.daftar-tunggu', [
            'waitingLists' => $waitingLists,
        ]);
    }
}
