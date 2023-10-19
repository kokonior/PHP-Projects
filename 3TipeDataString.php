<?php

//Single Quote
echo 'Nama: ';
echo 'Afwan Sutdrajat';
echo "\n";

//Double Quote
echo "Nama: ";
echo "Afwan\t Sutdrajat\n";

//Multiline String
//Heredoc
echo <<<TEXT
Saya Sedang Belajar PHP,
Ini Adalah Cara Ke-3 Membuat String
Menggunakan Heredoc
TEXT;

echo "\n";

//Nowdoc
echo <<<'TEXT'
Saya Sedang Belajar PHP,
Ini Adalah Cara Ke-3 Membuat String
Menggunakan Nowdoc
TEXT;