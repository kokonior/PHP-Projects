<?php
$subjek = 'Laporan BK-Digital';
$mailto = 'mamashildan48@gmail.com'; // Email lu


$body = <<<EOD
<br><hr><br>
Pengirim : <font color="red">Hildan Kusto Utomo</font> <br>
Pesan : <font color="red">no 127 sedang menyontek</font> <br>
EOD;


$headers = "From: demo@hildanku.eu\r\n"; // Buat nunjukin pengirim email.
$headers .= "Content-type: text/html\r\n";
$success = mail($mailto, $subjek." #".rand(1000,10000), $body, $headers);
?>
<?php
$random = rand(1000,5000);
?>

<meta content='0;url=./index.php' http-equiv='refresh'/>
</head><body>
</html>
