<?php

function salam($name) {
	return "Selamat Datang, $name";
}

function salam($date, $name) {
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
	<h1><?= salam("Pagi"); ?></h1>
</body>
</html>
