<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 17.08.2016
 * Time: 22:08
 */
$url = 'https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json';
$ch = curl_init($url); // Инициализация строки
//Устанавливаем параметры
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$result = curl_exec($ch); // Выполнение запроса
curl_close($ch); // Завершаем сессию
preg_match('/("title":".*?)\"/', $result, $data);
echo $data[0]."<br />";
preg_match('/("pageid":)[\d]+/', $result, $data);
echo $data[0]."<br />";