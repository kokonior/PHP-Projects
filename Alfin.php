<?php

/*
Tambahan di php 10 ditambah 4 hasil nya? 
*/
$a = 10; // variable a kita isi dengan nilai 10
$b = 4; // variable b kita isi dengan nilai 4

$c = $a + $b; // disini adalah proses nya
echo "Hasil dari Tambahan $a + $b = $c"; // disini outputnya
echo "=======================";

$x = 7; // variable a kita isi dengan nilai 7
$y = 4; // variable b kita isi dengan nilai 4
$z = $x - $y; // disini adalah proses nya
echo "Hasil dari Pengurangan $x - $y = $z"; // disini outputnya

$uang = 9000;
$harga = 10000;
echo "Saya : Saya mau beli, uang saya cuman ada Rp.$uang Apa bisa?";

if ($uang < $harga) {
	$kurang = $harga - $uang; 
	echo " Om nasigoreng : Ga bisa! Uang anda kurang <b>Rp.$kurang</b>!";
} 
else {
	echo "Om nasigoreng : Bisa kok!";
}

?>

<!DOCTYPE html>

<html>

<body>

<h1>My first PHP page</h1>

<?php

echo "Hello World!";

?>

</body>

</html>
