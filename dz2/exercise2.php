<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 10.08.2016
 * Time: 13:44
 */
    $arr_num = array(6, 2, 3, 4, 5, 6, 1, 2, 2, 3, 10);
    arr_disp($arr_num, ',');

    function arr_disp ($p1, $p2){

        if (isset($p1)) {
            switch ($p2) {
                case '-':
                    $res = 0;
                    for ($i = 0; $i < count($p1); $i++) {
                        $res -= $p1[$i];
                    }
                    break;

                case '+':
                    $res = 0;
                    for ($i = 0; $i < count($p1); $i++) {
                        $res += $p1[$i];
                    }
                    break;

                case '*':
                    $res = 1;
                    for ($i = 0; $i < count($p1); $i++) {
                        $res *= $p1[$i];
                    }
                    break;

                case '/':
                    $res = 1;
                    for ($i = 0; $i < count($p1); $i++) {
                        if (($p1[$i] == 0) || !isset($p1[$i])) {
                            exit('Деление на 0!');
                        } else {
                            $res /= $p1[$i];
                        }
                    }
                    break;
                default:
                    echo "Ввели некорректное арифметическое действие!";
                    exit;
            }
        } else {
            echo "Массив содержит недопустимые символы или не является числовым!";
            exit;
        }
        echo "Результат для \" {$p2} \" " . count($p1) . " элементов массива - ".$res;
    }