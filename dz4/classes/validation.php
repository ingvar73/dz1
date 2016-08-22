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
private $password;
    public $result;

    public function __construct ($login, $name, $age, $about, $pass, $pass1)
    {
        function ver_login($login){
            $this->login = nl2br(htmlspecialchars($login));
            if(strlen($this->login) < 6){
                echo "ОШИБКА! Длина логина должна быть не менее 6 символов!";
                return true;
            } elseif (strlen($this->login) > 10){
                echo "ОШИБКА! Превышено максимальное количество символов для логина!";
                return true;
            }
            return true;
        }
        function ver_name($name){
            return true;
        }
        function ver_age($age){
            return true;
        }
        function ver_about($about){
            return true;
        }
        function ver_pass($pass){
            return true;
        }
        function ver_pass1($pass1){
            return true;
        }
        return $result = true;
    }
}