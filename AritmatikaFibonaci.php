<?php

    $angkaSebelumnya    = 0;
    $angkaSekarang      = 1;

    echo "Masukan banyak deret yang ingin ditampilkan : ";
    $banyakDeret        = trim(fgets(STDIN));

    for ($i=0; $i < $banyakDeret; $i++) { 
       
        $hasil = $angkaSebelumnya + $angkaSekarang;
        echo $hasil."\n";

        $angkaSebelumnya    = $angkaSekarang;
        $angkaSekarang      = $hasil;

    }


?>
