<?php

echo date("l, d-M-Y");

echo time();

echo date("l", time()-60*60*24*100);

echo date("l", mktime(0,0,0,8,25,1985));

echo date("l", mktime(0,0,0,10,1,2021));

echo date("l", strtotime("25 aug 1985"));

$text = "Hai semuanya";
echo strlen($text);

?>
