<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RsClass extends Model
{    
    public function course() {
        return $this->hasOne('\App\Course');
    }

    public function courseName() {
        return $this->belongsTo('\App\CourseName');
    }

    public function applicants() {
        return $this->hasMany('\App\Applicant');
    }

    public function user() {
        return $this->belongsTo ('\App\User');
    }

    public function classState() {
        return $this->belongsTo ('\App\ClassState');
    }
    
}
