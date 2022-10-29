<?php 
$mahasiswa = ["Rifki", "083865127691", "Universitas Genjot Madoka", "Email"];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Daftar Mahasiswa</title>
</head>
<body>

<ul>
	<?php foreach ($mahasiswa as $mhs) : ?>
		<li><?= $mhs; ?></li>
	<?php endforeach; ?>
</ul>

<ul>
	<li><?= $mahasiswa[0]; ?></li>
	<li><?= $mahasiswa[1]; ?></li>
	<li><?= $mahasiswa[2]; ?></li>
	<li><?= $mahasiswa[3]; ?></li>
</ul>
	
</body>
</html>

hektober bang
