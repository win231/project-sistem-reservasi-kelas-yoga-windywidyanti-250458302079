<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'instructor_id',
        'location',
        'location_image',
        'start_time',
        'end_time',
        'max_capacity',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function classType()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function instructorData()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id', 'user_id');
    }

    public function bookings() 
    {
        return $this->hasMany(Booking::class);
    }
}
