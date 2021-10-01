<?php

	$hari = array("Senin","Selasa", "Rabu");
	$bulan = ["Januari", "Februari", "Maret"];
	$array = [123, "tulisan", false];

 	var_dump($hari);
  	echo "<br>";

	print_r($bulan);
	echo "<br>";

	echo $array[0];
	echo "<br>";

	echo $bulan[1];
	echo "<br>";

	var_dump($hari);
	$hari[] = "Kamis";
	$hari[] = "Jum'at";
	$hari[] = "Sabtu";
	$hari[] = "Minggu";
	echo "<br>";
	var_dump($hari);

?>


<?php 

$kotak = array('anjing', 'kurakura', 'koala', 'anjing');
$nama = ['Hilman', 'Endy', 'Tiqa'];

print_r( array_unique($kotak) );
echo "<br>";

print_r( array_reverse($kotak) );
echo "<br>";

shuffle($kotak);
print_r( $kotak );
echo "<br>";

echo count($kotak);
echo "<br>";
echo count($nama);
echo "<br>";

$data = array( 	"nama" 	=> "kokonior" ,
		"umur" 	=> 22 ,
		"kerja" => "pengacara" ,
);

$data['nama'] = "Koko Nio Ramadhan";
echo "Nama adalah" . $data['nama'];

print_r( array_values($data) );
echo "<br>";

print_r( array_keys($data) );

?>
