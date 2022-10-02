<?php
  $limit = readline();
  $ans = array();
  for( $i = 0 ; $i<$limit ; $i++){
    $number = readline();
    if($number <38){
        array_push($ans, $number);
    }
    else if (((floor($number/5)+1)*5) - $number > 2){
        array_push($ans, $number);
    }
    else{
        array_push($ans, (floor($number/5)+1)*5);
    }
  }
  foreach($ans as $a){
    echo ($a . "\n");
  }
