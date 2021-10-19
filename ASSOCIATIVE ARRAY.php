<?php 


$umur = array("Riza"=>"35", "Abdillah"=>"37", "Riza"=>"43");

foreach($umur as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}

//array in array

$a = [
    [
        'nama' => 'zal',
        'alamat' => [
            'jalan' => 'cililin timur',
            'kelurahan' => '1',
        ]
    ]
];

var_dump($a);



?>
