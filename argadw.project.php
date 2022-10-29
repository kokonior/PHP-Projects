<?php

function provinsi()
{
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, "https://api.kawalcorona.com/indonesia/provinsi/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $test = curl_exec($ch);
    curl_close($ch);

    $de = json_decode($test);

    for ($i=0;$i<=33;$i++)
    {
        $tab  = $i + 1;
        echo "\t\t". $tab . ". Kasus Di ".$de[$i]->attributes->Provinsi . "\n". PHP_EOL;
        echo "Positif    : ".$de[$i]->attributes->Kasus_Posi . PHP_EOL;
        echo "Sembuh     : ".$de[$i]->attributes->Kasus_Semb . PHP_EOL;
        echo "Meninggal  : ".$de[$i]->attributes->Kasus_Meni . PHP_EOL;
        echo "\n";
    }

}

function indonesia()
{
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,"https://api.kawalcorona.com/indonesia/");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    $indonesia = curl_exec($ch);
    curl_close($ch);

    $de = json_decode($indonesia);

    echo "\t\tKasus Di {$de[0]->name}\n" . PHP_EOL;

    echo "Positif   : {$de[0]->positif}" . PHP_EOL;
    echo "Sembuh    : {$de[0]->sembuh}" . PHP_EOL;
    echo "Meninggal : {$de[0]->meninggal}" . PHP_EOL;
    echo "Dirawat   : {$de[0]->dirawat}\n" . PHP_EOL;

}

function dunia()
{
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, "https://api.kawalcorona.com/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $glo = curl_exec($ch);
    curl_close($ch);

    $positif = curl_init();
    curl_setopt($positif,CURLOPT_URL, "https://api.kawalcorona.com/positif/");
    curl_setopt($positif, CURLOPT_RETURNTRANSFER, 1);
    $pos = curl_exec($positif);
    curl_close($positif);

    $sembuh = curl_init();
    curl_setopt($sembuh,CURLOPT_URL, "https://api.kawalcorona.com/sembuh/");
    curl_setopt($sembuh,CURLOPT_RETURNTRANSFER,1);
    $sehat = curl_exec($sembuh);
    curl_close($sembuh);

    $sembuhsehat = json_decode($sehat);
    var_dump($sembuhsehat);

    $decosat = json_decode($pos);
    $deco = json_decode($glo);

    var_dump($decosat);
    for ($i=0;$i<=191;$i++)
    {
        $tab  = $i + 1;
        echo "\t\t". $tab . ". Kasus Di ".$deco[$i]->attributes->Country_Region . "\n". PHP_EOL;
        echo "Positif    : ".$deco[$i]->attributes->Confirmed . PHP_EOL;
        echo "Sembuh     : ".$deco[$i]->attributes->Recovered . PHP_EOL;
        echo "Meninggal  : ".$deco[$i]->attributes->Deaths . PHP_EOL;
        echo "\n";


    }

    echo "{$decosat->name} : {$decosat->value} " . PHP_EOL;
    echo "{$sembuhsehat->name} : {$sembuhsehat->value} " . PHP_EOL;
}


echo "\t\tAPI DARI KAWALCORONA.COM\n" . PHP_EOL;
echo "1. Statistik Kasus Coronavirus di Indonesia\n";
echo "2. Statistik Kasus Coronavirus di Provinsi\n";
echo "3. Statistik Kasus Coronavirus di Dunia\n\n";
echo "Pilih No : ";
$api = fgets(STDIN);
if ($api == 1)
{
     indonesia();
} elseif ($api == 2)
{
     provinsi();
} elseif ($api == 3)
{
    dunia();
}
