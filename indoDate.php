<?php 
/* Dibuat Pada Tanggal : 01-10-2021
 * Nama project		: Indonesian Date
 * Require : PHP_8

 * Dibuat Oleh ♡ Yoppy0x100 @hacktoberfest
*/
date_default_timezone_set('Asia/Jakarta');

function toMonth($date) {
    $month = match($date) {
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Juni',
        '06' => 'Juli',
        '07' => 'Agustus',
        '08' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
        default => throw new exception('Can`t Parse Month'),
    };

    return $month;
}

function toDay($date) {
    $date = explode(':', $date);
    $day = match($date[1]) {
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jum`at',
        'Sat' => 'Sabtu',
        'Sun' => 'Minggu',
        default => throw new exception('Can`t To Parse Day'),
    };
    
    return $day . ', ' . $date[0];
}

/* 
    var $opt to increase / decrease date format
    ex:  date now, +1 day = tommorow date
         01-10-2021, +2 day = 03-10-2021
 */
function dateIndo($separator='/', $opt=null) {
    $date = isset($opt) ? date('d:D-m-Y', strtotime($opt)) : date('D-m-Y');
    $parse = explode('-', $date);
    
    return toDay($parse[0]) . $separator . toMonth($parse[1]) . $separator . $parse[2];
}

echo dateIndo(opt: '+10 Day');
// echo dateIndo(' ');