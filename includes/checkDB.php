<?php

/* Funzione di controllo che estende la fz empty() considerando "0" un valore NON nullo */
function emptyWeapon($tmp)
{
	if (!empty($tmp) || $tmp == 0)
		return false;
	else
		return true;
}

function checkId($tmp) {
	if ($tmp >= 0)
		return $tmp;
	else
		return -1;
}

function checkDateInput($tmp) {
	if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $tmp) != 1)
		return -1;
	else
		return $tmp;
}

function checkWeapon($tmp) {
	if (strcmp($tmp, "0") == 0)
		return 0;
	else if (strcmp($tmp, "1") == 0)
		return 1;
	else if (strcmp($tmp, "2") == 0)
		return 2;
	else
		return -1;
}

function checkPsw($tmp) {
	if (strpos($tmp, ' ') === true || strlen($tmp) < 8) {
		return -1;
	}
	else {
		return $tmp;
	}
}


function checkPsw_hash($tmp) {
	if (strpos($tmp, ' ') === true || strlen($tmp) < 8)
	return -1;
	else
	return password_hash($tmp, PASSWORD_DEFAULT);
}

function checkName($tmp) {
	if (preg_match('/^[A-Za-z\s]+$/',$tmp) != 1)
	return -1;
	else
	return $tmp;
}

function checkCAP($tmp) {
	if (preg_match('/^\d{5}$/',$tmp) != 1)
	return -1;
	else
	return $tmp;
}

function checkPhone($tmp) {
	if (preg_match('/^([+]39)?((3[\d]{2})([ ,\-,\/]){0,1}([\d, ]{6,9}))|(((0[\d]{1,4}))([ ,\-,\/]){0,1}([\d, ]{5,10}))$/',$tmp) != 1)
	return -1;
	else
	return $tmp;
}

function checkGender($tmp) {
	if (strcmp($tmp, "male") == 0)
		return 0;
	else if (strcmp($tmp, "female") == 0)
		return 1;
	else
		return -1;
}

function checkAgon($tmp) {
	if (strcmp($tmp, "no") == 0)
		return 1;
	else if (strcmp($tmp, "yes") == 0)
		return 0;
	else
		return -1;
}

function checkCodFisc($tmp)
{
	if( $tmp === '' )  return '';
	if( strlen($tmp) != 16 )
	return -1;
	$tmp = strtoupper($tmp);
	if( preg_match("/^[A-Z0-9]+\$/", $tmp) != 1 ){
		return -1;
	}
	$s = 0;
	for( $i = 1; $i <= 13; $i += 2 ){
		$c = $tmp[$i];
		if( strcmp($c, "0") >= 0 and strcmp($c, "9") <= 0 )
		$s += ord($c) - ord('0');
		else
		$s += ord($c) - ord('A');
	}
	for( $i = 0; $i <= 14; $i += 2 ){
		$c = $tmp[$i];
		switch( $c ){
			case '0':  $s += 1;  break;
			case '1':  $s += 0;  break;
			case '2':  $s += 5;  break;
			case '3':  $s += 7;  break;
			case '4':  $s += 9;  break;
			case '5':  $s += 13;  break;
			case '6':  $s += 15;  break;
			case '7':  $s += 17;  break;
			case '8':  $s += 19;  break;
			case '9':  $s += 21;  break;
			case 'A':  $s += 1;  break;
			case 'B':  $s += 0;  break;
			case 'C':  $s += 5;  break;
			case 'D':  $s += 7;  break;
			case 'E':  $s += 9;  break;
			case 'F':  $s += 13;  break;
			case 'G':  $s += 15;  break;
			case 'H':  $s += 17;  break;
			case 'I':  $s += 19;  break;
			case 'J':  $s += 21;  break;
			case 'K':  $s += 2;  break;
			case 'L':  $s += 4;  break;
			case 'M':  $s += 18;  break;
			case 'N':  $s += 20;  break;
			case 'O':  $s += 11;  break;
			case 'P':  $s += 3;  break;
			case 'Q':  $s += 6;  break;
			case 'R':  $s += 8;  break;
			case 'S':  $s += 12;  break;
			case 'T':  $s += 14;  break;
			case 'U':  $s += 16;  break;
			case 'V':  $s += 10;  break;
			case 'W':  $s += 22;  break;
			case 'X':  $s += 25;  break;
			case 'Y':  $s += 24;  break;
			case 'Z':  $s += 23;  break;
			/*. missing_default: .*/
		}
	}
	if( chr($s%26 + ord('A')) != $tmp[15] )
	return -1;

	return $tmp;
}
?>
