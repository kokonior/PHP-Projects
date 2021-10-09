<!DOCTYPE html>
<html>
<body>

<?php
$xml=simplexml_load_file("books.xml") or die("Error: Cannot create object");
foreach($xml->anak()as $books){
    echo $books->judul.",";
    echo $books->tahun.",";
    echo $books->penulis.",";
     echo $books->harga."<br>";
}
?>
</body>
</html>
