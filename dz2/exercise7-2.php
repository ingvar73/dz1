<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 12.08.2016
 * Time: 22:26
 */
function smile(){
    echo "¯\_(ツ)_/¯";
    echo "<br />";
}

$number='Мой номер сотового: +7 916-905-37-18';
if (!preg_match("/(\+7\s|8\s)([\d|\s|-]{13})/",$number, $matches))
    echo 'В строке '.$number.' не найден российский номер мобильного!';
    else echo 'Найден номер '.$matches[0];
    echo "<br>";
    echo "<hr>";
    echo "<br>";

function rx_packets ($string) {
    $smile = "#\:\)#";
    preg_match($smile, $string, $result_temp);
    if($result_temp[0] == ":)") {
        smile();
    } else {
        // Проверяем на количество пакетов
        preg_match("#(RX.*?)\s#i", $string, $result_temp);
        preg_match("#\d.*#", $result_temp[0], $result);
        if ((int)$result[0] > 1000) {
            echo "Сеть есть";
        } else {
            echo "Сети нет!";
        }
    }
}
rx_packets ("RX packets:10011 errors:0 :) dropped:0 overruns:0 frame:0. ");