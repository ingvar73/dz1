<?php
include_once 'config.php';
session_start();
$CONNECT = mysqli_connect(HOST, USER, PASS, DB);
if ($CONNECT) ;
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
                    <h1>Страница авторизации</h1>
                </div>
            </div>
        </section>

        <section id="form_input">
            <div class="container">
                <div class="row">
                    <div class="col-md8 col-md-offset-1">
                            <form method="POST">
                                <div class="form-inline">
                                    <input type="text" class="form-control" id="login" placeholder="Login">
                                    <label for="login">Логин</label>
                                </div>
                                <div class="form-inline">
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                    <label for="password">Пароль</label>
                                </div>
<!--                                <div class="form-inline">-->
<!--                                    <label for="inputFile">Загрузить изображение</label>-->
<!--                                    <input type="file" id="inputFile">-->
<!--                                </div>-->
                                <!--                            <div class="checkbox">-->
                                <!--                                <label>-->
                                <!--                                    <input type="checkbox"> Check me out-->
                                <!--                                </label>-->
                                <!--                            </div>-->
                                <button type="submit" name="enter" class="btn btn-default">Войти</button>
                                <button type="reset" class="btn btn-default">Очистить</button>
                            </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="empty"></div>

    <div class="footer"></div>

    <script src="http://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>