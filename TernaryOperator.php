<?php

//TERNARY OPERATOR
/*
- Kadang ada kasus kita butuh melakukan pengecekan kondisi menggunakan if statement, lalu jika benar kita ingin memberi nilai terhadap variable dengan nilai X dan jika salah dengan nilai Y.
- Pengguaan if statement pada kasus seperti ini bisa dipersingkat menggunakan ternary operator.
- Ternary operator menggunakan kata kunci ? dan :
*/

//Bukan Ternary Operator
$gender = "PRIA";
$hi = null;
if ($gender == "PRIA") {
    $hi = "Hi bro!";
} else {
    $hi = "Hi nona!";
}
echo $hi . PHP_EOL;

//INI ADALAH TERNARY OPERATOR
$gender = "PRIA";
$hi = $gender == "PRIA" ? "Hi bro!" : "Hi nona!";
echo $hi . PHP_EOL;
//jadi gunakan Ternary Operator untuk mempersingkat if else
