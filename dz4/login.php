<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 21.08.2016
 * Time: 1:44
 */

error_reporting(E_ALL);
include_once 'auth.php';
require ('db-info.php');
session_start();
$CONNECT = new DataBase();
$CONNECT->connect($db_host, $db_user, $db_pass, $db_name);

if ($CONNECT) echo 'Соединение установлено... '."\n" or die("ERROR: ".mysqli_error());

if (isset($_POST['enter'])) {
    $login = $_POST['login'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $about = $_POST['about'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];}

    if (isset($login) or isset($name) or isset($email) or isset($password) or isset($password1)) {
        exit ('Ошибка валидации формы!');
    }

    if ($password !== $password1) {
        exit('Введенные пароли не совпадают!');
    }
    echo "Password OK!";

    $Row = $CONNECT->select("users", "SELECT 'login' FROM 'users' WHERE 'login' = '$login'");
    if ($Row['login']) {
        Exit('Логин <b>' . $_POST['login'] . '</b> уже используется!');
    }

    $Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT 'email' FROM 'users' WHERE 'email' = '$_POST[email]'"));
    if ($Row['email']) {
        Exit('Электронная почта <b>' . $_POST['email'] . '</b> уже используется!');
    }

    mysqli_query($CONNECT,
        "INSERT INTO 'users' VALUES ('', '$_POST[login]', '$_POST[password]', '$_POST[name]', '$_POST[age]', '$_POST[about]', NOW())");
    echo "Insert OK!";


function FormChars ($param) {
    return nl2br(htmlspecialchars(strip_tags(trim($param), ENT_QUOTES)), false);
}

?>