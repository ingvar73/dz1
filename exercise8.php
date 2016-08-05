<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 05.08.2016
 * Time: 20:01
 */
    $str = "Душа моя озарена неземной радостью, как эти чудесные весенние утра, которыми я наслаждаюсь от всего сердца. Я совсем один и блаженствую в здешнем краю, словно созданном для таких, как я.";
    echo $str;
    echo "<br><br>";
    $res = explode(' ', $str);
    foreach ($res as $val) {
        print_r ($res);
    }
    echo "<br><br>";
    do {
    $str_new = implode ('#', $res);
    } while (!count($res));
    echo $str_new;