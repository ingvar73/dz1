<?php
/**
 * Задача #2

1.	Создайте массив, в котором имеется как минимум 1 уровень вложенности. Преобразуйте его в JSON.  Сохраните как output.json
2.	Откройте файл output.json. Измените данные. Сохраните как output2.json
3.	Откройте оба файла. Найдите разницу и выведите информацию об отличающихся элементах

 * Created by PhpStorm.
 * User: admin-pc
 * Date: 17.08.2016
 * Time: 15:36
 */

$diff_array = [
    "Компьютерные комплектующие" => [
        "Процессоры" => ["Intel" => [
            "Core i7-6950X" => "141900", "Core i7-6900K" => "89990"],
            "AMD" => ["A10-7890K" => "10380", "A10-7860K" => "8390"]],
        "Материнские платы" => ["ASUS", "ASRock", "MSI", "Gigabyte"],
        "Видеокарты" => ["NVidia", "Radeon"]],
    "Ноутбуки" => ["Ультрабуки", "MacBook", "Трансформеры", "Игровые"]
];

echo "<pre>";
print_r($diff_array);

function arr_to_json($array){
    $fp = fopen('output.json', 'w');
    fwrite($fp, json_encode($array, JSON_UNESCAPED_UNICODE));
    fclose($fp);
}

arr_to_json($diff_array);

function change_json(){
    $arr = json_decode(file_get_contents('output.json'), true);
    foreach ($arr as &$arr_2){
        foreach ($arr_2 as &$value){
            foreach ($value as $val){
                if (is_numeric($val)){
                    $val *= 0.9;
                }
            }
            unset ($value);
        }
    }
    $fp = fopen('output2.json', 'w');
    fwrite($fp, json_encode($arr, JSON_UNESCAPED_UNICODE));
    fclose($fp);
}

change_json();