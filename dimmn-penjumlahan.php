<?php

/*
Tambahan di php 20 ditambah 40 hasil nya? 
*/
$a = 20;
$b = 40;
$c = $a + $b;

echo "Hasil dari Tambahan $a + $b = $c";
echo "=======================";
/*
Pengurangan di php 7 dikurang 40 hasil nya? 
*/
$x = 7;
$y = 40;
$z = $x - $y; // disini adalah proses nya
echo "Hasil dari Pengurangan $x - $y = $z"; // disini outputnya

/*
Kita tambahkan variable uang dan harga nasi goreng dulu.
*/
$uang = 10000;
$harga = 20000;
echo "Saya : Saya mau beli, uang saya cuman ada Rp.$uang Apa bisa?";

if ($uang < $harga) {
	$kurang = $harga - $uang; 
	echo " Om nasigoreng : Ga bisa! Uang anda kurang <b>Rp.$kurang</b>!";
} else {
	echo "Om nasigoreng : Bisa kok!";
}

?>

<html>
<head>
	<title>Php Nasi Goreng</title>
</head>
<body>
<h1>Belajar PHP (IF/ELSE)</h1>
<form method="post">
Uang kita = <input type="text" name="uang" required><br>
Harga nasi goreng = <input type="text" name="harga" required><br>

<?php
$uang=@$_POST["uang"];
$harga=@$_POST["harga"];

if (($uang && $harga) == "") { 
	echo "<br/> Silahkan isi uang dan harga";
} elseif ($uang < $harga) { 
	$kurang = $harga - $uang; 
	echo " <br/>Uang anda kurang <b>Rp.$kurang</b>!";
} else { 
	$lebih = $uang - $harga; 
	echo " <br/>Uang anda lebihan <b>Rp.$lebih</b>";
}

?>

<br><input type="submit" value="Proses">
</form>
</body>
</html>
