<?php

    //set kelereng awal
    $kelerengBot  = 10;
    $kelerengUser = 10;

    //Deklarasi
    $namaUser;
    $tebakanUser;
    $taruhanUser;
    $taruhanKelereng;
    $tebakanBot;

echo "\n";
    echo "Selamat Datang di SquidGame Kelereng \n"; 

    //Get userName
    echo  "Masukan nama anda : ";
    $namaUser  = trim(fgets(STDIN));
    echo  "\n";

    //Check if user fill name or not
    if($namaUser == TRUE){
        
        echo "Hai ".$namaUser." selamat bermain!";
        echo "\n";
        echo "Kelereng Bot  : ".$kelerengBot;
        echo "\n";
        echo "Kelereng Kamu : ".$kelerengUser;
        echo "\n";
?>
