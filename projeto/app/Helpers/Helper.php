<?php

use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

function getCourseName(CourseName $courseName, Date $startDate) {
        
  $startDate = Carbon::parse($startDate)->format('MM-YY');
  $palavras = explode(" ", $courseName);
  $acronimo = "";
  
  foreach ($palavras as $p) {
    $acronimo .= $p[0];
  }

  $courseName = $acronimo . '_' . $startDate;
  return $courseName;
}

?>