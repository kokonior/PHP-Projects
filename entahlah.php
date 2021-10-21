<?php
// bismilah dapet kaos
// buat class pc
class pc {
	
 // buat property untuk class pc
 var $pemilik;
 var $merk;
 var $spek;
	
 // buat method untuk class pc
 
 function hidupkan_pc() {
 return "Hidupkan sebuah pc";
 }
 function matikan_pc() {
 return "Matikan sebuah pc";
}
}

// buat objek property dari class pc(instansiasi)
$pc_vellai = new pc();
// set property
$pc_vellai->pemilik="vellai";
$pc_vellai->merk="Asus ROG";
$pc_vellai->spek="hight speak";

// tampilkan isi property dari pemilik
echo $pc_vellai->pemilik;
echo "<br />";
echo $pc_vellai->merk;
echo "<br />";
echo $pc_vellai->spek;
echo "<br />";

// tampilkan set set method dari pemilik
echo $pc_vellai->hidupkan_pc();
echo "<br />";
echo $pc_vellai->matikan_pc();
?>
