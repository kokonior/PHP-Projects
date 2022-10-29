<?php
set_time_limit(0);
echo "URL : ";
$url = trim(fgets(STDIN));
$content = file_get_contents($url);
$isi = preg_match_all("/\"video_url\":\"(.*?)\"/", $content, $link) || preg_match_all("/\"display_url\":\"(.*?)\"/", $content, $link);
function pecah($str){
	$file = utf8_decode(implode(json_decode('["'.$str.'"]')));
	return $file;
}
if(strpos($link[1][0],'.mp4') !== false){
	for($i = 0; $i < count($link[1]); $i++){	
		$donlot = pecah($link[1][$i]);
		$tgl = date('Ymd_His');
		$vid = "VID_$tgl$i.mp4";
		$op = fopen($vid, "w");
		$ch = curl_init($donlot);
		curl_setopt($ch, CURLOPT_FILE, $op);
		$data = curl_exec($ch);
		curl_close($ch);
		fclose($op);
	}
}elseif (strpos($link[1][1],'.jpg') !== false){
	for($i = 1; $i < count($link[0]); $i++){	
		$donlot = pecah($link[1][$i]);
		$tgl = date('Ymd_His');
		$img = "IMG_$tgl$i.jpg";
		$op = fopen($img, "w");
		$ch = curl_init($donlot);
		curl_setopt($ch, CURLOPT_FILE, $op);
		$data = curl_exec($ch);
		curl_close($ch);
		fclose($op);
	}
}else{
	echo "Gagal Mendapatkan Foto/Video, Pastikan akun bukan private\n";
}
?>