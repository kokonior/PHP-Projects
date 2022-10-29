<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Star</title>
</head>
<body>

	<form action="" method="POST" class="form">
		<h3>Masukan Jumlah Bintang</h3>
		Jumlah bitang<input type="number" name="bintang">
		<br>
		<input type="submit" name="submit" value="submit">
	</form>

<?php 
	
	if (isset($_POST['submit'])) {
		$bin = $_POST['bintang'];
	

 	for ($i=1; $i <= $bin ; $i++) { 
 		for ($j=1; $j <= $i ; $j++) { 
 		echo "<p class='bintang'>*</p>";
 		}
 		echo "<br>";
 	}	
}


 ?>
</body>
</html>
