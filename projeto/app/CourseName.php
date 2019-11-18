<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseName extends Model
{
    public function rsClasses() {
      return $this->belongsTo('\App\RsClass');
    }

    public function course() {
      return $this->hasOne('\App\Course');
    }


}
