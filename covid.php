<?php


function curl($url){
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);      
    return $output;
}

$send = curl("https://api.kawalcorona.com/indonesia/");

// mengubah JSON menjadi array
$data = json_decode($send, TRUE);

echo "<pre>";
print_r();
echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Covid Indonesia</title>
</head>
<body>
    
    <p>Negara : <?= $data[0]['name']; ?></p>
    <p>Positif : <?= $data[0]['positif']; ?></p>
    <p>Sembuh : <?= $data[0]['sembuh']; ?></p>
    <p>Meninggal : <?= $data[0]['meninggal']; ?></p>
    <p>Dirawat : <?= $data[0]['dirawat']; ?></p>

</body>
</html>
