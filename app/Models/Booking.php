<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'user_id',            
        'class_schedule_id',  
        'status',             // Status: pending, confirmed, rejected
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
}
