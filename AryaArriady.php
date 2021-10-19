<?php

        if(isset($_POST['submit'])){
            $alas = $_POST['alas'];
            $tinggi = $_POST['tinggi'];
            
            // menghitung luas segitiga
            $luas_segitiga = 1/2 * $alas * $tinggi;
            echo "Hasil hitung luas segitiga adalah sebagai berikut:<br/>";
            echo "Diketahui;<br/>";
            echo "Alas Segitiga = $alas<br/>";
            echo "Tinggi Segitiga = $tinggi<br />";
            echo "Maka luas segitiga sama dengan 1/2 x $alas x $tinggi = $luas_segitiga";
        }
?>
