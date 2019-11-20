<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassState extends Model
{
    public function rsClasses() {
        return $this->belongsTo('\App\RsClass');
    }
}
