<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'class_type_id',
        'difficulty_level'
    ];

    public function type()
    {
        return $this->belongsTo(ClassType::class, 'class_type_id');
    }

    public function schedules()
    {
        return $this->hasMany(ClassSchedule::class, 'class_id');
    }
}
