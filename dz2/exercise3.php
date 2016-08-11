<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 11.08.2016
 * Time: 18:09
 */
    function calcEverything ($symbol, ...$args){
        // проверка на числа
        foreach ($args as $value){
            if (!is_numeric($value) && $args === 0){
                exit ("Данные не являются числами");
            }
        }
        if (!is_numeric($args)){
            exit ("Данные не содержат чисел");
        }
        switch ($symbol){
            case '+':
                return array_sum($args);
            case '-':
                return (-1*array_sum($args));
            case '*':
                $res = 1;
                foreach ($args as $value) {
                    $res *= $value;
                }
                return $res;
            case '/':
                $res = 1;
                    /*Проверка деления на ноль*/
                    if (in_array(0, $args)) {
                        exit('Деление на 0!');
                    } else {
                        foreach ($args as $value) {
                            $res /= $value;
                        }
                    }
                return $res;
            default:
                exit("Вы ввели некорректное арифметическое действие");
        }
    }

    echo calcEverything('*', 2,"0",5,6);