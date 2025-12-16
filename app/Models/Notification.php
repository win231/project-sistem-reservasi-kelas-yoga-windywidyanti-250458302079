<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function scopeUnread($query)
    {
        return $query->where('status', 'unread');
    }
    // Scope untuk filter notifikasi reminder
    public function scopeReminder($query)
    {
        return $query->where('type', 'reminder');
    }
    // Scope untuk filter notifikasi general
    public function scopeGeneral($query)
    {
        return $query->where('type', 'general');
    }
    // Scope untuk filter notifikasi cancellation
    public function scopeCancellation($query)
    {
        return $query->where('type', 'cancellation');
    }
    // Scope untuk filter notifikasi waitlist_success
    public function scopeWaitlistSuccess($query)
    {
        return $query->where('type', 'waitlist_success');
    }

    // Relasi ke user yang menerima notifikasi
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Relasi ke booking terkait 
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'related_booking_id');
    }
}
