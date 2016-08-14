<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 13.08.2016
 * Time: 21:00
 */
include "func.php";
require_once '../Faker/src/autoload.php';
$faker = Faker\Factory::create();

$host = 'localhost';
$base = 'php04';
$user = 'mysql';
$pass = '';

//$link = mysqli_connect($host, $user, $pass);
//if (!$link) echo "Не удалось подключиться к серверу";
//else {
//    mysqli_select_db($base);
//}

$connection = @new mysqli($host, $user, $pass, $base);
    if (mysqli_connect_errno()){
        die(mysqli_connect_error());
    } else {
        echo "MYSQLI connection OK! ".$connection->host_info."\n";
    }

$connection->query('SET NAMES "UTF-8"');

//создание таблиц
//$sql = "
//CREATE TABLE `contacts` (
//    `id` int(11) NOT NULL AUTO_INCREMENT,
//    `user_id` int(11) NOT NULL,
//    `type` enum('email', 'phone') NOT NULL,
//    `contact` VARCHAR(100) NOT NULL,
//    PRIMARY KEY (`id`)
//) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
//$connection->query($sql);
//
//$sql = "
//CREATE TABLE `users` (
//    `id` int(11) NOT NULL AUTO_INCREMENT,
//    `firstName` VARCHAR(150) NOT NULL,
//    `lastName` VARCHAR(150) NOT NULL,
//    `address` VARCHAR(150) NOT NULL,
//    PRIMARY KEY (`id`)
//) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
//$connection->query($sql);

//Очищение таблицы

//$connection->query('drop table `contacts` ');
//$connection->query('drop table `users` ');

////// Добавление данных
//$sqluser = 'insert into `users`(`firstName`, `lastName`, `address`) values (?,?,?);';
//$sqlcontact = 'insert into `contacts`(`user_id`, `type`, `contact`) values (?,?,?);';
//
//$countUsers = 0;
//$countContacts = 0;
//for ($u = 0; $u < 20; $u++) {
//    $stmt = $connection->prepare($sqluser);
//    $firstName = $faker->firstName;
//    $lastName = $faker->lastName;
//    $address = $faker->postcode.', '.$faker->streetAddress.', '.$faker->city.', '.$faker->state;
//
//    $stmt->bind_param('sss', $firstName, $lastName, $address);
//    $stmt->execute();
//    $countUsers++;
//
//    $user_id = $connection->insert_id;
//
//    $n = mt_rand(1,4);
//    for ($i = 0; $i < $n; $i++) {
//        $t = mt_rand(0,1);
//            switch ($t){
//                case 0: $type = 'email';
//                        $value = $faker->email;
//                        break;
//                case 1: $type = 'phone';
//                        $value = $faker->phoneNumber;
//                        break;
//            }
//        $countContacts++;
//        $stmt = $connection->prepare($sqlcontact);
//        $stmt->bind_param('iss', $user_id, $type, $value);
//        $stmt->execute();
//    }
//}
//
//echo 'Добавлено пользователей '.$countUsers.'<br>';
//echo 'Добавлено контактов'.$countContacts.'<br>';

//Выборка данных

//$sql = 'SELECT * FROM `users` ';
//$result = $connection->query($sql);
//$records = $result->fetch_all(MYSQLI_ASSOC);
//echo table($records);
//
//$sql = 'SELECT * FROM `contacts` ';
//$result = $connection->query($sql);
//$records = $result->fetch_all(MYSQLI_ASSOC);
//echo table($records);

// выборка - объединение

//$sql = '
//    SELECT users.*, contacts.*
//    FROM users
//    LEFT JOIN contacts
//    ON contacts.user_id = users.id';
    
//    UNION
//    
$sql = 'SELECT users.*, contacts.*
    FROM users
    RIGHT JOIN contacts
    ON users.id = 12
';

$result = $connection->query($sql);
$records = $result->fetch_all(MYSQLI_ASSOC);
echo table($records);