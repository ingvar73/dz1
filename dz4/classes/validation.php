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
    public $error = false;

    public function __construct ($login, $name, $age, $about, $pass, $pass1)
    {
        function ver_login($login){
            $this->login = nl2br(htmlspecialchars($login));
            if(strlen($this->login) < 6){
                echo "ОШИБКА! Длина логина должна быть не менее 6 символов!";
            } elseif (strlen($this->login) > 10){
                echo "ОШИБКА! Превышено максимальное количество символов для логина!";
            }
        }
        function ver_name($name){

        }
        function ver_age($age){

        }
        function ver_about($about){

        }
        function ver_pass($pass){

        }
        function ver_pass1($pass1){

        }
    }

    static public function formchars ($data) {
    return nl2br(htmlspecialchars(strip_tags(trim($this->data), ENT_QUOTES)), false);
    }
}