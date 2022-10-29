<?php
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
echo "source:yankes.kemkes.go.id
time ".date("h:i:sa")."\n";
	$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://yankes.kemkes.go.id/app/siranap/rumah_sakit?jenis=1&propinsi=32prop&kabkota=');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		$headers = array();
		$headers[] = 'Host: yankes.kemkes.go.id';
		$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36';
		$headers[] = 'Sec-Fetch-Site: same-origin';
		$headers[] = 'Sec-Fetch-Dest: document';
		$headers[] = 'Referer: https://yankes.kemkes.go.id/app/siranap/rumah_sakit?jenis=1&propinsi=18prop&kabkota=1871';
		$headers[] = 'Accept-Language: en-US,en;q=0.9';
		$headers[] = 'Connection: close';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$pisah = explode('<div class="col-md-10 offset-md-1">', $result);
$content = strip_tags($pisah[1]);
$output = preg_replace('!\s+!', ' ', $content);
header('Content-Type: application/json');

$explode1 = explode('Bed Detail', $output);
foreach ($explode1 as $data) {
	preg_match('/(.*?) INFO/', $data, $namars);
	preg_match('/&nbsp &nbsp (.*?) /', $data,$nomorrs);
	preg_match('/diupdate(.*?) yang lalu/', $data,$lastupdate);
	preg_match('/INFO IGD KHUSUS COVID(.*?) diupdate/', $data,$bedrs);
	if($namars[1]== "") {
		echo "";
	}else{
		print_r(array('nama_rs' => $namars[1],
				'nomor_rs' => $nomorrs[1],
				'last_update' => $lastupdate[1],
				'kasur_tersedia' => $bedrs[1],
  			));
	}	
}

?>
