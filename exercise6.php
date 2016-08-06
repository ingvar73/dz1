<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 05.08.2016
 * Time: 2:04
 */
    $cars = array
    (
        'BMW' => array('model' => "X5", 'speed' => 120, 'doors' => 5, 'year' => "2015"),
        'TOYOTA' => array('model' => "Camry", 'speed' => 140, 'doors' => 4, 'year' => "2013"),
        'OPEL' => array('model' => "Astra", 'speed' => 130, 'doors' => 4, 'year' => "2014")
    ); // Объявляем многомерный массив
    foreach ($cars as $key => $value)
    {
        echo "<ul>";
        echo "CAR ".$key."<br>";
            echo "<li>";
            echo implode(" - ", $value), '<br>';
            echo "</li>";
        echo "</ul>";
    }

