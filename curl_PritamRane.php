<?php

// Initializing curl
$curl = curl_init();
	
// Sending GET request to reqres.in
// server to get JSON data
curl_setopt($curl, CURLOPT_URL,
	"https://reqres.in/api/users?page=2");
	
// Telling curl to store JSON
// data in a variable instead
// of dumping on screen
curl_setopt($curl,
	CURLOPT_RETURNTRANSFER, true);
	
// Executing curl
$response = curl_exec($curl);

// Checking if any error occurs
// during request or not
if($e = curl_error($curl)) {
	echo $e;
} else {
	
	// Decoding JSON data
	$decodedData =
		json_decode($response, true);
		
	// Outputing JSON data in
	// Decoded form
	var_dump($decodedData);
}

// Closing curl
curl_close($curl);
?>
