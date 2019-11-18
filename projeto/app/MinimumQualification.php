<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinimumQualification extends Model
{
    public function courses() {
        return $this->hasOne('\App\Course');
      }
}
