<?php

$angka = [3,2,15,20,11,77,89];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Exanthenon</title>
	<style>
		div {
			width: 50px;
			height: 50px;
			background-color: salmon;
			text-align: center;
			line-height: 50px;
			margin: 3px;
			float: left;
		}
	</style>
</head>
<body>

	<?php for( $i = 0; $i < 7; $i++ ) { ?>
	<div><?php echo $angka[$i]; ?></div>
	<?php } ?>
	
</body>
</html>
