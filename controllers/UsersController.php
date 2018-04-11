<?php

include_once ROOT . '/models/Users.php';
include_once ROOT . '/components/View.php';
include_once ROOT . '/healpers/PicturesHealper.php';


class UsersController
{


    public function actionLogin()
    {
        $email = '';
        $password = '';
        $errors = [];

        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];


            if (!Users::checkEmail($email)){
                $errors[] = 'Неверный e-mail';
            }

            if (!Users::checkPassword($password)){
                $errors[] = 'Пароль не короче 6-ти символов.';
            }

            $userData = Users::authorizationUsers($email, $password);

            if (!$userData){
                $errors[] = 'Пользователь не найден. Проверте вводимые данные.';
            }else {
                Users::auth($userData);

                $_SESSION['message'] = 'С возвращением '.$userData['name'].'!';
                $_SESSION['type_message'] = 'alert alert-success';

                header('Location: /');
                exit();

            }

        }
        $master = new View();
        $master->loginPage($errors);

    }

    public function actionRegistration()
    {
        $name = '';
        $email = '';
        $password = '';
        $errors = [];

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];



            if (!Users::checkName($name)){
                $errors[] = 'Имя не короче 2-х символов.';
            }

            if (!Users::checkEmail($email)){
                $errors[] = 'Неверный e-mail';
            }

            if (!Users::checkPassword($password)){
                $errors[] = 'Пароль не короче 6-ти символов.';
            }

            if (Users::checkEmailExists($email)){
                $errors[] = 'Такой e-mail уже используется';
            }


            if (!$errors){
                Users::registrationUsers($name, $email, $password);

                $_SESSION['message'] = 'Добро пожаловать '.$name.'!';
                $_SESSION['type_message'] = 'alert alert-success';

                header('Location: /');
                exit();
            }


        }
        $master = new View();
        $master->registrationPage($errors);
    }



}