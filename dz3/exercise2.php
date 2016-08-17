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
        "Процессоры" => [
            "Intel" => ["Core i7-6950X" => 141900, "Core i7-6900K" => 89990],
            "AMD" => ["A10-7890K" => 10380, "A10-7860K" => 8390]],
        "Материнские платы" => ["ASUS", "ASRock", "MSI", "Gigabyte"],
        "Видеокарты" => ["NVidia", "Radeon"]]
];

//echo "<pre>";
//print_r($diff_array);

function arr_to_json($array){
    $fp = fopen('output.json', 'w');
    fwrite($fp, json_encode($array, JSON_UNESCAPED_UNICODE));
    fclose($fp);
}

arr_to_json($diff_array);

function change_json(){
    $arr = json_decode(file_get_contents('output.json'), true);
    foreach ($arr as $key => &$arr_2){
        foreach ($arr_2 as $key1 => &$value){
           //echo $key1."\n";
            foreach ($value as $key2 => &$val){
                if (is_array($val)) {
                    //print_r ($key2);
                    echo "\n";
                    //print_r ($val);
                    foreach ($val as $key3 => &$res) {
                        if (is_numeric($res)) {
                            $res *= 0.9; //Скидка в 10% на процессоры
                        }
                    }
                }
            }
            unset ($val);
        }
    }
    $fp = fopen('output2.json', 'w');
    fwrite($fp, json_encode($arr, JSON_UNESCAPED_UNICODE));
    fclose($fp);
}

change_json();

function get_different(){
    $array_1 = json_decode(file_get_contents('output.json'), true);
    $array_2 = json_decode(file_get_contents('output2.json'), true);

    echo "Разница между элементами файла output.json и файла output2.json<br>";
    print_r(array_diff($array_1["Компьютерные комплектующие"]["Процессоры"]["Intel"], $array_2["Компьютерные комплектующие"]["Процессоры"]["Intel"]));
    echo "<br />";
    print_r(array_diff($array_1["Компьютерные комплектующие"]["Процессоры"]["AMD"], $array_2["Компьютерные комплектующие"]["Процессоры"]["AMD"]));
}

get_different();