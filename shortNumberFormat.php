<?php

// singkatin angka
// misal 100 rebu jadi 100k

function shortNumberFormat($num)
{
    // maks 100000000000000 = 100t

    if ($num > 1000)
    {
        $x               = round($num);
        $x_number_format = number_format($x);
        $x_array         = explode(',', $x_number_format);
        $x_parts         = array('k', 'M', 'B', 'T', 'P', 'E', 'Z', 'Y');
        $x_count_parts   = count($x_array) - 1;
        $x_display       = $x;
        $x_display       = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];

        return $x_display;
    }

    return $num;
}

echo shortNumberFormat(100000);
