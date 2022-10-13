<?php
function rand_user(){
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.randomuser.me/?nat=us,au,ch,dk,gb,nz');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    
    $headers = array();
    $headers[] = 'Authority: api.randomuser.me';
    $headers[] = 'Cache-Control: max-age=0';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36';
    $headers[] = 'Sec-Fetch-Dest: document';
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
    $headers[] = 'Sec-Fetch-Site: none';
    $headers[] = 'Sec-Fetch-Mode: navigate';
    $headers[] = 'Sec-Fetch-User: ?1';
    $headers[] = 'Accept-Language: en-US,en;q=0.9';
    $headers[] = 'Cookie: __cfduid=dafbfbb46121f0e222efaaed716fc89d11573273760';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = json_decode(curl_exec($ch));
    $nama = $result->results[0]->name->first;
    $akhir = $result->results[0]->name->last;
    curl_close($ch);
    
    return array($nama,$akhir);
}
var_dump(rand_user());

?>
