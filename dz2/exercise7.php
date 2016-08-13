<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 12.08.2016
 * Time: 21:37
 */
$str1 = "Карл у Клары украл Кораллы";
$str2 = "Две бутылки лимонада";

function replace ($str, $replace_sym, $new_str){
    return str_replace($replace_sym, $new_str, $str);
}


echo replace($str1, "К", "");
echo "<br />";
echo replace($str2, "Две", "Три");