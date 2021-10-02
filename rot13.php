// Rot13 Function In PHP

function rot13($string){
 for($i=0; $i < strlen($string); $i++){
  $c = ord($string[$i]);
  
  if($c >= ord('n') & $c <= ord('z') | $c >= ord('N') & $c <= ord('Z')){
   $c -= 13;
  }elseif($c >= ord('a') & $c <= ord('m') | $c >= ord('A') & $c <= ord('M')){
   $c += 13;
  }
  $string[$i] = chr($c);
 }
 
 return $string;
}
