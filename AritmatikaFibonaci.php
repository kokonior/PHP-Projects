<?php

    $angkaSebelumnya    = 0;
    $angkaSekarang      = 1;

    for ($i=0; $i < 7 ; $i++) { 
       
        $hasil = $angkaSebelumnya + $angkaSekarang;
        echo $hasil."\n";

        $angkaSebelumnya    = $angkaSekarang;
        $angkaSekarang      = $hasil;

    }


?>
