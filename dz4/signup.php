<?php
error_reporting(E_ALL);
//require_once "config/config.php";
require_once 'classes/db.php';
require ('classes/validation.php');
session_start(); // старт сессии
//$db = DataBase::getDB(); // подключение к базе данных
//
$fdata = $_POST;
// Получаем данные формы

if (isset($_POST['enter'])) {
//    $errors = array();

    $data = new ValidationReg($_POST['login'], $_POST['name'], $_POST['age'], $_POST['about'], $_POST['password'], $_POST['password1']);

if ($data->result == true){
//    echo "Пишем в базу!";
    $login = htmlentities(strip_tags(trim($_POST['login'])), ENT_QUOTES);
    $name = htmlentities(trim($_POST['name']), ENT_QUOTES);
    $age = (int)($_POST['age']);
    $about = htmlentities(strip_tags(trim($_POST['about'])), ENT_QUOTES);
    $pass = htmlentities(strip_tags(trim($_POST['password'])), ENT_QUOTES);

//    проверяем логин на уникальность
    $query = "SELECT login FROM users WHERE  login = '".$login."' LIMIT 1";
    $result = $mysql->query($query) or die("ERROR: ".$mysql->error);
    $value = $result->num_rows;
    var_dump($value);
    if ($value > 0){
        print ("Пользователь с таким именем существует. Пожалуйста вернитесь назад и измените login");
    } else {
        // регистрируем
        $sql = "INSERT INTO users (id, login, name, age, about, password) VALUES (NULL, ?, ?, ?, ?, ?)";
        if ($stmt = $mysql->prepare($sql)) {
            $stmt->bind_param('ssiss', $login, $name, $age, $about, $pass);
            $stmt->execute();
            var_dump($stmt);
            $stmt->close();
            $mysql->close();
            $_SESSION["login"] = $login;
            $_SESSION["password"] = $pass;
            print ('<div style="background-color: lightblue; color: green;">Вы успешно зарегистрированы!</div><hr />');
//            header("location: login_success.php");
        }
    }
} else {
        echo '<div style="background-color: lightcyan; color: red;">Ошибка записи данных, проверьте правильность заполнения!</div><hr />';
    }
}
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <title>Система регистрации и авторизации</title>
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
                        <form method=POST action="signup.php">
                            <div class="form-inline">
                                <input type="text" name="login" class="form-control" placeholder="Login" value="<?php echo @$fdata['login'];?>">
                            </div><br />
                            <div class="form-inline">
                                <input type="text" name="name" class="form-control" placeholder="Имя" value="<?php echo @$fdata['name'];?>">
                            </div><br />
                            <div class="form-inline">
                                <input type="text" name="age" class="form-control" placeholder="Ваш возраст" value="<?php echo @$fdata['age'];?>">
                            </div><br />
                            <div class="form-inline">
                                <textarea rows="10" name="about" cols="23" placeholder="О себе" value="<?php echo @$fdata['about'];?>"></textarea>
                            </div><br />
                            <div class="form-inline">
                                <input type="password" name="password" class="form-control" placeholder="Пароль">
                            </div><br />
                            <div class="form-inline">
                                <input type="password" name="password1" class="form-control" placeholder="Повторите пароль">
                            </div><br />
<!--                            <div class="form-inline">-->
<!--                                <label for="exampleInputFile">Загрузить изображение</label>-->
<!--                                <input type="file" id="avatar">-->
<!--                            </div>-->
                            <button type="submit" name="enter" class="btn btn-default" value="Регистрация">Регистрация</button>
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