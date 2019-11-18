<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function rsClasses() {
        return $this->belongsToMany('\App\RsClass');
      }

    public function courseName() {
        return $this->hasOne('\App\CourseName');
    }
}
