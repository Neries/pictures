<?php

include_once ROOT . '/models/Users.php';
include_once ROOT . '/components/View.php';
include_once ROOT . '/healpers/PicturesHealper.php';
include_once ROOT . '/healpers/UsersHealper.php';


class UsersController
{


    public function actionLogin()
    {
        $email = '';
        $password = '';
        $errors = [];

        if(isset($_POST['submit'])){
            $email = trim($_POST['email']);
            $password = $_POST['password'];


            if (!UsersHealper::checkEmail($email)){
                $errors[] = 'Неверный e-mail';
            }

            if (!UsersHealper::checkPassword($password)){
                $errors[] = 'Пароль не короче 6-ти символов.';
            }

            $userData = Users::authorizationUsers($email, $password);

            if (!$userData){
                $errors[] = 'Пользователь не найден. Проверте вводимые данные или <a href="/registration">зарегистрируйтесь</a>.';
            }else {
                UsersHealper::auth($userData);

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
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $password2= $_POST['confirmPassword'];



            if (!UsersHealper::checkName($name)){
                $errors[] = 'Имя не короче 2-х символов.';
            }

            if (!UsersHealper::checkEmail($email)){
                $errors[] = 'Неверный e-mail';
            }

            if (!UsersHealper::checkPassword($password)){
                $errors[] = 'Пароль не короче 6-ти символов.';
            }

            if (Users::checkEmailExists($email)){
                $errors[] = 'Такой e-mail уже используется';
            }

            if ($password != $password2){
                $errors[] = 'Повторный пароль введен неверно!';
            }


            if (!$errors){
                Users::registrationUsers($name, $email, $password);

                $userData = Users::authorizationUsers($email, $password);
                UsersHealper::auth($userData);

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