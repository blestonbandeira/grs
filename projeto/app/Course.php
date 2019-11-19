<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
 
    public function rsClasses() {
        return $this->belongsTo('\App\RsClass');
      }

    public function courseName() {
        return $this->belongsTo('\App\CourseName', 'course_name_id');
    }

    public function courseType() {
        return $this->belongsTo('\App\CourseType', 'course_type_id');
    }

    public function regime() {
        return $this->belongsTo('\App\Regime', 'regime_id');
    }

    public function minimumQualification() {
        return $this->belongsTo('\App\MinimumQualification', 'minimum_qualification_id');
    }
}
