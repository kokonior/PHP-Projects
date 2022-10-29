<?php
function print_deret_fibonacci($jumlah)
{
  // siapkan 2 angka awal
  $angka_sebelumnya=0;
  $angka_sekarang=1;
  
  //simpan string angka awal
  $hasil = "$angka_sekarang";
 
  for ($i=0; $i<$jumlah-1; $i++)
  {
    // hitung angka fibonacci
    $output = $angka_sekarang + $angka_sebelumnya;
    // hasilnya ditambahkan ke string $hasil
    $hasil = $hasil." $output";
  
    //siapkan angka untuk perhitungan berikutnya
    $angka_sebelumnya = $angka_sekarang;
    $angka_sekarang = $output;
  }
  return $hasil;
}
  
function piramida_fibonacci($tingkat){
  for ($i=1; $i<$tingkat+1; $i++)
  {
    echo print_deret_fibonacci($i);
    echo "<br>";
  }
}
  
piramida_fibonacci(10);
 
// hasil:
// 1
// 1 1
// 1 1 2
// 1 1 2 3
// 1 1 2 3 5
// 1 1 2 3 5 8
// 1 1 2 3 5 8 13
// 1 1 2 3 5 8 13 21
// 1 1 2 3 5 8 13 21 34
// 1 1 2 3 5 8 13 21 34 55
?>