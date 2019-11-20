<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{


  public function courses() {
      return $this->belongsTo('\App\Course', 'course_type_id');
    }
  
}
