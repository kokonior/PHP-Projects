<?php
echo "[3] Request OTP : ";
reqotp:
$url = "https://api.lunarcrush.com/v2?data=auth&action=get-code&email=$email&key=$token";
$headers = array();
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0";
$headers[] = "Accept: */*";
$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
$headers[] = "Accept-Encoding: gzip, deflate";
$headers[] = "Dnt: 1";
$headers[] = "Pragma: no-cache";
$headers[] = "Cache-Control: no-cache";
$headers[] = "Te: trailers";
$reqOTP = request($url, $data=null, $headers);
if(strpos($reqOTP, 'get-code')!==false)
{
    echo "Sent!\n";
    $id = getstr($reqOTP, '"id":"','"');
}
else if(strpos($reqOTP, 'Internal server error')!==false)
{
    goto reqotp;
}
else
{
    echo "Error!\n";
    echo $reqOTP;
    exit();
}

echo "OTP ? ";
$otp = trim(fgets(STDIN));


echo "[5] Try to Login : ";
login:
$url = "https://api.lunarcrush.com/v2?data=auth&action=login&challenge=$id&code=$otp&share=&referral=&key=$token";
$headers = array();
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0";
$headers[] = "Accept: */*";
$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
$headers[] = "Accept-Encoding: gzip, deflate";
$headers[] = "Dnt: 1";
$headers[] = "Pragma: no-cache";
$headers[] = "Cache-Control: no-cache";
$headers[] = "Te: trailers";
$login = request($url, $data=null, $headers);
if(strpos($login, '"success":true')!==false)
{
    echo "Success!\n\n";
    echo "Key : $token\n";
}
else if(strpos($login, 'Internal server error')!==false)
{
    goto login;
}
else
{
    echo "Error!\n";
    echo $login;
}
?>
