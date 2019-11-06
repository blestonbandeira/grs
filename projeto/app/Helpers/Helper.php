<?php

use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

function getCourseName(string $courseName, $startDate) {
        
  $startDate = Carbon::parse($startDate);
  $palavras = explode(" ", $courseName);
  $acronimo = "";
  
  foreach ($palavras as $p) {
    $acronimo .= $p[0];
  }

  $courseName = $acronimo . '_' . $startDate;
  return $courseName;
}

?>