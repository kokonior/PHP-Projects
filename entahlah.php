
 
while(1) {
;
	}
	foreach ($__setting as $sett) {
		$data = http_request('https://hd.c.mi.com/'.$sett[0].'/eventapi/api/netflix/gettoken?uid='.$__uid.'&vcode='.$sett[1].'&imei='.$imei);
		$data = json_decode($data, true);
		if (isset($data['msg']) && $data['msg'] == 'Success') {
			$__if_valid = $data['data']['redirect_url'] . '|' . $imei . '|' . $sett[2] . PHP_EOL;
			file_put_contents("valid.txt", $__if_valid, FILE_APPEND);
			echo 'VALID => ' . $__if_valid;
		} else if(isset($data['code']) && $