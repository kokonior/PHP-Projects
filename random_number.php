<?php

function rand_x_num($digit, $pad = false){
  if($pad){
    return str_pad(rand(0, pow(10, $digit)-1), $digit, '0', STR_PAD_LEFT);
  } else {
    return rand(pow(10, $digit-1), pow(10, $digit)-1);
  }
}

$digit = (int) readline('Enter digit: ');
$pad = readline('Zero pad? (y/n): ');

if($digit > 0){
  if($pad == 'y'){
    echo rand_x_num($digit, true)."\n";
  } elseif($pad == 'n'){
    echo rand_x_num($digit, false)."\n";
  } else {
    echo "Invalid argument\n";
  }
} else {
  echo "Invalid Digit\n";
}
