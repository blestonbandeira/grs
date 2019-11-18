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

    public function courseType() {
        return $this->belongsTo('\App\CourseType');
    }

    public function regime() {
        return $this->belongsTo('\App\Regime');
    }

    public function minimumQualification() {
        return $this->belongsTo('\App\MinimumQualification');
    }
}
