<?php
// Sintaks PHP

for( $i = 0; $i < 5; $i++ ) {
	echo "Hello World! <br>":
}

$i = 0;
while ($i < 5 ) {
	echo "Hello World! <br>";
}
$i++;

$i = 10;
do {
	echo "Hello World! <br>";
$i++;
} while( $i < 5 );

//cek umur by php

$u = trim(fgets(STDIN)); //masukan umur mu
if($i < 18 ) {
    echo 'kamu boleh masuk';
} else {
    echo 'Kamu gak boleh masuk';
}

?> 
