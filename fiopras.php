<html>
<body>
<form name=”form” action=”no5a.php” method=”post”>
<label>Masukkan Nilai : </label><input type=”text” name=”nilai”/>
<input type=”submit” value=”submit”>
</form><?php
/*—————-tampilan bintang kotak———————–*/if(isset($_POST[‘nilai’])){
$nilai=$_POST[‘nilai’];
for ($i=0; $i<$nilai; $i++) {
for($a=0;$a<$nilai;$a++){
echo “+”;
}
echo “</br>”;
}
echo “</br>”;
}
?>
</body>
</html>
