<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 04.08.2016
 * Time: 23:13
 */
    define ("pi", 3.14, true); // Объявление константы
    if (defined("pi") == true) echo "Константа объявлена<br>";
    echo 'PI = '.PI."<br>"; #Вывод константы
    define ("PI", 12);
    echo PI." - Константа переопределена!";

