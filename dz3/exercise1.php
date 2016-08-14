<?php
/** Работа с XML
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 13.08.2016
 * Time: 14:42
 */

//$xml = simplexml_load_file("data.xml");
//foreach ($xml as $value){
//    echo 'Имя: '.$value->Name.'<br>';
//    echo 'Имя: '.$value->Street.'<br>';
//    echo 'Имя: '.$value->City.'<br>';
//    echo 'Имя: '.$value->State.'<br>';
//    echo 'Имя: '.$value->Zip.'<br>';
//    echo 'Имя: '.$value->Country.'<br>';
//    echo 'Имя: '.$value['Type'].'<br>';
//    echo 'Имя: '.$value->Items.'<br>';
//}

$xmlFile = __DIR__."/data.xml";
$xml = new SimpleXMLElement($xmlFile, NULL, TRUE);

$ship_name= $xml->xpath("///Name/*");
$ship_street = $xml->xpath("///Street");
$ship_city = $xml->xpath("///City");
echo "<pre>";
print_r($ship_name);
print_r($ship_street);
print_r($ship_city);
echo "</pre>";

file_put_contents($xmlFile, $xml->asXML());
