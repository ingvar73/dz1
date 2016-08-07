<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 05.08.2016
 * Time: 1:19
 */
    $age = 130;
    if ($age >= 18 and $age <= 66)
            echo "Вам еще работать и работать!";
        elseif ($age >= 1 and $age <= 17)
            echo "Вам еще рано работать";
        elseif ($age > 65 and $age < 120)
            echo "Вам пора на пенсию";
        else
            echo "Неизвестный возраст!";
