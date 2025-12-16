<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    protected $fillable = [
        'user_id',            
        'class_schedule_id',  
        'status',             // Status: confirmed, rejected, completed
    ];

    // Relasi: Booking milik User (Member)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Booking punya Jadwal Kelas
    public function classSchedule(): BelongsTo
    {
        return $this->belongsTo(ClassSchedule::class);
    }

    // Relasi: Booking punya Review
    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }

    // Static method untuk update booking yang sudah selesai
    public static function updateCompletedBookings()
    {
        return self::where('status', 'confirmed')
            ->whereHas('classSchedule', function ($query) {
                $query->where('end_time', '<', now());
            })
            ->update(['status' => 'completed']);
    }
}
