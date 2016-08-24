<?php
error_reporting(E_ALL);
require('classes/db.php');
require ('classes/validation.php');
session_start();
$db = DataBase::getDB();
////
$fdata = $_POST;

if (isset($_POST['enter'])) {
    $errors = array();

    $data = new Validation($_POST['login'], $_POST['password']);
    var_dump($data);

//    if(trim($_POST['login']) == ''){
//        $errors[] = 'Введите логин!';
//    }
//    if(trim($_POST['name']) == ''){
//        $errors[] = 'Введите имя!';
//    }
//    if(trim($_POST['age']) == ''){
//        $errors[] = 'Введите возраст!';
//    }
//    if(trim($_POST['about']) == ''){
//        $errors[] = 'Напишите кратко о себе!';
//    }
//    if($_POST['password'] == ''){
//        $errors[] = 'Введите пароль!';
//    }
//
//    if($_POST['password1'] != $_POST['password']){
//        $errors[] = 'Повторный пароль введен неверно!';
//    }

    if(empty($errors)){
        // регистрируем
        //$user = $db->query("INSERT INTO 'users'");
        echo '<div style="background-color: lightblue; color: green;">Вы успешно зарегистрированы!</div><hr />';
    } else {
        echo '<div style="background-color: lightcyan; color: red;">'.array_shift($errors).'</div><hr />';
    }
}
?>
<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css" media="screen, projection, print">
</head>
<body>
<div class="wrapper">

    <section id="header">
        <div class="container">
            <div class="page-header">
                <h1>Система регистрации и авторизации</h1>
            </div>
        </div>
    </section>

    <section id="form_input">
        <div class="container">
            <div class="row">
                <div class="col-md8 col-md-offset-1">
                    <form method=POST action="login.php">
                        <div class="form-inline">
                            <input type="text" name="login" class="form-control" placeholder="Введите логин" value="<?php echo @$fdata['login'];?>">
                        </div>
                        <div class="form-inline">
                            <input type="password" name="password" class="form-control" placeholder="Введите пароль">
                        </div>
                        <!--                            <div class="form-inline">-->
                        <!--                                <label for="exampleInputFile">Загрузить изображение</label>-->
                        <!--                                <input type="file" id="avatar">-->
                        <!--                            </div>-->
                        <button type="submit" name="enter" class="btn btn-default" value="Вход">Вход</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <div class="container">

    </div>
</div>
<div class="empty"></div>
<div class="footer">
    footer
</div>

<script src="http://code.jquery.com/jquery-3.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>