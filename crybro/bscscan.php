<?php
function curl($url, $data = null, $headers = null) {
	$ch = curl_init();
	$options = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 30,
        CURLOPT_FOLLOWLOCATION => true,
	);
	if ($data != "") {
		$options[CURLOPT_POST] = true;
		$options[CURLOPT_POSTFIELDS] = $data;
	}
	if ($headers != "") {
		$options[CURLOPT_HTTPHEADER] = $headers;
	}
	curl_setopt_array($ch, $options);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
echo "Smart Contract : ";
$s_contract = trim(fgets(STDIN));
$list = file_get_contents('address.list');
$listed = explode("\n", str_replace("\r", "", $list));
for($i=0; $i < count($listed); $i++){
    $address = $listed[$i];
    
    $url = 'https://api.bscscan.com/api';
    $data = 'module=account&action=tokenbalance&contractaddress='.$s_contract.'&address='.$address.'&tag=latest&apikey=YOURAPIKEYHERE';
    $balance = json_decode(curl($url, $data), true);
    if ($balance['result'] == 0){
        $hasil = $address.' Balance '.$balance['result'].PHP_EOL;
    }
    else {
		$balance = $balance['result'] / pow(10, 18);
        $hasil = $address.' Balance '.$balance.PHP_EOL;
    }
    echo $hasil;
}
echo "Done";
?>
