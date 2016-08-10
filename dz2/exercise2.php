<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 10.08.2016
 * Time: 13:44
 */
    $arr_num = array(3, 6, 6, 8, 12, 23, 0, 454, 667);
    arr_disp($arr_num, '/');
    function arr_disp ($p1, $p2){
        switch ($p2){
            case '-':
                echo "Результат вычитания всех ".count($p1)." элементов массива - ";
                $res = reset($p1);
                for ($i=0; $i<count($p1); $i++) {
                    $res -= $p1[$i];
                }
                echo $res;
                break;
            case '+':
                echo "Результат сложения всех ".count($p1)." элементов массива - ";
                $res = reset($p1);
                for ($i=0; $i<count($p1); $i++) {
                    $res += $p1[$i];
                }
                echo $res;
                break;
            case '*':
                echo "Результат умножения всех ".count($p1)." элементов массива - ";
                $res = reset($p1);
                for ($i=0; $i<count($p1); $i++) {
                    $res *= $p1[$i];
                }
                echo $res;
                break;
            case '/':
                echo "Результат деления всех ".count($p1)." элементов массива - ";
                $res = reset($p1);
                for ($i=0; $i<count($p1); $i++) {
                    if ($p1[$i] == 0)
                    $res /= $p1[$i];
                    break;
                }
                echo $res;
                break;
        }
    }