<!DOCTYPE html>
<html>
<body>

<?php
$xml=simplexml_load_file("books.xml") or die("Error: Cannot create object");
foreach($xml->children()as $books){
    echo $books->title.",";
    echo $books->author.",";
    echo $books->year.",";
    echo $books->price."<br>";
}
?>
</body>
</html>