<?php
echo "Username (tanpa @gmail.com): ";
$username = trim(fgets(STDIN));
while(true) {
            
    
$data = file_get_contents("https://wirkel.com/data.php?qty=1&domain=gmail.com");
$datas = json_decode($data);
$nm = $datas->result[0]->firstname;
$email = $username.'%2B'.urut(4);

            $headers = array();
			$headers[] = 'Authority: frostbitechoconutcashew.glicowings.co.id';
			$headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"88\", \"Google Chrome\";v=\"88\", \";Not A Brand\";v=\"99\"';
			$headers[] = 'Accept: */*';
			$headers[] = 'X-Csrf-Token: 9NY92thDAMVSXgSzLAr-zPmy7_912as6f6Ag4rBmJeOTgkS4gnVPkBoIdYNbO4qryIefsx275Ek2lG2x2T5Xlw==';
			$headers[] = 'X-Requested-With: XMLHttpRequest';
			$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
			$headers[] = 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36';
			$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
			$headers[] = 'Origin: https://frostbitechoconutcashew.glicowings.co.id';
			$headers[] = 'Sec-Fetch-Site: same-origin';
			$headers[] = 'Sec-Fetch-Mode: cors';
			$headers[] = 'Sec-Fetch-Dest: empty';
			$headers[] = 'Referer: https://frostbitechoconutcashew.glicowings.co.id/';
			$headers[] = 'Accept-Language: en-US,en;q=0.9';
			$headers[] = 'Cookie: _csrf=e95374b260dc864dc3f694635d7950519ff3387ef54767845e4827c87d96577ea%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22gTybZ6OUHVq0w1tg15pLhbOsI4MSiXrt%22%3B%7D; _gcl_au=1.1.978293036.1626360216; _fbp=fb.2.1626360216242.1259230292';

			$gas = curl('https://frostbitechoconutcashew.glicowings.co.id/site/submit', '_csrf=9NY92thDAMVSXgSzLAr-zPmy7_912as6f6Ag4rBmJeOTgkS4gnVPkBoIdYNbO4qryIefsx275Ek2lG2x2T5Xlw%3D%3D&RedeemerForm%5Bname%5D='.$nm.'&RedeemerForm%5Bgender%5D=&RedeemerForm%5Bgender%5D=2&RedeemerForm%5Bemail%5D='.$email.'%40gmail.com', $headers);
			echo "$gas[1]\n";


    }

function curl($url,$post,$headers,$follow=false,$method=null)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		if ($follow == true) curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		if ($method !== null) curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		if ($headers !== null) curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		if ($post !== null) curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		$result = curl_exec($ch);
		$header = substr($result, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
		$body = substr($result, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
		preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
		$cookies = array();
		foreach($matches[1] as $item) {
		  parse_str($item, $cookie);
		  $cookies = array_merge($cookies, $cookie);
		}
		return array (
		$header,
		$body,
		$cookies
		);
	}
function urut($length) 
    {
        $str = "";
        
            $characters = array_merge(range('0','9'),range('a','z'));
        
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
?>
