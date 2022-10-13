<?php

function simpleArraySum($ar)
{
 
    $result = 0;
    foreach ($ar as $value)
    {
        $result += $value;
    }
    return $result;
}

$ar = array(1, 4, 7);
var_dump(simpleArraySum($ar));
