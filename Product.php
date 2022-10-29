<?php 
class Product {
	public 	$judul = "judul",
	$penulis = "penulis",
	$penerbit = "penerbit",
	$harga = 0,
}

$Product1 = new Product();
$Product1->judul = "Naruto";
var_dump($Product1);

$Product2 = new Product();
$Product2->judul = "Uncharted";
$Product2->tambahProperty = "hahaha";
var_dump($Product2);

$Product3 = new Product();
$Product3->judul = "Naruto";
$Product3->penulis = "Masashi Kishimoto";
$Product3->penerbit = "Shonen Jump";
$Product3->harga = 30000;
var_dump($Product3);

$Product4 = new Product();
$Product4->judul = "Uncharted";
$Product4->penulis = "Neil Druckmann";
$Product4->penerbit = "Sony Computer";
$Product4->harga = 250000;

echo "Komik : " . $Product3->getLabel();
echo "<br>";
echo "Game : " . $Product4->getLabel();
?>
