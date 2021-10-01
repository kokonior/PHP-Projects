<?php

function salam($name = 'Admin' ) {
	return "Selamat Datang, $name";
}

function salam($date = 'Selamat Datang', $name = 'admin') {
	return "Selamat $date, $name";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Latihan Function</title>
</head>
<body>
	<h1>Hallo Selamat Datang <?= salam("Pagi"); ?></h1>
</body>
</html>
