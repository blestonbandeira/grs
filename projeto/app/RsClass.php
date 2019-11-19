<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RsClass extends Model
{    
    public function course() {
        return $this->hasOne('\App\Course');
    }

    public function courseName() {
        return $this->hasOne('\App\CourseName');
    }

    public function applicants() {
        return $this->hasMany('\App\Applicant');
    }
}
