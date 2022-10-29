<?php

function nilai_akhir($nilai) {

    $nilai = $nilai;
    $grade = '';

    if ($nilai >= 90) {
        $grade = 'A';
    } elseif ($nilai >= 80) {
        $grade = 'B';
    } elseif ($nilai > 74) {
        $grade = 'C';
    } else {
        $grade = 'D';
    }

    if (isset($nilai)) {
        switch($grade) :
            case 'A':
                $grade = $grade . ' Sangat Baik';
            break;
            case 'B':
                $grade = $grade . ' Baik';
            break;
            case 'C':
                $grade = $grade . ' Cukup';
            break;
            case 'D':
                $grade = $grade . ' Kurang';
            break;
            default:
                $grade = 'Tidak Lulus';
            break;
        endswitch;
    }

    return 'Nilai anda ' . $nilai . ' dengan predikat ' . $grade;
}

echo nilai_akhir(60);