<?php

/*
Tambahan di php 10 ditambah 4 hasil nya? 
*/
$a = 10; // variable a kita isi dengan nilai 10
$b = 4; // variable b kita isi dengan nilai 4
$c = $a + $b; // disini adalah proses nya

echo "Hasil dari Tambahan $a + $b = $c"; // disini outputnya
echo "=======================";
/*
Pengurangan di php 7 dikurang 4 hasil nya? 
*/
$x = 7; // variable a kita isi dengan nilai 7
$y = 4; // variable b kita isi dengan nilai 4
$z = $x - $y; // disini adalah proses nya
echo "Hasil dari Pengurangan $x - $y = $z"; // disini outputnya

/*
Kita tambahkan variable uang dan harga nasi goreng dulu.
*/
$uang = 9000;
$harga = 10000;
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
	<title>Php Nasi Goreng gilacoding.com</title>
</head>
<body>
<h1>Belajar PHP (IF/ELSE)</h1>
<form method="post">
Uang kita = <input type="text" name="uang" required><br>
Harga nasi goreng = <input type="text" name="harga" required><br>

<?php
$uang=@$_POST["uang"]; // untuk mendapatkan nilai dari text field dengan name="uang" 
$harga=@$_POST["harga"]; // sama seperti diatas tapi "harga"

if (($uang && $harga) == "") { // Jika uang DAN harga SAMA DENGAN kosong maka tampil dibawah ini.
	echo "<br/> Silahkan isi uang dan harga";
} elseif ($uang < $harga) { // Jika uang kurang dari harga.
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
