<?php
function generate_wallet($type){
	$curl = curl_init();
	curl_setopt_array($curl, array(
	CURLOPT_URL => 'http://159.65.130.204:8000/wallet?type='.$type,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'GET',
	CURLOPT_HTTPHEADER => array(
		'Content-Type: application/json'
	),
	));
	$response = curl_exec($curl);
	curl_close($curl);
	$array = json_decode($response,true);
	return array("address"=>$array["address"],"pk"=>$array["pk"]);
}
?>