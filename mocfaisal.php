<?php

// Perbandingan tanggal lahir dengan tanggal sekarang

$tgl_lahir = "1999-01-02";

$hari_netas  = new DateTime($tgl_lahir);
$hari_ini = new Datetime(date('Y-m-d'));
$hasil  = $hari_ini->diff($hari_netas);
printf(' Umur lo : %d Tahun, %d Bulan, %d Hari', $hasil->y, $hasil->m, $hasil->d);
