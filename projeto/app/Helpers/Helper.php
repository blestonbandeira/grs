<?php

use Carbon\Carbon;

function getCourseName($courseName, $startDate) {
        

  $palavras = preg_split('/(?=[A-Z])/', $courseName, null, PREG_SPLIT_NO_EMPTY);
  $acronimo = " ";

  foreach ($palavras as $p) {
    $acronimo .= $p[0];
  } 

  $year = Carbon::parse($startDate)->format('y');
  $month = Carbon::parse($startDate)->format('m');
  $acronimo = str_replace('[', '', $acronimo);
  $courseName = $acronimo . '_' . $month . '.' . $year;

  return $courseName;
}

function validaNIF($nif, $ignoreFirst=true) {
	//Limpamos eventuais espaços a mais
	$nif = trim($nif);
	//Verificamos se é numérico e tem comprimento 9
	if (!is_numeric($nif) || strlen($nif)!=9) {
		return false;
	} else {
		$nifSplit = str_split($nif);
		//O primeiro digíto tem de ser 1, 2, 5, 6, 8 ou 9
		//Ou não, se optarmos por ignorar esta "regra"
		if (
			in_array($nifSplit[0], array(1, 2, 5, 6, 8, 9))
			||
			$ignoreFirst
		) {
			//Calculamos o dígito de controlo
			$checkDigit = 0;
			for($i=0; $i<8; $i++) {
				$checkDigit += $nifSplit[$i]*(10-$i-1);
			}
			$checkDigit = 11-($checkDigit % 11);
			//Se der 10 então o dígito de controlo tem de ser 0
			if($checkDigit >= 10) $checkDigit=0;
			//Comparamos com o último dígito
			if ($checkDigit == $nifSplit[8]) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}



?>