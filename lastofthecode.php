<?php

function regis()
{

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    $length = 10;
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }


    $url = "https://enapi.gmlikes.com/login/regist";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Connection: keep-alive",
        "sec-ch-ua: \"Google Chrome\";v=\"93\", \" Not;A Brand\";v=\"99\", \"Chromium\";v=\"93\"",
   "sec-ch-ua-mobile: ?0",
   "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36",
   "sec-ch-ua-platform: \"Windows\"",
   "content-type: application/x-www-form-urlencoded",
   "Accept: */*",
   "Origin: https://www.gmlikes.com",
   "Sec-Fetch-Site: same-site",
   "Sec-Fetch-Mode: cors",
   "Sec-Fetch-Dest: empty",
   "Referer: https://www.gmlikes.com/",
   "Accept-Language: en-US,en;q=0.9",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$email = urlencode('m1337.'.$randomString.'@gmail.com');
$reff = 'KnrUew1R'; // Reff lu
$password = 'memek123';
$pin = urlencode('1,1,1,0'); //pin nya default 1110
$data = "username=$email&word=$pin&sc=$reff&prop=1&password=$password&confirm=$password&timestamp=1632104813&user=0&sign=0be263a4299cd978a4bcdc0fb4932be4";



curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
$server = json_decode($resp,1);
curl_close($curl);


    if ($server['succ'] === true)
    {
        echo 'sukses  - '.$server['data']['name'].  PHP_EOL;
        file_put_contents('email.txt',urldecode($email) . "\n" , FILE_APPEND);

    } else
    {
        echo "error create" . PHP_EOL;
    }

}

echo "HARAP BACKUP TERLEBIH DAHULU SEHABIS KELAR NGEBOT\n=========================================================================" . PHP_EOL;

for ($i=0;$i<45;$i++)
{
     regis();
    sleep(3);

}
