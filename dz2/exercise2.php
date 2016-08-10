<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 10.08.2016
 * Time: 13:44
 */
    $arr_num = array(60, 2, 3, 4, 5, 6, 1, 7, 0, 23, 10);
    arr_disp($arr_num, '-');

    function arr_disp ($p1, $p2){

        if (!is_numeric($p1)) {
            switch ($p2) {
                case '-':
                    $res = 0;
                    for ($i = 0; $i < count($p1); $i++) {
                        $res -= $p1[$i];
                    }
                    echo "Результат вычитания всех " . count($p1) . " элементов массива - ".$res;
                    break;

                case '+':
                    $res = 0;
                    for ($i = 0; $i < count($p1); $i++) {
                        $res += $p1[$i];
                    }
                    echo "Результат сложения всех " . count($p1) . " элементов массива - ".$res;
                    break;

                case '*':
                    $res = 0;
                    for ($i = 0; $i < count($p1); $i++) {
                        $res *= $p1[$i];
                    }
                    echo "Результат умножения всех " . count($p1) . " элементов массива - ".$res;
                    break;

                case '/':
                    $res = 0;
                    for ($i = 0; $i < count($p1); $i++) {
                        if ($p1[$i] === 0 || isset($p1[$i])) {
                            exit('Деление на 0!');
                        } else {
                            $res /= $p1[$i];
                        }
                    }
                    echo "Результат деления всех " . count($p1) . " элементов массива - ".$res;
                    break;
                default:
                    echo "Ввели некорректное арифметическое действие";
                    break;
            }
        } else {
            echo "Массив содержит недопустимые символы или не является числовым!";
        }
    }