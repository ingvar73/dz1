<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 12.08.2016
 * Time: 1:23
 */
function table($row, $line) {
    echo "<table><tr>";
    if ((is_int($row)) & (is_int($line))) {
        if (($row >= 1) & ($line >= 1)) {
            for ($r = 1; $r <= $row; $r++) {
                for ($l = 1; $l <= $line; $l++) {
                    echo "<td>";
                    $result = $r * $l;
                    echo $result . "</td>";
                }
                if ($l != 10) echo "</tr><tr>";
            }
        }
    } else {
        echo "Введены неверные значения";
    }
    echo "</tr></table>";
}
table(14, 5);