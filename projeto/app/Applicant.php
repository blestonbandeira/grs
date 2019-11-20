<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{    
    public function rsClass() {
        return $this->belongsTo('\App\RsClass');
    }

    public function category() {
        return $this->belongsTo('\App\Category');
    }
}
