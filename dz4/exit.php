<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 27.08.2016
 * Time: 22:40
 */
session_start();
          if    (empty($_SESSION['login']) or empty($_SESSION['password']))
          {
              //если не существует сессии с логином и паролем, значит на    этот файл попал невошедший пользователь. Ему тут не место. Выдаем сообщение    об ошибке, останавливаем скрипт
              exit ("Доступ на эту    страницу разрешен только зарегистрированным пользователям. Если вы    зарегистрированы, то войдите на сайт под своим логином и паролем<br><a    href='index.php'>Главная    страница</a>");
          }

unset($_SESSION['password']);
            unset($_SESSION['login']);
            unset($_SESSION['id']);//    уничтожаем переменные в сессиях
        exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=index.php'></head></html>");
            // отправляем пользователя на главную страницу.
