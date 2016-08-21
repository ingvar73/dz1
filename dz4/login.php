<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 21.08.2016
 * Time: 1:44
 */

error_reporting(E_ALL);
include_once 'auth.php';
include 'db-info.php';
//session_start();
$CONNECT = new DataBase();
$CONNECT->connect($db_host, $db_user, $db_pass, $db_name);

if ($CONNECT) echo 'OK!' or die("ERROR: ".mysqli_error());

if (isset($_POST['enter'])) {
    $_POST['login'] = FormChars($_POST['login']);
    echo $_POST['login'];
    $_POST['name'] = FormChars($_POST['name']);
    echo $_POST['name'];
    $_POST['age'] = FormChars($_POST['age']);
    echo $_POST['age'];
    $_POST['about'] = FormChars($_POST['about']);
    $_POST['password'] = FormChars($_POST['password']);
    $_POST['password1'] = FormChars($_POST['password1']);}

    if (!$_POST['login'] or !$_POST['name'] or !$_POST['email'] or !$_POST['password'] or !$_POST['password1']) {
        exit ('Ошибка валидации формы!');
    }
    echo "OK!";

    if ($_POST['password'] != $_POST['password1']) {
        exit('Введенные пароли не совпадают!');
    }
    echo "Password OK!";

    $Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT 'login' FROM 'users' WHERE 'login' = '$_POST[login]'"));
    if ($Row['login']) {
        Exit('Логин <b>' . $_POST['login'] . '</b> уже используется!');
    }

    $Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT 'email' FROM 'users' WHERE 'email' = '$_POST[email]'"));
    if ($Row['email']) {
        Exit('Электронная почта <b>' . $_POST['email'] . '</b> уже используется!');
    }

    mysqli_query($CONNECT,
        "INSERT INTO 'users' VALUES ('', '$_POST[login]', '$_POST[password]', '$_POST[name]', '$_POST[age]', '$_POST[about]', NOW())");
    echo "OK!";


function FormChars ($param) {
    return nl2br(htmlspecialchars(strip_tags(trim($param), ENT_QUOTES)), false);
}

?>