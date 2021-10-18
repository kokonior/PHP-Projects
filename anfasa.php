<?php


$rows = 6;

leftRightArrowsPattern($rows);

function leftRightArrowsPattern($rows) {
    $r = $r1 = $c = $row1 = 0;

    $row1 = $rows;
    $rows = $rows * 4;

    echo "----Panah Ke Kiri-----\n\n";
    for ($r = 1; $r < $rows; $r++) {
        // to print the left arrow
        if ($r <= $row1) {
            for ($c = 1; $c <= ($row1 - $r); $c++)
                echo " ";
            for ($c = $r;$c <= $row1; $c++)
                echo "*";
            echo "\n";
        }
        if ($r > $row1 && $r <= $row1 * 2) {
            for ($c = 1; $c <= ($r - $row1); $c++)
                echo " ";
            for ($c = 1; $c <= ($r - ($row1 - 1)); $c++) {
                if (($r - $row1) < $row1)
                    echo "*";
            }
            echo "\n";
        }

        if ($r > $row1 * 2 && $r <= $row1 * 3) {
            if ($r == ($row1 * 2) + 1)
                echo "\n----Panah Ke Kanan-----\n\n";
            for ($c = ($r - 1) - ($row1 * 2); $c >= 1; $c--)
                echo "  ";
            for ($c = (3 * $row1) - ($r - 1); $c >= 1; $c--)
                echo "*";
            echo "\n";
        }
        if ($r > $row1 * 3) {
            for ($c = ($row1 * 4) - ($r + 1); $c >= 1; $c--)
                echo "  ";
            for ($c = ($r + 1) - (3 * $row1); $c >= 1; $c--)
                echo "*";
            echo "\n";
        }
    }
}

?>
