<?php

use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

function getCourseName(string $courseName, $startDate) {
        

  $palavras = preg_split('/(?=[A-Z])/', $courseName);
  $acronimo = "";

  foreach ($palavras as $p) {
    $acronimo .= $p[0];
  } 

  $startDateSeparated = explode("-", $startDate);
  $fullYear = $startDateSeparated[0];
  $year = Carbon::parse($fullYear)->format('y');
  $month = $startDateSeparated[1];
  $courseName = $acronimo . '_' . $month . '.' . $year;
  return $courseName;
}

?>