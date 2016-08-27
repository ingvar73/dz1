<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 26.08.2016
 * Time: 14:35
 */
function autoload($class){
    require_once strtolower(($class).'.php');
}
spl_autoload_register('autoload');

$db = Db::getInstance();

if(isset($_POST['submit'])){
    $login = $db->escape($_POST['login']);
    $password = $db->escape($_POST['password']);
    $confirm_password = $db->escape($_POST['cpassword']);
    $email = $db->escape($_POST['email']);
    $reg = new Reg($login, $password, $confirm_password, $email);
    $result = $db->query("SELECT COUNT(login) FROM users WHERE login = '{$reg->login}'");
    $row = $db->fetch_assoc($result);
    $reg->unique($row, 'Логин неуникален!');
    $result = $db->query("SELECT COUNT(email) FROM users WHERE email = '{$reg->email}'");
    $row = $db->fetch_assoc($result);
    $reg->unique($row, 'Email неуникален!');
    $reg->quality($reg->password, $reg->confirm_password, 'Пароли не совпадают!');
    $reg->regex(Reg::M_PASSWORD_PATTERN, $reg->password, 'Некорректный пароль!');
    $reg->regex(Reg::LOGIN_PATTERN, $reg->login, 'Некорректный логин!');
    $reg->regex(Reg::EMAIL_PATTERN, $reg->email, 'Некорректный email!');
    if(empty($reg->getErrors())){
        $reg->generateHash();
        echo !$db->query("INSERT INTO users (login, password, email, date) VALUES ('{$reg->login}', '{$reg->password}', '{$reg->email}', '{$reg->date}')") ? : 'Пользователь успешно создан!';
    } else {
        foreach ($reg->getErrors() as $err){
            echo $err.'<br />';
        }
    }
}

?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
    <label><p>Login</p><input type="text" name="login"></label>
    <label><p>Password</p><input type="password" name="password"></label>
    <label><p>Confirm password</p><input type="password" name="cpassword"></label>
    <label><p>Email</p><input type="email" name="email"></label>
    <br /><br />
    <input type="submit" name="submit">
</form>
