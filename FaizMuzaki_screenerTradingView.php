<?php
echo "Time Frame use 60/240 !\n\n";
echo "Time Frame(Minute) ? : ";
$tf = trim(fgets(STDIN));
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://symbol-search.tradingview.com/symbol_search/?text=TETHERUS%20PERPETUAL%20FUTURES&hl=1&exchange=BINANCE&lang=en&type=&domain=production');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'Authority: symbol-search.tradingview.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'Accept-Language: en-US,en;q=0.9,id;q=0.8';
$headers[] = 'Cookie: _ga=GA1.2.1979164775.1602002679; sessionid=maes53u0d3bdga4l9dvvkpzix5d5wlqy; etg=undefined; cachec=undefined; __gads=ID=fae3400f8209c235:T=1602040298:S=ALNI_MYg_tUf3Rf7cLHyGeDkjBi3Dld4nA; _gaexp=GAX1.2.fpFuwImMQG6RsT0bYB4ayQ.18605.2; _gid=GA1.2.1163580367.1603555484; _sp_ses.cf1a=*; _sp_id.cf1a=81aea662-37f0-4159-9568-72c1862bc221.1602002677.111.1604128155.1604124567.d0e70c2a-86ce-4378-9f1b-1e6cf1c5edf5';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = json_decode(curl_exec($ch));
echo "Name|RSI|Stoch.K|Stoch.D|EMA 100 \n";

foreach ($result as $key ) {
	$name = $key->symbol;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://scanner.tradingview.com/crypto/scan');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, '1');
	curl_setopt($ch, CURLOPT_POSTFIELDS, '{"symbols":{"tickers":["BINANCE:'.$name.'"],"query":{"types":[]}},"columns":["RSI|'.$tf.'","Stoch.K|'.$tf.'","Stoch.D|'.$tf.'","EMA100|'.$tf.'"]}');

	$headers = array();
	$headers[] = 'Authority: scanner.tradingview.com';
	$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36';
	$headers[] = 'Content-Type: application/json';
	$headers[] = 'Origin: https://id.tradingview.com';
	$headers[] = 'Referer: https://id.tradingview.com/';
	$headers[] = 'Accept-Language: en-US,en;q=0.9,id;q=0.8';
	$headers[] = 'Cookie: _ga=GA1.2.1979164775.1602002679; __gads=ID=fae3400f8209c235:T=1602040298:S=ALNI_MYg_tUf3Rf7cLHyGeDkjBi3Dld4nA; sessionid=08x26j4ey8v27kk869kvj7bdlny74pvc; tv_ecuid=f712ab2d-92b4-4e10-8e4b-d065de1eceaa; etg=f712ab2d-92b4-4e10-8e4b-d065de1eceaa; cachec=f712ab2d-92b4-4e10-8e4b-d065de1eceaa; _gid=GA1.2.1279816592.1612340727; _sp_ses.cf1a=*; _sp_id.cf1a=81aea662-37f0-4159-9568-72c1862bc221.1602002677.624.1612758833.1612748331.0beb38f1-88c7-4db9-b395-e9151e4b2021; _gat_gtag_UA_24278967_1=1';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$result = json_decode(curl_exec($ch));
		echo $result->data[0]->s."           | ".$result->data[0]->d[0]."  |  ".$result->data[0]->d[1]."  | ".$result->data[0]->d[2]."  | ".$result->data[0]->d[3]."\n";
}
?>
