<?php
date_default_timezone_set('Asia/Jakarta');
class Tada
{
    public function requestOTP($number, $session, $device)
    {
        $data = '{"phone_number":"+'.$number.'","country":"ID","sessId":"'.$session.'","senderType":"sms"}';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api-int.gift.id/v1/users/otp/request');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = 'Host: api-int.gift.id';
        $headers[] = 'Auth: basic';
        $headers[] = 'Authorization: Basic b3BQNGtFU1pITE1TeGw1YU9nR2g1S3BqbDoxaUhXcUY1NXBDNnpkS3VRTmdWUFc0SjVsVFNoN1pLMHd0WENFeWZqVEJscDlqQTlXMg==';
        $headers[] = 'X-Vnd-App-Platform: Android';
        $headers[] = 'X-Vnd-App-Name: TADA Wallet';
        $headers[] = 'X-Vnd-App-Version: 4.12.2';
        $headers[] = 'X-Vnd-App-Use-Decimal: true';
        $headers[] = 'X-Vnd-App-Device-Name: google Pixel 2';
        $headers[] = 'X-Vnd-App-Device-Id: '.$device;
        $headers[] = 'X-Vnd-Build-Code: 1BMN2AQFJ4U541T4-411';
        $headers[] = 'Content-Type: application/json; charset=utf-8';
        $headers[] = 'User-Agent: okhttp/4.9.0';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return json_encode(['result' => json_decode($result), 'device' => $device, 'session' => $session]);
    }

    public function register($number, $session, $secret, $otp, $device)
    {
        $data = '{"phone_number": "'.$number.'", "sessId": "'.$session.'", "secret": "'.$secret.'", "otp_token": "'.$otp.'", "country": "ID"}';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api-int.gift.id/v1/users/otp/register');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = 'Host: api-int.gift.id';
        $headers[] = 'Auth: basic';
        $headers[] = 'Authorization: Basic b3BQNGtFU1pITE1TeGw1YU9nR2g1S3BqbDoxaUhXcUY1NXBDNnpkS3VRTmdWUFc0SjVsVFNoN1pLMHd0WENFeWZqVEJscDlqQTlXMg==';
        $headers[] = 'X-Vnd-App-Platform: Android';
        $headers[] = 'X-Vnd-App-Name: TADA Wallet';
        $headers[] = 'X-Vnd-App-Version: 4.12.2';
        $headers[] = 'X-Vnd-App-Use-Decimal: true';
        $headers[] = 'X-Vnd-App-Device-Name: google Pixel 2';
        $headers[] = 'X-Vnd-App-Device-Id: '.$device;
        $headers[] = 'X-Vnd-Build-Code: 1BMN2AQFJ4U541T4-411';
        $headers[] = 'Content-Type: application/json; charset=utf-8';
        $headers[] = 'User-Agent: okhttp/4.9.0';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }
    public function claimReff($number)
    {
        $data = '{"referralCode": "yacob17o02e","phone":"+'.$number.'","country":"ID","registrationData":{"phone":"+'.$number.'","countryCode":"ID","data": [] } }';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://membership.usetada.com/api/referral/add');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = 'Authority: membership.usetada.com';
        $headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"92\", \" Not A;Brand\";v=\"99\", \"Google Chrome\";v=\"92\"';
        $headers[] = 'Accept: application/json, text/plain, */*';
        $headers[] = 'X-Csrf-Token: PLwQOeAD-MNFfWVLMmVeLQEvJwk5Xbyrk1wk';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?1';
        $headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 6.0.1; Moto G (4)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Mobile Safari/537.36';
        $headers[] = 'Content-Type: application/json;charset=UTF-8';
        $headers[] = 'Origin: https://membership.usetada.com';
        $headers[] = 'Sec-Fetch-Site: same-origin';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Accept-Language: id,en-US;q=0.9,en;q=0.8,und;q=0.7';
        $headers[] = 'Cookie: _csrf=xkyqC_8uo6vykUM1POBG07tD; _gcl_au=1.1.757271605.1629053708; _gid=GA1.2.2098111391.1629053716; _hjid=c10ee135-accc-417b-82d3-45c55bfeadc1; messagesUtk=92cb0d4fab9d4d23bb0380521104c3d7; __cf_bm=3fe47ecbe927114dccb992cfb814ed4438f969c2-1629060128-1800-AYC/0kaeJad37Bj7VO0VaLco/LlaxfHDbMiXPZQzAdglT+VWE0+c8Mb8BoOnhn5vyM3M+7V4vsKzkPCzY3l/uxG9Z9Q8CMjSk2mJHr4ZE3fzMaz6s7hkTegBO14Ax9kxxw==; _ga=GA1.1.989116910.1629041904; _ga_B6DQELPYPE=GS1.1.1629060127.4.0.1629060129.0';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }

