<?php
$get = file_get_contents('https://ip.seeip.org/jsonip');
$ip = json_decode($get);
echo "your ip : " . $ip->ip . "\n";
?>
