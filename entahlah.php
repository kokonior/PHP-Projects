	<?php
// buat class pc
class pc {
 // buat property untuk class pc
 var $pemilik;
 var $merk;
 var $spek;
 // buat method untuk class pc
 
 function hidupkan_pc() {
 return "Hidupkan pc";
 }
 function matikan_pc() {
 return "Matikan pc";
}
}

// buat objek dari class pc(instansiasi)
$pc_vellai = new pc();
// set property
$pc_vellai->pemilik="vellai";
$pc_vellai->merk="Asus";
$pc_vellai->spek="hight speak";
// tampilkan property
echo $pc_vellai->pemilik;
echo "<br />";
echo $pc_vellai->merk;
echo "<br />";
echo $pc_vellai->spek;
echo "<br />";
// tampilkan method
echo $pc_vellai->hidupkan_pc();
echo "<br />";
echo $pc_vellai->matikan_pc();
?>
