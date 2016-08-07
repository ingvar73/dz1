<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 06.08.2016
 * Time: 22:11
 */
//function recursion($a)
//{
//    echo 'Вход в функцию'.$a.' ';
//    if ($a < 20) {
//        echo "Условие $a\n";
//        recursion($a + 1);
//    }
//}
//recursion(0);
//
//function fib($n) {
//    if ($n < 2) return $n;
//    else return (fib($n - 1) + fib($n - 2));
//}
//$res = fib(12);
//echo $res;
//echo "<br><br>";

$x = 2;
$m = 9;
function myDegree($x, $m){
    if($m == 0){
        return 1;
    } else if($m > 0) {
        return $x * myDegree($x, $m - 1);
    }
}
$y = myDegree($x, $m);
echo $y;