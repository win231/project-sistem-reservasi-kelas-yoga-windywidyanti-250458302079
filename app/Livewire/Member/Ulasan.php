<?php

namespace App\Livewire\Member;

use App\Models\Review;
use App\Models\Booking;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportEvents\InteractsWithEvents;

#[Layout('member.layouts')]
class Ulasan extends Component
{
    use WithPagination;

    public $search = '';
    public $ratingFilter = '';

    // Widget statistik
    public $totalUlasan = 0;
    public $rataRataRating = 0;
    public $ulasanBintang5 = 0;
    public $ulasanBulanIni = 0;
    
    // Statistik tambahan
    public $ulasanBintang4 = 0;
    public $ulasanBintang3 = 0;
    public $ulasanBintang2 = 0;
    public $ulasanBintang1 = 0;

    // Form properties
    public $showModal = false;
    public $editMode = false;
    public $reviewId = null;
    public $selectedBookingId = null;
    public $rating = 5;
    public $comment = '';

    protected $paginationTheme = 'bootstrap';
    
    protected $queryString = ['booking'];
    public $booking = null;

    public function mount()
    {
        $this->loadStatistics();
        
        // Auto-open modal jika ada parameter booking dari halaman booking
        if ($this->booking) {
            $bookingData = Booking::with(['classSchedule.class', 'classSchedule.instructor'])
                ->where('id', $this->booking)
                ->where('user_id', Auth::id())
                ->whereDoesntHave('review')
                ->first();
                
            if ($bookingData && $bookingData->classSchedule->start_time < now()) {
                $this->openCreateModal($this->booking);
            }
        }
    }

    public function loadStatistics()
    {
        $userId = Auth::id();
        
        // Statistik Ulasan
        $this->totalUlasan = Review::where('user_id', $userId)->count();
        
        $avgRating = Review::where('user_id', $userId)->avg('rating');
        $this->rataRataRating = $avgRating ? round($avgRating, 1) : 0;
        
        $this->ulasanBintang5 = Review::where('user_id', $userId)->where('rating', 5)->count();
        
        $this->ulasanBulanIni = Review::where('user_id', $userId)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        
        // Statistik per Rating
        $this->ulasanBintang4 = Review::where('user_id', $userId)->where('rating', 4)->count();
        $this->ulasanBintang3 = Review::where('user_id', $userId)->where('rating', 3)->count();
        $this->ulasanBintang2 = Review::where('user_id', $userId)->where('rating', 2)->count();
        $this->ulasanBintang1 = Review::where('user_id', $userId)->where('rating', 1)->count();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingRatingFilter()
    {
        $this->resetPage();
    }

    public function openCreateModal($bookingId)
    {
        $this->resetForm();
        $this->selectedBookingId = $bookingId;
        $this->showModal = true;
        $this->editMode = false;
        $this->dispatch('modal-opened');
    }

    public function openEditModal($reviewId)
    {
        $review = Review::where('id', $reviewId)
            ->where('user_id', Auth::id())
            ->with(['booking.classSchedule.class', 'booking.classSchedule.instructor'])
            ->first();
        
        if ($review) {
            $this->reviewId = $review->id;
            $this->selectedBookingId = $review->booking_id;
            $this->rating = $review->rating;
            $this->comment = $review->comment;
            $this->showModal = true;
            $this->editMode = true;
            $this->dispatch('modal-opened');
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reviewId = null;
        $this->selectedBookingId = null;
        $this->rating = 5;
        $this->comment = '';
        $this->resetValidation();
    }

    public function saveReview()
    {
        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        if ($this->editMode) {
            // Update existing review
            $review = Review::where('id', $this->reviewId)
                ->where('user_id', Auth::id())
                ->first();
            
            if ($review) {
                $review->update([
                    'rating' => $this->rating,
                    'comment' => $this->comment,
                ]);
                session()->flash('message', 'Ulasan berhasil diperbarui!');
            }
        } else {
            // Validasi selectedBookingId tidak null
            if (!$this->selectedBookingId) {
                session()->flash('error', 'Data booking tidak ditemukan!');
                $this->closeModal();
                return;
            }
            
            // Ambil booking untuk mendapatkan class_id
            $booking = Booking::with('classSchedule.class')->find($this->selectedBookingId);
            
            if (!$booking) {
                session()->flash('error', 'Data booking tidak valid!');
                $this->closeModal();
                return;
            }
            
            // Create new review
            Review::create([
                'user_id' => Auth::id(),
                'class_id' => $booking->classSchedule->class->id,
                'booking_id' => $booking->id,
                'rating' => $this->rating,
                'comment' => $this->comment,
            ]);

            // Update status booking jadi 'completed'
            if ($booking->status === 'confirmed') {
                $booking->status = 'completed';
                $booking->save();
            }

            

            session()->flash('message', 'Ulasan berhasil ditambahkan!');
        }

        session()->flash('alert-type', 'success');
        $this->closeModal();
        $this->dispatch('bookingUpdated');
        $this->loadStatistics();
    }

    public function deleteReview($reviewId)
    {
        $review = Review::where('id', $reviewId)
            ->where('user_id', Auth::id())
            ->first();
        
        if ($review) {
            $review->delete();
            session()->flash('message', 'Ulasan berhasil dihapus!');
            session()->flash('alert-type', 'success');
            $this->loadStatistics();
        }
    }

    public function render()
    {
        $reviews = Review::with(['booking.classSchedule.class.type', 'booking.classSchedule.instructor'])
            ->where('user_id', Auth::id())
            ->when($this->search, function($query) {
                $query->whereHas('booking.classSchedule.class', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('booking.classSchedule.instructor', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhere('comment', 'like', '%' . $this->search . '%');
            })
            ->when($this->ratingFilter, function($query) {
                $query->where('rating', $this->ratingFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        // Get bookings that can be reviewed (confirmed, completed, no review yet)
        $reviewableBookings = Booking::with(['classSchedule.class', 'classSchedule.instructor'])
            ->where('user_id', Auth::id())
            ->where('status', 'confirmed')
            ->whereHas('classSchedule', function($query) {
                $query->where('start_time', '<', now());
            })
            ->whereDoesntHave('review')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Get selected booking data for modal
        $selectedBooking = null;
        if ($this->selectedBookingId) {
            $selectedBooking = Booking::with(['classSchedule.class', 'classSchedule.instructor'])
                ->find($this->selectedBookingId);
        }

        return view('livewire.member.ulasan', [
            'reviews' => $reviews,
            'reviewableBookings' => $reviewableBookings,
            'selectedBooking' => $selectedBooking,
        ]);
    }
}
