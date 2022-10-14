<?php



date_default_timezone_set("Asia/Jakarta");
error_reporting(0);

function getCSRF(){
  $fgc    =   file_get_contents("https://www.instagram.com");
  $explode    =   explode('"csrf_token":"',$fgc);
  $explode    =   explode('"',$explode[1]);
  return $explode[0];
}

function generateUUID($keepDashes = true){
  $uuid = sprintf(
    '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0x0fff) | 0x4000,
    mt_rand(0, 0x3fff) | 0x8000,
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff)
  );
  return $keepDashes ? $uuid : str_replace('-', '', $uuid);
}

function sendDM($userId, $textSend){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://i.instagram.com/api/v1/direct_v2/threads/broadcast/text/');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "recipient_users=%5B%5B".$userId."%5D%5D&action=send_item&client_context=".rand(1111,9999)."b8f1-".rand(1111,9999)."-".rand(1111,9999)."-aee9-".rand(1111,9999)."633d".rand(1111,9999)."&_csrftoken=Y".rand(1111,9999)."j".rand(1111,9999)."ka".rand(1111,9999)."ULIA".rand(1111,9999)."Jp".rand(1111,9999)."5d&text=".urlencode($textSend)."&_uuid=b".rand(1111,9999)."78a-".rand(1111,9999)."-4c33-".rand(1111,9999)."-c8c7948f".rand(1111,9999)."");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

  $headers = array();
  $headers[] = 'X-Ig-Connection-Type: WIFI';
  $headers[] = 'User-Agent: Instagram 35.0.0.20.96 Android (21/5.0; 480dpi; 1080x1920; asus; ASUS_Z00AD; Z00A_1; mofd_v1; in_ID; 95414347)';
  $headers[] = 'Accept-Language: id-ID, en-US';
  $headers[] = "Cookie: ".$cookieInstagram;
  $headers[] = 'Host: i.instagram.com';
  $headers[] = 'X-Fb-Http-Engine: Liger';
  $headers[] = 'Content-Type: application/x-www-form-urlencoded';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $resultB = curl_exec($ch);
  if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
  }
  curl_close($ch);

  return json_encode($resultB, true);
}

// Membuat device id Android
function generateDeviceId(){
  $megaRandomHash = md5(number_format(microtime(true), 7, '', ''));
  return 'android-'.substr($megaRandomHash, 16);
}

// Membuat signed_body untuk UA : Instagram 24.0.0.12.201 Android
function hookGenerate($hook){
  return 'ig_sig_key_version=4&signed_body=' . hash_hmac('sha256', $hook, '5bd86df31dc496a3a9fddb751515cc7602bdad357d085ac3c5531e18384068b4') . '.' . urlencode($hook);
}

