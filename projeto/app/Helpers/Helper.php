<?php

function getCourseName(CourseName $courseName) {
        

  $palavras = explode(" ", $courseName);
  $acronimo = "";
  
  foreach ($palavras as $p) {
    $acronimo .= $p[0];
  }
  return $acronimo;
}

?>