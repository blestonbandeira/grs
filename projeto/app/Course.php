<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function rsClasses() {
        return $this->belongsToMany('\App\RsClass');
      }
}
