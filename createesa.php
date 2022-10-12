<?php
$a1=array("a"=>"esa","b"=>"baba","c"=>"caca","d"=>"yellow");
$a2=array("a"=>"red","b"=>"green","c"=>"blue");

$result=array_diff_assoc($a1,$a2);
print_r($result);
?>
