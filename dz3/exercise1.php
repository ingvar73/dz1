<?php
/** Работа с XML
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 13.08.2016
 * Time: 14:42
 */

$xml = simplexml_load_file("data.xml");

foreach ($xml->Address as $value) {
    echo "<p></p><b>Name:</b> " . $value->Name . "<br />" .
        "<b>Street:</b> " . $value->Street . "<br />" .
        "<b>City:</b> " . $value->City . "<br />" .
        "<b>State:</b> " . $value->State . "<br />" .
        "<b>Zip:</b> " . $value->Zip . "<br />" .
        "<b>Country:</b> " . $value->Country . "<br />";
}

    echo "<br /><b>DeliveryNotes</b>: " . $xml->DeliveryNotes . "<br />";

foreach ($xml->Items->Item as $value) {
    echo "<p></p><b>ProductName:</b> " . $value->ProductName . "<br />" .
        "<b>Quantity:</b> " . $value->Quantity . "<br />" .
        "<b>USPrice:</b> " . $value->USPrice . "<br />" .
        "<b>ShipDate:</b> " . $value->ShipDate . "<br />" .
        "<b>Comment:</b> " . $value->Comment . "<br />";
}

//$url = 'http://xn----ctbffvelkfbdcznp.xn--p1ai/';
//$xml_html = simplexml_load_file($url) or die("Can't connect URL!");
//echo "<pre>";
//print_r($xml_html);
//echo "</pre>";
//
//foreach ($xml_html->channel->item as $item){
//    printf('<li><a href="%s">%s</a></li>', $item->link, $item->title);
//}