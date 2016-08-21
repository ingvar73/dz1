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
public $login = null;
private $name;
private $age;
private $about;
private $password;
    public $error = false;

//    static public function getform ($data = array())
//    {
//        if (isset($data['login'])) $this->login = (string)$data['login'];
//        if (isset($data['name'])) $this->name = (string)$data['name'];
//        if (isset($data['age'])) $this->age = (int)$data['age'];
//        if (isset($data['about'])) $this->about = (string)$data['about'];
//        if (isset($data['password'])) $this->password = $data['password'];
//    }

    public function __construct($val) {
        $this->length($val);
        $this->verifname($val);
        $this->valid($val);
    }
// проверяем длину логина
    public function length($val){
        if(strlen($val) < 4){
            $this->error = true;
        }
    }
// на корректность ввода инъекции  и пр.
    public function verifname($val){
        if(preg_match('/[a-z][0-9]/i', $val)){
            $this->error = true;
        }
    }
// занятость ника
    public function valid($val){
        $result = $this->login($val);
        if (mysqli_num_rows($result) > 0){
            echo 'Ник занят';
            $this->error = true;
        }
    }

//    public function error_msg($code){
//        if($code == '1') {
//            echo "Длина логина менее 4 символов!";
//            return $code;
//        } elseif ($code == '2') {
//            echo "В форме содержаться недопустимые символы!";
//            return $code;
//        } else ($code == '3') {
//            echo "Недопустимое количество символов!";
//        }
//        die();
//    }
}