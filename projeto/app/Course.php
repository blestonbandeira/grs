<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function rsClasses() {
        return $this->belongsTo('\App\RsClass');
      }

    public function courseName() {
        return $this->belongsTo('\App\CourseName');
    }
}
