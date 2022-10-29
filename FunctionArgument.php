<?php
// FUNCTION ARGUMENT
/*
- Kita bisa mengirim informasi ke function yang ingin kita panggil.
- Untuk melakukan hal tersebut, kita perlu menambahkan argument atau parameter di function yang sudah kita buat.
- Cara membuat argument sama seperti cara membuat variabel.
- Argument ditempatkan di dalam kurung () di deklarasi function.
- Argument bisa lebih dari satu, jika lebih dari satu, harus dipisah menggunakan tanda koma.
*/

function sayHello($name)
{
    echo "Hello $name" . PHP_EOL;
}

sayHello("Eko");
sayHello("Budi");

echo "\n";

//Function paramter lebih dari 1
function sayHello2($name, $age)
{
    echo "Hello saya $name, umur saya $age" . PHP_EOL;
}

sayHello2("Eko", "25");
sayHello2("Budi", "19");

echo "\n";

//Default Argument Value
/*
- PHP mendukung default argument value.
- Fitur ini memungkinkan jika ketika kita memanggil function tidak memasukan parameter, kita bisa menentukan data default nya apa.

Jika/kalau ketika memanggil function kita tidak mengirimkan paramter/argumennya kira-kira mau diganti jadi apa nih valuenya? nah itu bisa kita gunakan default argument value.
*/
function sayHello3($name = "Anonymous") // = "Anonymous" itulah default argument valuenya.
{
    echo "Hello $name" . PHP_EOL;
}
sayHello3();
sayHello3("Eko");

echo "\n";

/*
Kesalahan Default Argument Value (PERLU DIPERHATIKAN)
- Default argument value bisa disimpan argument manapun
- Namun jika argument lebih dari satu, dan kita menyimpan default argument value di parameter awal, maka itu kurang berguna
*/

/*function sayHello4($firstname = "Anonymous", $lastname) //maka dari itu kalau disini default argument ini tidak terlalu berguna diawal, jadi biasanya kalau parameter yg default argument itu kalau parameter nya bukan diawal
{
    echo "Hello $firstname $lastname" . PHP_EOL;
}

sayHello4("Kurniawan");*/ //tidak bisa seperti ini juga sayHello4(" ,Kurniawan"); -> disebelah koma itu dianggapnya ada parameter kosong, tidak bisa seperti itu.
/*
Dan terjadi error -> "Fatal error: Uncaught ArgumentCountError: Too few arguments to function sayHello4(), 1 passed"
artinya argument nya terlalu sedikit nih, passing nya cuman 1 data, sedangkan parameternya butuhnya 2 argumentnya yaitu $firstname dan $lastname, sedangkan yg dikirim "kurniawan" ini itu masuknya bukan ke $lastname, tapi ke $firstname, dan yang artinya $lastname nya tetap kosong
*/
//Maka dari itu untuk membuat default argument itu disarankan di parameter yang dibelakang jangan diparameter yang didepan, jadi kalau yang didepan itu biasakan REQUIRED / WAJIB DIMASUKKAN
//contoh yg benar dan yg gk ada masalah
function sayHello4($firstname, $lastname = "")
{
    echo "Hello $firstname $lastname" . PHP_EOL;
}
sayHello4("Eko");
sayHello4("Budi");
sayHello4("Eko", "Kurniawan");
//Jadi jangan sampai salah dalam pembuatan Default Argument Value, jadi pastikan pakainya dibelakangnya saja jangan yang didepannya

/*
Type Declaration
- Sama seperti variable, argument di PHP bisa kita masukkan data yang dinamis
- Kadang terlallu dinamis juga menyulitkan jika ternyata kita hanya ingin membuat function yang menggunakan argument dengan tipe data tertentu
- Untungnya di PHP, kita bisa menambahkan type data di argument, sehingga PHP akan melakukan pengecekan ketika kita mengirim value ke function tersebut
- Jika type data value tidak sesuai, maka akan terjadi error
- Secara default PHP akan melukakan percobaan konversi tipe data secara otomatis, misal jika kita menggunakan tipe INT, tapi kita mengirim STRING, maka PHP akan otomatis mengkonversi STRING tersebut menjadi INT

Valid Types (1)
Type                Keterangan
Class/Interface     Parameter harus tipe Class/Interface
self                Parameter harus sama dengan Class dimana function ini dibuat
array               Parameter harus array
callable            Parameter harus callable
bool                Parameter harus boolean
float               Paramter harus floating point
int                 Paramter harus integer number
string              Parameter harus string
interable           Paramter harus array dan tipe Traversable
object              Parameter harus sebuah object
*/

