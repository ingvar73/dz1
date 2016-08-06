<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 05.08.2016
 * Time: 18:41
 */
    echo "<table><tr>";
    for ($i = 1; $i <= 10; $i++) {
        for ($j = 1; $j <= 10; $j++) {
            echo "<td>";
            if ($i % 2 == 0 and $j % 2 == 0) // условие для четных индексов
                echo "(" . ($i * $j) . ")</td>";
            elseif ($i % 2 != 1 and $j % 2 != 1) // условие для нечетных индексов
                echo "[" . ($i * $j) . "]</td>";
            else
                echo ($i * $j) . "</td>";
        }
            if ($i != 10)
                echo "</tr><tr>";
    }
    echo "</tr></table>";