// Fungsi request untuk mengirim data
function request($url,$hookdata,$cookie,$method='GET'){
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, "https://i.instagram.com/api".$url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  if($method == 'POST'){
    curl_setopt($ch, CURLOPT_POSTFIELDS, $hookdata);
    curl_setopt($ch, CURLOPT_POST, 1);
  }else{
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  }

  $headers = array();
  $headers[] = "Accept: */*";
  $headers[] = "Content-Type: application/x-www-form-urlencoded";
  $headers[] = 'Cookie2: _ENV["Version=1"]';
  $headers[] = "Accept-Language: en-US";
  $headers[] = "User-Agent: Instagram 24.0.0.12.201 Android (28/9; 320dpi; 720x1280; samsung; SM-J530Y; j5y17ltedx; samsungexynos7870; in_ID;)";
  $headers[] = "Host: i.instagram.com";
  if($cookie !== "0"){
    $headers[] = "Cookie: ".$cookie;
  }
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  $httpcode  = curl_getinfo($ch);
  $header    = substr($result, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
  $body      = substr($result, curl_getinfo($ch, CURLINFO_HEADER_SIZE));

  if(curl_errno($ch)){
    echo 'Error:' . curl_error($ch);
  }
  curl_close ($ch);
  return array($header, $body, $httpcode,$result,$url,$hookdata); // body itu response body
}

echo "Selamat datang di

                _     _   _           _   
               (_)   | | | |         | |  
  ___ _____   ___  __| | | |__   ___ | |_ 
 / __/ _ \ \ / | |/ _` | | '_ \ / _ \| __|
| (_| (_) \ V /| | (_| | | |_) | (_) | |_ 
 \___\___/ \_/ |_|\__,_| |_.__/ \___/ \__|
--------------------------------------------------
";
echo "Selamat datang di bot Instagram
";

echo 'Instagram Username: @';

$usernameIg = trim(fgets(STDIN));

echo 'Instagram Password: '; //please input password

$passwordIg = trim(fgets(STDIN));

$keywordCoy = array("/covid19" => "Data Terbaru Penyebaran Covid19 \n\n",
);




if(!empty($usernameIg) and !empty($passwordIg)){
  $genDevId = generateDeviceId();
  $tryLogin = request('/v1/accounts/login/',hookGenerate('{"phone_id":"'.generateUUID().'","_csrftoken":"'.getCSRF().'","username":"'.$usernameIg.'","adid":"'.generateUUID().'","guid":"'.generateUUID().'","device_id":"'.$genDevId.'","password":"'.$passwordIg.'","login_attempt_count":"0"}'),0,"POST");
  if(!empty(json_decode($tryLogin[1],true)['logged_in_user']['pk'])){
    echo 'Anda berhasil Login' . PHP_EOL;
    $uid = json_decode($tryLogin[1],true)['logged_in_user']['pk'];
    preg_match_all('%set-cookie: (.*?);%',$tryLogin[0],$d);$cookieInstagram = '';
    for($o=0;$o<count($d[0]);$o++){$cookieInstagram.=$d[1][$o].";";}
    // Menyimpan cookie ke file cookie.txt
    $fwriteFunc = fopen('cookie.txt', 'w');
    fwrite($fwriteFunc, $cookieInstagram);
    fclose($fwriteFunc);

    while(true){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://i.instagram.com/api/v1/direct_v2/inbox/?visual_message_return_type=unseen&thread_message_limit=10&persistentBadging=true&limit=5&fetch_reason=manual_refresh');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
      curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

      $headers = array();
      $headers[] = 'X-Ig-Connection-Type: WIFI';
      $headers[] = 'User-Agent: Instagram 35.0.0.20.96 Android (21/5.0; 480dpi; 1080x1920; asus; ASUS_Z00AD; Z00A_1; mofd_v1; in_ID; 95414347)';
      $headers[] = 'Accept-Language: id-ID, en-US';
      $headers[] = "Cookie: ".$cookieInstagram;
      $headers[] = 'Host: i.instagram.com';
      $headers[] = 'X-Fb-Http-Engine: Liger';
      $headers[] = 'Content-Type: application/x-www-form-urlencoded';
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      $result = curl_exec($ch);
      if (curl_errno($ch)) {
          echo 'Error:' . curl_error($ch);
      }
      curl_close($ch);

      foreach (json_decode($result, true)['inbox']['threads'] as $key => $value) {
        if(json_decode($result, true)['inbox']['threads'][$key]['read_state'] == '1'){
          if(json_decode($result, true)['inbox']['threads'][$key]['items'][0]['item_type']  ==  'text'){
            echo '['.date("d-M-Y").' '.date("h:i:s").'] @'.json_decode($result, true)['inbox']['threads'][$key]['thread_title'].' Mengirim sesuatu'.PHP_EOL;
            if(!empty($keywordCoy[strtolower(trim(json_decode($result, true)['inbox']['threads'][$key]['items'][0]['text']))])){
              echo '['.date("d-M-Y").' '.date("h:i:s").'] @'.json_decode($result, true)['inbox']['threads'][$key]['thread_title'].' Menggunakan keyword "/help"'.PHP_EOL;
              $userIdReply  = json_decode($result, true)['inbox']['threads'][$key]['items'][0]['user_id'];
              
             
$url = "https://api.kawalcorona.com/indonesia/";

$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);

$result = json_decode($response);

$Confirmed = $result[0]->positif;

$Deaths = $result[0]->meninggal;

$Recovered = $result[0]->sembuh;

$datetimeString = $result[1]->lastupdate;
$Last_Update = date("l d F Y, H:i:s", strtotime($datetimeString));


$data = file_get_contents('https://corona.lmao.ninja/v2/jhucsse');                                                   
$covid = json_decode($data);                                                                                                                                                                                                                                                                                                                                   

$jam = $covid[166]->updatedAt;
$country = $covid[166]->country;
              
              
              $replyText  = "Data Terbaru Penyebaran Covid19 di ".$country.":"."\n\n-Terkonfirmasi: ".$Confirmed."\n-Sembuh: ".$Recovered."\n-Meninggal: ".$Deaths."\n\n Update terakhir: \n ".$jam;
			  

              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, 'https://i.instagram.com/api/v1/direct_v2/threads/broadcast/text/');
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
              curl_setopt($ch, CURLOPT_POSTFIELDS, "recipient_users=%5B%5B".$userIdReply."%5D%5D&action=send_item&client_context=".rand(1111,9999)."b8f1-".rand(1111,9999)."-".rand(1111,9999)."-aee9-".rand(1111,9999)."633d".rand(1111,9999)."&_csrftoken=Y".rand(1111,9999)."j".rand(1111,9999)."ka".rand(1111,9999)."ULIA".rand(1111,9999)."Jp".rand(1111,9999)."5d&text=".urlencode($replyText)."&_uuid=b".rand(1111,9999)."78a-".rand(1111,9999)."-4c33-".rand(1111,9999)."-c8c7948f".rand(1111,9999)."");
              curl_setopt($ch, CURLOPT_POST, 1);
              curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

              $headers = array();
              $headers[] = 'X-Ig-Connection-Type: WIFI';
              $headers[] = 'User-Agent: Instagram 35.0.0.20.96 Android (21/5.0; 480dpi; 1080x1920; asus; ASUS_Z00AD; Z00A_1; mofd_v1; in_ID; 95414347)';
              $headers[] = 'Accept-Language: id-ID, en-US';
              $headers[] = "Cookie: ".$cookieInstagram;
              $headers[] = 'Host: i.instagram.com';
              $headers[] = 'X-Fb-Http-Engine: Liger';
              $headers[] = 'Content-Type: application/x-www-form-urlencoded';
              curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

              $resultB = curl_exec($ch);
              if (curl_errno($ch)) {
                  echo 'Error:' . curl_error($ch);
              }
              curl_close($ch);

            }else{
              echo '['.date("d-M-Y").' '.date("h:i:s").'] @'.json_decode($result, true)['inbox']['threads'][$key]['thread_title'].' Tidak menggunakan keyword' . PHP_EOL;
            }


          }else{
            echo '['.date("d-M-Y").' '.date("h:i:s").'] @'.json_decode($result, true)['inbox']['threads'][$key]['thread_title'].' Tidak ada keyword' . PHP_EOL;
          }
        }else{
          echo '['.date("d-M-Y").' '.date("h:i:s").'] @'.json_decode($result, true)['inbox']['threads'][$key]['thread_title'].' DM sampah |'.strtolower(trim(json_decode($result, true)['inbox']['threads'][$key]['items'][0]['text'])).'' . PHP_EOL;
        }

      }
      sleep(1);
    }
  }else{
    echo "Ada yang salah dengan akunmu! \n". print_r($tryLogin);
  }
}else{
  echo "Jangan ada yang kosong!\n";
}

?>

