<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 21.08.2016
 * Time: 17:24
 */
require "../classes/db.php";


$db = DataBase::getDB();
if($db) echo "База подключена" or die("Ошибка подключения!");