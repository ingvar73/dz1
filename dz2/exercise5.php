<?php
/** Палиндром
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 12.08.2016
 * Time: 1:56
 */
showPal('qwertytrewq');

function is_palindrome($param){
    return $param == strrev($param);
}

function showPal($param){
    for ($i = iconv_strlen($param); $i >= 0; $i--){
        $str .= $param[$i];
    }
    if ($str == $param) {
        echo "Строка является палиндромом";
    } else {
        echo "Строка не является палиндромом";
    }
}
