<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 05.08.2016
 * Time: 1:50
 */
    $day = 7;
    switch ($day)
    {
        case ($day >= 1 and $day < 6):
            echo "Это рабочий день";
            break;
        case ($day == 6 || $day == 7):
            echo "Это выходной день";
            break;
        default:
            echo "Неизвестный день";
    }
