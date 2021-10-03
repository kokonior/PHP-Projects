<?php
function rentang($nilai){
    if($nilai >= 85 && $nilai <= 100){
        $huruf = "A";
    }else if($nilai >= 75 && $nilai <= 84){
        $huruf = "B";
    }else if($nilai >= 60 && $nilai <= 74){
        $huruf = "C";
    }else if($nilai >= 50 && $nilai <= 59){
        $huruf = "D";
    }else{
        $huruf = "E";
    }
    return $huruf;
}
echo rentang(87);
?>
