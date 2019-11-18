<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseName extends Model
{
    public function rsClasses() {
      return $this->belongsTo('\App\RsClass');
    }

<<<<<<< HEAD
    public function course() {
      return $this->hasOne('\App\Course');
=======
    public function courses() {
      return $this->belongsTo('\App\Course');
>>>>>>> 5a0d07531df35d1d970e970ee0a07711ee975b7f
    }


}
