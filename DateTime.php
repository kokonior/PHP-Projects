<?php 

// class DateTime default dari php nya
$dateTime = new DateTime();

// ngubah date sama time 
$dateTime->setDate(2003, 7, 24);
$dateTime->setTime(17, 12, 12);

// memanipulasi datetime interval
// ini akan menambah 1 taun
$dateTime->add(new DateInterval("P1Y"));

// ini akan mengurangi 1 bulan, ntah itu taun, tanggal dll
$minusOneMonth = new DateInterval("P1M"); 
$minusOneMonth->invert = true;
$dateTime->add($minusOneMonth);

var_dump($dateTime);


$now = new DateTime();
// timezone saat ini
var_dump($now);

// mengubah function dateTimeZone
$now->setTimezone(new DateTimeZone("Europe/Berlin"));
// timezon setelah diubah
var_dump($now);

// format datetime 
// merubah datetime jadi representasi/tampilan string
$string = $now->format("Y-m-d H:i:s");
echo "Waktu saat ini : $string" . PHP_EOL;

// parse datetime
// mengkonversi dari string ke format input datetime yang telah di tentukan
$date = DateTime::createFromFormat("Y-m-d H:i:s", "2020-11-10 10:10:10", new DateTimeZone("Asia/Jakarta"));
// var_dump($date);

// pengecekan jika format / yang diinputkan salah
if($date){
    var_dump($date);
} else {
    echo "Format salah";
}


?>
