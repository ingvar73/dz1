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

    static public function getform ($data = array())
    {
        if (isset($data['login'])) $this->login = (string)$data['login'];
        if (isset($data['name'])) $this->name = (string)$data['name'];
        if (isset($data['age'])) $this->age = (int)$data['age'];
        if (isset($data['about'])) $this->about = (string)$data['about'];
        if (isset($data['password'])) $this->password = $data['password'];
    }

}