<?php

include_once ROOT . '/models/Users.php';
include_once ROOT . '/components/View.php';

class UsersHealper
{
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }

        return false;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function auth($userData)
    {
        $_SESSION['auth'] = true;
        $_SESSION['user_id'] = $userData['id'];
        $_SESSION['user_name'] = $userData['name'];
        $_SESSION['user_created_at'] = $userData['created_at'];

    }

    public static function checkLogged()
    {
        if (isset($_SESSION['auth'])) {
            return $_SESSION['user_id'];
        } else {
            $_SESSION['message'] = 'Доступно только <a href="/registration">зарегистрированным</a> пользователям!';
            $_SESSION['type_message'] = 'alert alert-danger';
            header("Location: $_SERVER[HTTP_REFERER]");
            exit();
        }

    }


}