<?php

class detectbin
{

    var string $list;

    public function check()
    {
        $file = $this->list;

        $ec = explode("\r\n",$file);

        foreach ($ec as $bin)
        {
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,'https://antibot.pw/api/bin-check?bin='.$bin.'&apikey=5afa06a74008e597018f0264da473f3e');
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            $b = curl_exec($ch);
            curl_close($ch);
            $js = json_decode($b);

            echo "$js->bin - $js->brand $js->type $js->level $js->bank | $js->county_name" . PHP_EOL;

        }
    }
}

$btch = new detectbin();

if (!isset($argv[1]))
{
    echo "use php check.php list.txt";
    exit(1);
} {
    $link = $argv[1];
}

if (!file_exists($link)) die("File list : ".$link." Not found\n");
$binlist = explode("\n", file_get_contents($link));
echo "[+] Total Bin ".count($binlist)." [+]\n\n";
foreach ($binlist as $bulk)
{
    $btch->list = trim($bulk);
    $btch->check();
}

