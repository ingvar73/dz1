<?php
/** Работа с директориями и файлами
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 13.08.2016
 * Time: 12:07
 */

// Читаем директории
function test_file($param)
{
    $dir = opendir('.');
        if (!file_exists($param)) {
            echo 'Файл существует по указанному пути:<br>';
            echo realpath($param).'<br>'.basename($param);
        } else {
            echo "Файл не существует!";
        }
}

/*
1.	Создайте средствами ОС файл test.txt и поместите в него текст “Hello, world”
2.	Напишите функцию, которая будет принимать имя файла, открывать файл и выводить содержимое на экран.
*/

function file_read($file){
    test_file($file_);
    $file_name = file ($file);
    foreach ($file_name as $value){
        echo 'Содержимое файла '.$file.'<br>'.$value.'<br>';
    }
}

file_read('text.txt');

/*
Создайте файл anothertest.txt средствами PHP. Поместите в него текст - “Hello again!”
*/

file_create("anothertest.txt", "Hello again!");

function file_create($name, $text){
    $fp = fopen($name, "w");
    fwrite($fp, $text);
    fclose($fp);
}