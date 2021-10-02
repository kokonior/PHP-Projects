<center><h1>Menentukan Ganjil genap</h1></center>
<center><h1>Algoritma dan pemrograman 1</h1></center>
<br>
<br>
<form method="post" action="">
    Masukan Nilai <input type="text" name="bilangan">
    <input type="submit" name="submit" value="proses">
</form>


<?php 
if (isset($_POST['submit'])){
    $bilangan = $_POST['bilangan'];
    if ($bilangan % 2 == 0 ){
        echo $bilangan . " adallah bilangan genap ";
    } else {
        echo $bilangan . " adallah bilangan ganjil ";
    }
}
?>
