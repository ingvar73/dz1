<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 12.08.2016
 * Time: 3:25
 */

//echo 'Текущее дата/время в Unix: '.time().'<br>';
//echo 'Текущее дата/время #1: '.date('D.M.Y H:i',time()).'<br>';
//echo 'Текущее дата/время #2: '.date('D.M.Y H:i').'<br>';
//echo '=======================================================<br>';
//
//$mt = mktime(0,0,0,0,0,0);
//echo $mt.'<br>';
//echo 'Преобразовано mktime: '.$mt.'<br>';
//echo 'Дата/время: '.date('d.m.Y H:i', $mt).'<br>';
//echo '=======================================================<br>';
//
//$mt = mktime(0,0,0,1,1,1970);
//echo $mt.'<br>';
//echo 'Преобразовано mktime: '.$mt.'<br>';
//echo 'Дата/время: '.date('d.m.Y H:i', $mt).'<br>';
//echo '=======================================================<br>';
//
//$mt = mktime(3,5,0,1,1,1970);
//echo $mt.'<br>';
//echo 'Преобразовано mktime: '.$mt.'<br>';
//echo 'Дата/время: '.date('d.m.Y H:i', $mt).'<br>';
//echo '=======================================================<br>';

$d = getdate();
    foreach ($d as $key => $value)
        echo "$key = $value<br>";
        echo "<hr>Сегодня: $d[mday].$d[month].$d[year]";

echo "<hr>";
echo date( "Сегодня d.m.y H:i" );

echo "<br><hr>";
echo date( "j of F Y, \a\\t g.i A, l", mktime( 13, 30, 0, 3, 20, 1973 ) );