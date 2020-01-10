<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = "classes";

    public function schedule() {
        return $this->hasOne(\App\Models\Schedule::class);
    }
}
