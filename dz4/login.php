<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 21.08.2016
 * Time: 1:44
 */

error_reporting(E_ALL);
include_once 'classes/db.php';
require('config/dbconnect.php');
require ('classes/validation.php');
session_start();
$CONNECT = new DataBase();
$CONNECT->connect($db_host, $db_user, $db_pass, $db_name);

if ($CONNECT) echo 'Соединение установлено... '."\n" or die("ERROR: ".mysqli_error());

// Подключаем класс валидации
$fdata = new Validation($_POST);

// Получаем данные формы
echo "<pre>";
print_r($fdata);

if (isset($_POST['enter'])) {
    $errors = array();

    if(trim($_POST['login']) == ''){
        $errors[] = 'Введите логин!';
    }
    if(trim($_POST['name']) == ''){
        $errors[] = 'Введите имя!';
    }
    if(trim($_POST['age']) == ''){
        $errors[] = 'Введите возраст!';
    }
    if($_POST['password'] == ''){
        $errors[] = 'Введите пароль!';
    }

    if($_POST['password1'] != $_POST['password']){
        $errors[] = 'Повторный пароль введен неверно!';
    }

    if(empty($errors)){
        // регистрируем
    } else {
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr />';
    }
}

//    if (isset($login) or isset($name) or isset($email) or isset($password) or isset($password1)) {
//        exit ('Ошибка валидации формы!');
//    }


//    $Row = $CONNECT->select("users", "SELECT 'login' FROM 'users' WHERE 'login' = '$login'");
//    if ($Row['login']) {
//        Exit('Логин <b>' . $_POST['login'] . '</b> уже используется!');
//    }

//    $Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT 'email' FROM 'users' WHERE 'email' = '$_POST[email]'"));
//    if ($Row['email']) {
//        Exit('Электронная почта <b>' . $_POST['email'] . '</b> уже используется!');
//    }
//
//    mysqli_query($CONNECT,
//        "INSERT INTO 'users' VALUES ('', '$_POST[login]', '$_POST[password]', '$_POST[name]', '$_POST[age]', '$_POST[about]', NOW())");
//    echo "Insert OK!";
//
//
//function FormChars ($param) {
//    return nl2br(htmlspecialchars(strip_tags(trim($param), ENT_QUOTES)), false);
//}

?>