    public function GetCard($token,$device){
        $data = '{"archived":false,"page":1,"perPage":45}';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api-int.gift.id/v2/users/cards/list');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = 'Host: api-int.gift.id';
        $headers[] = 'Auth: bearer';
        $headers[] = 'Authorization: Bearer '.$token;
        $headers[] = 'X-Vnd-App-Platform: Android';
        $headers[] = 'X-Vnd-App-Name: TADA Wallet';
        $headers[] = 'X-Vnd-App-Version: 4.12.2';
        $headers[] = 'X-Vnd-App-Use-Decimal: true';
        $headers[] = 'X-Vnd-App-Device-Name: G011A';
        $headers[] = 'X-Vnd-App-Device-Id: '.$device;
        $headers[] = 'X-Vnd-Build-Code: 1BMN2AQFJ4U541T4-411';
        $headers[] = 'Content-Type: application/json; charset=utf-8';
        $headers[] = 'User-Agent: okhttp/4.9.0';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }
    public function GetCardInfo($token,$card,$device){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api-int.gift.id/v1/users/cards/'.$card);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = 'Host: api-int.gift.id';
        $headers[] = 'Auth: bearer';
        $headers[] = 'X-Vnd-User-Lat: -2.2329817';
        $headers[] = 'X-Vnd-User-Lng: 119.7746117';
        $headers[] = 'Authorization: Bearer '.$token;
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'X-Vnd-App-Platform: Android';
        $headers[] = 'X-Vnd-App-Name: TADA Wallet';
        $headers[] = 'X-Vnd-App-Version: 4.12.2';
        $headers[] = 'X-Vnd-App-Use-Decimal: true';
        $headers[] = 'X-Vnd-App-Device-Name: G011A';
        $headers[] = 'X-Vnd-App-Device-Id: '.$device;
        $headers[] = 'X-Vnd-Build-Code: 1BMN2AQFJ4U541T4-411';
        $headers[] = 'User-Agent: okhttp/4.9.0';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);    

        return $result;
    }
    public function RegCard($token,$number,$device,$phone,$email,$hbd){
        $data = '{"name":"Andi","email":"'.$email.'","phone":"+'.$phone.'","birthday":"'.$hbd.'","sex":"male","data":[{"key":"phone","value":"+'.$phone.'"},{"key":"name","value":"Andi"},{"key":"email","value":"'.$email.'"},{"key":"birthday","value":"'.$hbd.'"},{"key":"sex","value":"male"}],"country":"ID"}';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api-int.gift.id/v1/users/cards/'.$number.'/register_customer');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = 'Host: api-int.gift.id';
        $headers[] = 'Auth: bearer';
        $headers[] = 'Authorization: Bearer '.$token;
        $headers[] = 'X-Vnd-App-Platform: Android';
        $headers[] = 'X-Vnd-App-Name: TADA Wallet';
        $headers[] = 'X-Vnd-App-Version: 4.12.2';
        $headers[] = 'X-Vnd-App-Use-Decimal: true';
        $headers[] = 'X-Vnd-App-Device-Name: G011A';
        $headers[] = 'X-Vnd-App-Device-Id: '.$device;
        $headers[] = 'X-Vnd-Build-Code: 1BMN2AQFJ4U541T4-411';
        $headers[] = 'Content-Type: application/json; charset=utf-8';
        $headers[] = 'User-Agent: okhttp/4.9.0';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;

    }
    public function generateRandomString($length = true)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function getStr($string,$start,$end){
        $str = explode($start,$string);
        $str = explode($end,$str[1]);
        return $str[0];
    }
    public function connect($end_point, $post) {
        $_post = array();
        if (is_array($post)) {
            foreach ($post as $name => $value) {
                $_post[] = $name.'='.urlencode($value);
            }
        }
        $ch = curl_init($end_point);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if (is_array($post)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
            $result = false;
        }
        curl_close($ch);
        return $result;
    } 
} 

