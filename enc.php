<?php
echo "
1. Encrypt Blank Base
2. Encrypt Blank Quoted

" . PHP_EOL;
echo "Select List : ";
$list = trim(fgets(STDIN));

echo "Encrypt your text here : ";
$text = trim(fgets(STDIN));


if ($list == 1) {
    

    $enc = implode('^',str_split($text));
    $str = str_replace('^','##blankquoted'. rand(1,10) . '##',$enc);
    echo $str . '##blankbase' . rand(1,10) . '##';

} elseif ($list == 2) {
    $enc = implode('^',str_split($text));
    $str = str_replace('^','##blankquoted'. rand(1,10) . '##',$enc);
    echo $str . '##blankquoted' . rand(1,10) . '##';
} else
{
    echo "Wrong Input Menu !!" . PHP_EOL;
    exit(1);
}
