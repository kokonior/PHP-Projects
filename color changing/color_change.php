<html>
	<body>
		<table border="1" align="center" width="30%">
			<?php
				$cource=array('cyan'=>'bca','blue'=>'mca','white'=>'bba','purple'=>'bcom','maroon'=>'mcom','pink'=>'pgdca','yellow'=>'bsc','darkblue'=>'bsw');
				
				$i=1;
				echo "<tr><th>Sr.No</th><th>Cource</th></tr>";
				foreach($cource as $k=>$v){
					echo "<tr bgcolor=$k align='center'><td>$i</td><td>$v</td></tr>";
				$i++;
				}
			?>
		</table>
	</body>
</html>