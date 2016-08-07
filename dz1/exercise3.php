<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 04.08.2016
 * Time: 23:13
 */
    define ("PI", 3.14); // Объявление константы
    if (defined("PI") == true) echo "Константа объявлена<br>";
    echo 'ПИ = '.PI."<br>"; #Вывод константы
    define ("PI", 12);
    echo PI." - Константа не переопределена!";

