<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 21.08.2016
 * Time: 17:24
 */
require "../classes/db.php";

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "gbook";

$db = DataBase::getDB($db_host, $db_user, $db_pass, $db_name);
if($db) echo "База подключена" or die('Ошибка подключения!');