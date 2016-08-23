<?php

/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 21.08.2016
 * Time: 22:32
 */
// Класс для валидации формы
class Validation
{
private $login;
private $name;
private $age;
private $about;
private $pass;
private $pass1;
    public $result;

    public function __construct ($login, $name, $age, $about, $pass, $pass1)
    {
        $result_login = $this->ver_login($login);
        $result_name = $this->ver_name($name);
        $result_age = $this->ver_age($age);
        $result_about = $this->ver_about($about);
        $result_pass = $this->ver_pass($pass, $pass1);
        if($result_login and $result_name and $result_age and $result_about and $result_pass){
            return true;
        } else{
            return false;
        }
    }
        public function ver_login($login){
            $this->login = strip_tags(trim($login));
            if(strlen(htmlspecialchars($this->login)) < 6 || strlen(htmlspecialchars($this->login)) > 15){
                echo "ОШИБКА! Длина логина должна быть не менее 6 и не более 15 символов!\n";
                return false;
            }
            return true;
        }

        public function ver_name($name){
            $this->name = strip_tags(trim($name));
            if(strlen(htmlspecialchars($this->name)) < 6 || strlen(htmlspecialchars($this->name)) > 15){
                echo "ОШИБКА! Длина логина должна быть не менее 6 и не более 15 символов!\n";
                return false;
            }
            return true;
        }

        public function ver_age($age){
            $this->age = (int)$age;
            if (is_numeric($this->age) && $this->age === 0){
                echo "В поле ввода возраста введено не числовое значение!\n";
                return false;
            } else
            return true;
        }

        public function ver_about($about){
            $this->about = strip_tags($about);
            if(strlen(nl2br(htmlspecialchars($this->about))) == ''){
                echo "ОШИБКА! Вы не ввели описание!\n";
                return false;
            } elseif (strlen(nl2br(htmlspecialchars($this->about))) > 300){
                echo "ОШИБКА! Превышено максимальное количество символов для описания!\n";
                return false;
            }
            return true;
        }

        public function ver_pass($pass, $pass1){
            $this->pass = trim($pass);
            $this->pass1 = trim($pass1);
            if((strlen(nl2br(htmlspecialchars($this->pass))) == null) && (strlen(nl2br(htmlspecialchars($this->pass1))) == null)) echo "Не ввели пароль!";
            if($this->pass != $this->pass1) {
                echo "Пароли не совпадают\n";
                return false;
            }
            return true;
        }
}