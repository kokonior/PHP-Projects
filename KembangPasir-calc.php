<?php

echo "Pilih mode penjumlahan :";
echo "\n 1. Jumlah\n 2. Bagi\n 3. Kali\n 4. Kurang\n";
echo "Pilihan : ";
$calc = trim(fgets(STDIN));

if ($calc == 1){
	echo "Masukan bilangan ke-1 : ";
	$bil1 = trim(fgets(STDIN));
	echo "Masukan bilangan ke-2 : ";
	$bil2 = trim(fgets(STDIN));
	echo "Hasil : ".$bil1 + $bil2."\n" ;
	}
	
if ($calc == 2){
	echo "Masukan bilangan ke-1 : ";
	$bil1 = trim(fgets(STDIN));
	echo "Masukan bilangan ke-2 : ";
	$bil2 = trim(fgets(STDIN));
	echo "Hasil : ".$bil1 / $bil2."\n" ;
	}
	
if ($calc == 3){
	echo "Masukan bilangan ke-1 : ";
	$bil1 = trim(fgets(STDIN));
	echo "Masukan bilangan ke-2 : ";
	$bil2 = trim(fgets(STDIN));
	echo "Hasil : ".$bil1 * $bil2."\n" ;
	}
	
if ($calc == 4){
	echo "Masukan bilangan ke-1 : ";
	$bil1 = trim(fgets(STDIN));
	echo "Masukan bilangan ke-2 : ";
	$bil2 = trim(fgets(STDIN));
	echo "Hasil : ".$bil1 - $bil2."\n" ;
	}
?>
