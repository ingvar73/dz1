<?php

/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 21.08.2016
 * Time: 22:32
 */
// Класс для валидации формы
//require "db.php";

class ValidationReg
{
private $login;
private $name;
private $age;
private $about;
private $pass;
private $pass1;
private $avatar;
public $result;

    public function __construct ($login, $name, $age, $about, $pass, $pass1, $avatar) //Инициализируем методы
    {
        $result_login = $this->ver_login($login);
        $result_name = $this->ver_name($name);
        $result_age = $this->ver_age($age);
        $result_about = $this->ver_about($about);
        $result_pass = $this->ver_pass($pass, $pass1);
        $result_avatar = $this->ver_avatar($avatar);
        if($result_login and $result_name and $result_age and $result_about and $result_pass and $result_avatar){
            $this->result = true;
            return $this->result;
        } else{
            $this->result = false;
            return $this->result;
        }
    }
    // проверка логина на валидность: размер логина, очистка от спец-символов
        public function ver_login($login){
            $this->login = strip_tags(trim($login));
            if(strlen(htmlspecialchars($this->login)) < 6 || strlen(htmlspecialchars($this->login)) > 15){
                echo "ОШИБКА! Длина логина должна быть не менее 6 и не более 15 символов!\n";
                $this->result = false;
                return $this->result;
            }
            $this->result = true;
            return $this->result;
        }
    // проверка имени на валидность: размер логина, очистка от спец-символов
        public function ver_name($name){
            $this->name = $name;
            if(mb_strlen($this->name) < 6 || mb_strlen($this->name) > 20){
                echo "ОШИБКА! Длина имени должна быть не менее 6 и не более 20 символов!\n";
                $this->result = false;
                return $this->result;
            }
            $this->result = true;
            return $this->result;
        }
    // проверка возраста: цифра или нет
        public function ver_age($age){
            $this->age = (int)$age;
            if (is_numeric($this->age) && $this->age === 0){
                echo "В поле ввода возраста введено не числовое значение!\n";
                $this->result = false;
                return $this->result;
            } else
            $this->result = true;
            return $this->result;
        }
    // проверка описания на валидность: размер текста, очистка от спец-символов
        public function ver_about($about){
            $this->about = strip_tags($about);
            if(strlen(nl2br(htmlspecialchars($this->about))) == ''){
                echo "ОШИБКА! Вы не ввели описание!\n";
                return false;
            } elseif (mb_strlen(nl2br(htmlspecialchars($this->about))) > 100){
                echo "ОШИБКА! Превышено максимальное количество символов для описания!\n";
                $this->result = false;
                return $this->result;
            }
            $this->result = true;
            return $this->result;
        }
    // проверка пароля на валидность: очистка от спец-символов, совпадение паролей
        public function ver_pass($pass, $pass1){
            $this->pass = trim($pass);
            $this->pass1 = trim($pass1);
            if((mb_strlen(nl2br(htmlspecialchars($this->pass))) == null) && (mb_strlen(nl2br(htmlspecialchars($this->pass1))) == null)) echo "Не ввели пароль!";
            if($this->pass != $this->pass1) {
                echo "Пароли не совпадают\n";
                $this->result = false;
                return $this->result;
            }
            $this->result = true;
            return $this->result;
        }
    // проверяем загружено ли изображение
        public function ver_avatar($avatar){
            $this->avatar = $avatar;
            if(!isset($this->avatar) or empty($this->avatar) or $this->avatar == ''){
                echo "Не загружено изображение аватара или  фото пользователя!";
                $this->result = false;
                return $this->result;
            }
            $this->result = true;
            return $this->result;
        }
}

// Класс для валидации логина

class ValidationLog
{
    private $login;
    private $pass;
    public $result;

    public function __construct ($login, $pass) //Инициализируем методы
    {
        $result_login = $this->ver_login($login);
        $result_pass = $this->ver_pass($pass);
        if($result_login and $result_pass){
            $this->result = true;
            return $this->result;
        } else{
            $this->result = false;
            return $this->result;
        }
    }
    // проверка логина на валидность: размер логина, очистка от спец-символов
    public function ver_login($login){
        $this->login = strip_tags(trim($login));
        if(strlen(htmlspecialchars($this->login)) < 6 || strlen(htmlspecialchars($this->login)) > 15){
            echo "ОШИБКА! Длина логина должна быть не менее 6 и не более 15 символов!\n";
            $this->result = false;
            return $this->result;
        }
        $this->result = true;
        return $this->result;
    }

    // проверка пароля на валидность: очистка от спец-символов
    public function ver_pass($pass){
        $this->pass = trim($pass);
            if(mb_strlen(nl2br(htmlspecialchars($this->pass)) == null)) {
                echo "Не ввели пароль!";
            } elseif (mb_strlen(nl2br(htmlspecialchars($this->pass))) < 6 || mb_strlen(nl2br(htmlspecialchars($this->pass))) > 12) {
                echo "Пароль не менее 6 символов!";
                $this->result = false;
                return $this->result;
            }
        $this->result = true;
        return $this->result;
    }
}
