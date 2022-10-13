<?php
$judul = "
\033[01;31m ___    _                  _    _
(  _`\ (_ )               ( )_ ( )                         
| ( (_) | |  _   _    ___ | ,_)| |__       ___ ___     __  
| |  _  | | ( ) ( ) /'___)| |  |  _ `\   /' _ ` _ `\ /'__`\ \033[0m
| (_( ) | | | (_) |( (___ | |_ | | | | _ | ( ) ( ) |(  ___/
(____/'(___)`\___/'`\____)`\__)(_) (_)(_)(_) (_) (_)`\____) 

Quotes Bullshit Maker - Made By : https://github.com/CluthcM3
";

class quotes
{


    function quotes_anjay()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://type.fit/api/quotes");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $ress = curl_exec($ch);
        curl_close($ch);

        $decode = json_decode($ress);



        echo "Isi 1 - 1642 : ";
        $inp = trim(fgets(STDIN));

        if (!is_numeric($inp))
        {
            echo "\nDi isi gblog" . PHP_EOL;
        } else
        {
            for ($i=0 ; $i < $inp ; $i++)
            {
                $no = $i + 1;
                $randomquotes = array_rand($decode);
                echo "$no. {$decode[$randomquotes]->author} - {$decode[$randomquotes]->text}" . PHP_EOL;
            }
        }

    }

}

$result = new quotes();
echo $judul . PHP_EOL;
$result->quotes_anjay();
