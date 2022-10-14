<?php
$subjek = 'Laporan BK-Digital';
$mailto = 'xliyobo10@gmail.com'; // Email lu


$body = <<<EOD
<br><hr><br>
Pengirim : <font color="red">Hildan Kusto Utomo</font> <br>
Pesan : <font color="red">no 127 sedang menyontek</font> <br>
EOD;


$headers = "From: sender@emailsender.eu\r\n"; // Buat nunjukin pengirim email.
$headers .= "Content-type: text/html\r\n";
$success = mail($mailto, $subjek." #".rand(1000,10000), $body, $headers);
?>

<meta content='0;url=./index.php' http-equiv='refresh'/>
</head><body>
</html>
