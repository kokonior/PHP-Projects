<?php

/*
- Anonymous function adalah function tanpa nama, di PHP disebut juga dengan Closure
- Anonymous function biasanya digunukan sebagai argument atau value di variable
- Anonymous function membuat kita bisa mengirim function sebagai argument di function lainnya
*/

$sayHello = function (string $name) {
    echo "Hello $name" . PHP_EOL;
};

$sayHello("Eko");
$sayHello("Udin");

function sayGoodBye(string $name, $filter)
{
    $finalName = $filter($name);
    echo "Good Bye $finalName" . PHP_EOL;
}

sayGoodBye("Eko", function (string $name): string {
    return strtoupper($name);
});

// bisa juga simpan function anonymous ke variable function

$filterFunction = function (string $name): string {
    return strtoupper($name);
};

sayGoodBye("Eko", $filterFunction);

echo "Masukkan angka: ";
$angka = trim(fgets(STDIN));
if ($angka < 0) {
    echo "Masukkan bilangan positif";
} else {
    if ($angka % 2 == 0) {
        echo "$angka adalah genap";
    } else {
        echo "$angka adalah ganjil";
    }
}

echo PHP_EOL;

echo "Masukkan batas bawah: ";
$bawah = trim(fgets(STDIN));
echo "Masukkan batas atas: ";
$atas = trim(fgets(STDIN));
for ($bawah; $bawah <= $atas; $bawah++) {
    if ($bawah % 2 == 0) {
        continue;
    }
    echo $bawah . PHP_EOL;
}