function sum(int $first, int $last) //Defaultnya bisa dimasukan apa saja string, int, array, dll. tapi disini kita pengennya integer saja, jadi ditambahakn int $first, int $last
{
    $total = $first + $last;
    echo "Total $first + $last = $total" . PHP_EOL;
}
sum("100", "100"); //Dengan demikian jika temen-temen mencoba mengirimkan data yang bukan integer maka si PHP akan melakukan konversi, contoh nya disini ada tipe data string, ketika dia tipe data string maka akan dicoba dikonversi, bisa tidak dikonversi, kalau bisa maka success
sum(100, 100); //Kalau ini sudah tepat integer
sum(true, false); //Kalau boolean juga sama, akan dicoba dikonversi ke integer (Kebetulan kalau PHP bisa) kalau true itu 1, kalau false itu 0
//sum([], []);// Yang tidak bisa adalah array, kalau temen-temen mencoba memasukan data array, maka ini tidak bisa dikonversi menjadi integer, maka dari itu ini otomatis error
//Jadi kalau temen-temen menambahkan tipe data jadi kita punya kemampuan untuk melakukan konversi otomatis dan juga dipastikan bahwa data yang dikirim itu tipenya adalah integer
//Jadi kalau temen-temen butuh tipe data nya fix gitu ya, jangan sampai diluar itu, temen-temen tinggal langsung memasukan tipe data didepannya (int $first, int $last), dan silahkan sesuaikan tipe data yang pengen kita gunakan di si function nya


/*
Variable-Length Argument List
- Variable-Length Argument List merupakan kemampuan dimana kita bisa membuat sebuah parameter yang menerima banyak value. (Trus kalau begini mendingan pakai array apa bedanya? sebenarnya iya sama, array juga bisa menerima banyak value, cuma bedanya cara mengirim datanya)
- Variable-Length Argument List secara otomatis akan membuat argument tersebut menjadi array, namun kita tidak perlu manual mengirim array ke functionnya
- Variable-Length Argument List hanya bisa di lakukan di argument posisi terakhir (Jadi kalau bikin function dan argumennya banyak, si Variable-Length Argument List ini cuman bisa ditempatkan diparameter/argumen yang posisi nya paling terakhir)
- Untuk membuat Variable-Length Argument List, kita bisa menggunakan tanda ... (titik tiga kali) sebelum nama argument
*/
//Kalau tidak memakai Variable-Length Argument List
//ini memakai array parameternya
function sumAll(array $values)
{
    $total = 0;
    foreach ($values as $value) {
        $total += $value;
    }
    echo "Total " . implode(",", $values) . " = $total" . PHP_EOL;
}
sumAll([1, 2, 3, 4, 5]);

//tapi kalau diganti menjadi menggunakan Variable-Length Argument List
function sumAll2(...$values)
{
    $total = 0;
    foreach ($values as $value) {
        $total += $value;
    }
    echo "Total " . implode(",", $values) . " = $total" . PHP_EOL;
}
sumAll2(1, 2, 3, 4, 5); //ini parameter
//Jadi perbedaannya cuman itu sebenarnya, semua ini parameter akan dikonversi menjadi array lalu dimasukan kevariable ...values.
//Pertanyaan-> Gimana kalau temen-temen sudah punya array nya?
$values = [1, 2, 3, 4, 5]; //Ini values
//Apa yang terjadi jika disumaAll
//sumAll2($values); //maka hasilnya error
//Kenapa error? karena ini value trsebut adalah array sedangkan kita butuh nya integer istilahnya ..$values itu
//Nah untuk mengirimkan data array yang sudah terlanjur terbuat kedalam variable length argument list, tinggal menambahkan ...(titik tiga kali) -> sumAll2(...$values);
sumAll2(...$values);//Ini otomatis akan dikonversi menjadi variable length argument list
//Jadi itu lah variable length argument list
/*
Jadi kalau teman-teman butuh parameter yang ukurannya bisa 1 2 3 dan banyak, gk peduli seberapa banyak tapi pengen otomatis dikonversi menjadi array teman-teman bisa menggunkan si variable length argument list
*/
//Jadi itulah Pembahasan tentang argument di PHP
