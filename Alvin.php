<?php
require_once "templates/header.php";

if (! playersRegistered()) {
    header("location: index.php");
}

if ($_POST['cell']) {
    $win = play($_POST['cell']);

    if ($win) {
        header("location: result.php?player=" . getTurn());
    }
}

if (playsCount() >= 9) {
    header("location: result.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Exanthenon</title>
	<style>
		.kotak {
			width: 50px;
			height: 50px;
			background-color: salmon;
			text-align: center;
			line-height: 50px;
			margin: 3px;
			float: left;
		}
		.clear { clear: both; }
	</style>
</head>
	<body>

	<?php for( $i = 0; $i < count($angka); $i++ ) { ?>
	<div class="kotak"><?php echo $angka[$i]; ?></div>
	<?php } ?>

<div class="clear"></div>

	<?php foreach ($angka as $a) { ?>
	<div class="kotak"><?php echo $a; ?></div>
	<?php } ?>

	<div class="clear"></div>

	<?php foreach ( $angka as $a ) : ?>
	<div class="kotak"><?= $a; ?></div>
	<?php endforeach ?>
	
</body>
</html>
