<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function category() {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function students() {
        return $this->hasMany(\App\Models\User::class, 'student_id');
    }

    public function facilitators() {
        return $this->hasMany(\App\Models\User::class, 'facilitator_id');
    }
}
