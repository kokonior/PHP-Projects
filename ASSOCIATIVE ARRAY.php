<?php 


$umur = array("Nanda"=>"35", "Nugraha"=>"37", "John"=>"43");

foreach($umur as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}

//array in array

$a = [
    [
        'nama' => 'zal',
        'alamat' => [
            'jalan' => 'sudirman',
            'kelurahan' => '1',
        ]
    ]
];

var_dump($a);



?>
