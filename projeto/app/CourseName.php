<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseName extends Model
{
   
    
    public function rsClasses() {
      return $this->belongsTo('\App\RsClass', 'course_name_id');
    }

    public function courses() {
      return $this->belongsTo('\App\Course', 'course_name_id');
    }


}
