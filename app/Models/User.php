<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function class() {
        return $this->belongsTo(\App\Models\StudentClass::class, 'student_id');
    }

    public function studentCourseInfo() {
        return $this->hasOne(\App\Models\StudentCourseInformation::class, 'student_id');
    }

    public function studentCourses() {
        return $this->hasMany(\App\Models\Course::class, 'student_id');
    }

    public function facilitatorCourses() {
        return $this->hasMany(\App\Models\Course::class, 'facilitator_id');
    }
}
