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
	
</body>
</html>
