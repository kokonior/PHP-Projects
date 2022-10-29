<?php
	
// Function to generate password from
// given string
function get_password($str, $len = 0) {
	
	// Variable $pass to store password
	$pass = "";
	
	// Variable $str_length to store
	// length of the given string
	$str_length = strlen($str);

	// Check if the $len is not provided
	// or $len is greater than $str_length
	// then assign $str_length to $len
	if($len == 0 || $len > $str_length){
		$len = $str_length;
	}

	// Iterate $len times so that the
	// resulting string's length is
	// equal to $len
	for($i = 0; $i < $len; $i++){
		
		// Concatenate random character
		// from $str with $pass
		$pass .= $str[rand(0, $str_length)];
	}
	return $pass;
}


// Print password of length 5 from
// the given string
$str = "GeeksForGeeks";
echo get_password($str, 5) . "\n<br/>";

// Print password of length 15 from
// the given string
$str =
"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
echo get_password($str, 15) ."\n<br/>";

// Print password if the length
// is not given
echo get_password($str) . "\n<br/>";

?>
