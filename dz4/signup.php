<?php
error_reporting(E_ALL);
//require_once "config/config.php";
require_once 'classes/db.php';
require ('classes/validation.php');
session_start(); // старт сессии
//$db = DataBase::getDB(); // подключение к базе данных
//
$dir = 'uploads/';
$pattern_img = '/[.](JPG)|(jpg)|(gif)|(GIF)|(png)|(PNG)$/';
$pattern_gif = '/[.](GIF)|(gif)$/';
$pattern_jpg = '/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/';
$pattern_png = '/[.](PNG)|(png)$/';
$fdata = $_POST;
// Получаем данные формы

if (isset($_POST['enter'])) {
//    $errors = array();

    $data = new ValidationReg($_POST['login'], $_POST['name'], $_POST['age'], $_POST['about'], $_POST['password'], $_POST['password1'], $_FILES['avatar']);

if ($data->result == true){
//    echo "Пишем в базу!";
    $login = htmlentities(strip_tags(trim($_POST['login'])), ENT_QUOTES);
    $name = htmlentities(trim($_POST['name']), ENT_QUOTES);
    $age = (int)($_POST['age']);
    $about = htmlentities(strip_tags(trim($_POST['about'])), ENT_QUOTES);
    $pass = htmlentities(strip_tags(trim($_POST['password'])), ENT_QUOTES);
    if    (!empty($_POST['avatar'])) //проверяем, отправил    ли пользователь изображение
    {
        $avatar = $_POST['avatar'];    $avatar = trim($avatar);
        if ($avatar =='' or empty($avatar)) {
            unset($fupload);// если переменная $fupload пуста, то удаляем ее
        }
    }
    if    (!$data->ver_avatar($avatar) == false)
    {
        //если переменной не существует (пользователь не отправил    изображение),то присваиваем ему заранее приготовленную картинку с надписью    "нет аватара"
        $avatar    = "uploads/net-avatara.jpg"; //нарисовать net-avatara.jpg или взять в исходниках
    } else {
        // загружаем изображение пользователя
        // проверяем загружен ли аватар, елси нет то грузим пустой аватар
        if(preg_match($pattern_img, $_FILES['avatar']['name'])){
            $filename = $_FILES['avatar']['name'];
            $source = $_FILES['avatar']['tmp_name'];
            $target = $dir.$filename;
            move_uploaded_file($source, $target);
            if(preg_match($pattern_gif, $filename)){
                $im = imagecreatefromgif($dir.$filename); //создаем в формате GIF
            }
            if(preg_match($pattern_png, $filename)){
                $im = imagecreatefrompng($dir.$filename); //создаем в формате PNG
            }
            if(preg_match($pattern_jpg, $filename)){
                $im = imagecreatefromjpeg($dir.$filename); //создаем в формате JPG
            }
            // Создание изображение "Взято с сайта www.codenet.ru"
            $w = 90;
            $w_src = imagesx($im); //вычисляем ширину
            $h_src = imagesy($im); //вычисляем высоту
            $dest = imagecreatetruecolor($w, $w);
            if($w_src > $h_src)
                imagecopyresampled($dest, $im, 0, 0, round((max($w_src, $h_src) - min($w_src, $h_src))/2), 0, $w, $w, min($w_src, $h_src), min($w_src, $h_src));
            if($w_src < $h_src)
                imagecopyresampled($dest, $im, 0, 0,    0, 0, $w, $w, min($w_src,$h_src), min($w_src,$h_src));
            if($w_src == $h_src)
                imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, $w_src, $w_src);
            $date = time();
            imagejpeg($dest, $dir.$date.".jpg");
            $avatar = $dir.$date.".jpg";
            $delfull = $dir.$filename;
            unlink($delfull);
        } else {
            exit("Автар или изображение должно быть в формате <strong>JPG, GIF или PNG</strong>");
        }
    }

//    проверяем логин на уникальность
    $query = "SELECT login FROM users WHERE  login = '".$login."' LIMIT 1";
    $result = $mysql->query($query) or die("ERROR: ".$mysql->error);
    $value = $result->num_rows;
    var_dump($value);
    if ($value > 0){
        print ("Пользователь с таким именем существует. Пожалуйста вернитесь назад и измените login\n");
        echo "<a href='login.php'>Или авторизуйтесь!</a>";
    } else {
        // регистрируем
        $sql = "INSERT INTO users (id, login, name, age, about, password, avatar) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
        if ($stmt = $mysql->prepare($sql)) {
            $stmt->bind_param('ssisss', $login, $name, $age, $about, $pass, $avatar);
            $stmt->execute();
            var_dump($stmt);
            $stmt->close();
            $mysql->close();
            $_SESSION["login"] = $login;
            $_SESSION["password"] = $pass;
            print ('<div style="background-color: lightblue; color: green;">Вы успешно зарегистрированы!</div><hr />');
            header("location: login_success.php");
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
                        <form method=POST action="signup.php" enctype="multipart/form-data">
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
                            <div class="form-inline">
                                <label for="InputFile">Загрузить изображение</label>
                                <input type="file" name="avatar">
                            </div><br />
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