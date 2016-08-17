<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 17.08.2016
 * Time: 20:43
 */
$arr = [];
function chet ($i){
    if (is_numeric($i)){
        if ($i & 1){
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}

for ($i = 0; $i < 50; $i++){
    $arr[$i] = rand(1, 100);
}

$fp = fopen('random.csv', 'w');
fputcsv($fp, $arr);
fclose($fp);

$fp = fopen('random.csv', 'r');
$new_arr = fgetcsv($fp, 0, ",");

do{
    foreach ($new_arr as $value){
        if (chet($value)){
            $sum += $value;
        }
    }
} while (count($new_arr) == 0);

echo "Сумма всех четных элементов массива из файла: ".$sum;