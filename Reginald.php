<?php

// function salam($name = 'Admin' ) {
// 	return "Selamat Datang, $name";
// }

function salam($date = 'Selamat Datang', $name = 'admin')
{
    return "Selamat $date, $name";
}

// Kalkulator Sederhana antara dua bilangan
$x = 9;
$y = 3;



echo "=================================== <br/>";
// FUngsi penjumlahan
function functionPenambahan($x, $y)
{
    $HasilPenambahan = $x + $y;
    return $HasilPenambahan;
}
// FUngsi Perkalian
function functionPerkalian($x, $y)
{
    $HasilPerkalian = $x * $y;
    return $HasilPerkalian;
}
// Fungsi Pengurangan
function functionPengurangan($x, $y)
{
    $HasilPengurangan = $x - $y;
    return $HasilPengurangan;
}
// Fungsi Pembagian
function functionPembagian($x, $y)
{
    $HasilPembagian = $x / $y;
    return $HasilPembagian;
}

echo "Hasil Penjumlahan adalah :" . functionPenambahan(9, 3) . "<br/>";
echo "Hasil Pengurangan adalah :" . functionPengurangan(9, 3) . "<br/>";
echo "Hasil Perkalian adalah :"  . functionPerkalian(9, 3) . "<br/>";
echo "Hasil Penjumlahan adalah :" . functionPembagian(9, 3) . "<br/>";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Latihan Function</title>
</head>

<body>
    <h1>Hallo Selamat Datang <?= salam("Pagi"); ?></h1>
</body>

</html>
