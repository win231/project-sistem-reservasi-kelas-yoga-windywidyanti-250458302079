<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table = 'instructors';
    
    protected $fillable = [
        'user_id',
        'name',
        'bio',
        'profile_image_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
