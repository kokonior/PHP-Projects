<?php
// Indonesia Name Generator cURL from ninjaname.net
// Created by github.com/dnfid

function request($url, $post = null, $cookies = null, $headers = null)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    if(!is_null($headers))
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    if(!is_null($cookies))
        curl_setopt($ch, CURLOPT_COOKIE, $cookies);
    if(!is_null($post)){
    	curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    $resp = curl_exec($ch);
    $header_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($resp, 0, $header_len);
    $body = substr($resp, $header_len);
    curl_close($ch);
    preg_match_all('#Set-Cookie: ([^;]+)#', $header, $d);
    $cookie = '';
    for ($o=0;$o<count($d[0]);$o++) {
        $cookie.=$d[1][$o].";";
    }

    return [$header, $body, $cookie];
}

function generate()
{
    $header = array(
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:68.0) Gecko/20100101 Firefox/68.0',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        'Accept-Language: en-US,en;q=0.5',
        'Content-Type: application/x-www-form-urlencoded',
        'Connection: keep-alive',
        'Upgrade-Insecure-Requests: 1'
    );
    $getFullname = request('http://ninjaname.net/indonesian_name.php', 'number_generate=30&gender_type=male&submit=Generate', null, $header);
    preg_match_all('#&bull; ([^;]+)<br/>&bull; #', $getFullname[1], $fullname);
    $fullname = $fullname[1][0];
    $username = strtolower(str_replace(' ', '', $fullname));

    return [$fullname, $username];
}

$random = generate();
print_r($random);
?>