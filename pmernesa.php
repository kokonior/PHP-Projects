<?php
function myfunction($a,$b)
{
if ($a===$b)
  {
  return 0;
  }
  return ($a>$b)?1:-1;
}

$a1=array("a"=>"permen","b"=>"goreng","c"=>"babbi");
$a2=array("d"=>"kkai","b"=>"koi","e"=>"blue");

$result=array_intersect_uassoc($a1,$a2,"myfunction");
print_r($result);
?>
