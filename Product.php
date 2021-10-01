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
?>