print "\n[!] Script Created By: OTPKU & M34L".PHP_EOL;
$try = new Tada;
ulang:
$device = $try->generateRandomString(16);
$session = 'b3faca0ba85b'.$try->generateRandomString(4);
echo "Email : ";
$email = trim(fgets(STDIN));
$date = date('Y-m-d');
$hbd = date('Y-m-d', strtotime('+1 days', strtotime($date)));
echo "HBD : ".$hbd.PHP_EOL;
echo "Mau nomor Sendiri Atau Nomor OTP? 1. OTPKU / 2. Sendiri : ";
$choose = trim(fgets(STDIN));
if ($choose == '1') {
    echo "Masukan ApiKey []";
    $apikey = trim(fgets(STDIN));
    echo "Getting Number []".PHP_EOL;
    $api_url = 'https://otpku.com/api/json.php'; // api url
    $post_data = array(
        'api_key' => $apikey, // api key Anda
        'action' => 'order',
        'service' => '26', // id layanan
        'operator' => 'indosat' //telkomsel,axis,indosat,any(random)
    );
    $api = $try->connect($api_url, $post_data);
    if (json_decode($api)->status == true) {
        $result = json_decode($api)->data->number;
    } else{
        die('Gagal get nomor, cek api/saldo anda');
    }
} else {
    echo "Input Nomor cth (628XXXXXXX): ";
    $result = trim(fgets(STDIN));
}


if (is_numeric($result)) {
    $number = $result;

    echo "Getting Number Done : ".$number.PHP_EOL;
    echo "Req OTP....".PHP_EOL;
    $reqotp = $try->requestOTP($number, $session, $device);

    if (isset(json_decode($reqotp)->result->error)) {
        die("masukin nomor yang bener goblok tolol");
    }

    if (json_decode($reqotp, 1)['result']['success'] == true) {
        echo "Req OTP Done".PHP_EOL;
        echo "Waiting    OTP....".PHP_EOL;
        echo "OTP: ";
        $otp = trim(fgets(STDIN));
        $secret = json_decode($reqotp, 1)['result']['secret'];
        $reg = $try->register($number, $session, $secret, $otp, $device);

        if (isset(json_decode($reg)->error)) {
            die('Error : udah kedaftar / Dll');
        }

        if (json_decode($reg)->access_token) {
            $token = json_decode($reg)->access_token;
            $claim = $try->claimReff($number);  

            if (json_decode($claim)->success == true) {
                $getcard = json_decode($try->GetCard($token, $device));
                //echo $getcard.PHP_EOL;

                foreach ($getcard as $k => $v) {
                    $no = $v->no;
                    $status = $v->status;

                    if ($status == 'activated') {
                        $regcard = $try->RegCard($token,$no,$device,$number,$email,$hbd);
                        //echo json_decode($regcard).PHP_EOL;

                        if (json_decode($regcard)->role == 'customer') {
                        $getcardinfo = $try->GetCardInfo($token, $no, $device);
                        $pin = json_decode($getcardinfo)->card->pin;
                        $status = json_decode($getcardinfo)->card->status;

                        //echo $getcardinfo;

                        if ($status == 'activated') {

                            echo "Berhasil register EIGER CLUB GUYS, LOGIN AE LANGSUNG".PHP_EOL;
                            die();
                        }

                        }
                    }
                }
            }
        }
    } else {
        print_r($reqotp);
        goto ulang;
    }
} else{
}
echo "Challange";
echo "FREE T-SHIRT";
?>
