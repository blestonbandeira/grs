<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseName extends Model
{
    public function rsClasses() {
      return $this->belongsToMany('\App\RsClass');
    }


}
