<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {
        $hari = $_POST['jumlah'];
        $codeBK = $_POST['namaBK'];

        if ($codeBK == "algoritma") {
            $nama = "Algoritma & Pemrograman";
            $harga = 150000;
        } else if ($codeBK == "php") {
            $nama = "Pemrograman PHP";
            $harga = 90000;
        } else if ($codeBK == "java") {
            $nama = "Pemrograman Java";
            $harga = 175000;
        } else if ($codeBK == "si") {
            $nama = "Sistem Informasi";
            $harga = 80000;
        } else {
            $nama = "Aljabar Linear";
            $harga = 50000;
        }

        function total($a, $b)
        {
            $hasil = floatval($a) * floatval($b);
            return $hasil;
        }
    }
}
