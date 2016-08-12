<?php
/** Палиндром
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 12.08.2016
 * Time: 1:56
 */
error_reporting(-1);

showPal(is_palindrome('А роза ПАЛА на лапУ азора'));

function is_palindrome($param){
    $param = trim($param);
    $param = mb_strtolower($param);
    $length = mb_strlen($param);
    $halfLength = floor($length);
    $lastIndex = $length - 1;
    for ($i = 0; $i <= $halfLength; $i++){
        if ($param[$i] != $param[$lastIndex - $i]){
            return false;
        }
        return true;
    }
}

function showPal($param){
    if ($param) {
        echo "Строка является палиндромом";
    } else {
        echo "Строка не является палиндромом";
    }
}
