<?php

class View
{


    public function __construct()
    {
        include ROOT . '/view/layouts/header.php';
    }

    public function __destruct()
    {
        // Implement __destruct() method.
        include ROOT . '/view/layouts/footer.php';

    }


    public function generateFormPictures($arr)
    {
        $controllerFile = ROOT . '/view/all.php';
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
        }

    }

    public function generateFormOnePicture($arr)
    {
        $controllerFile = ROOT . '/view/one_pic.php';
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
        }

    }

    public function generateFormAdd()
    {
        $controllerFile = ROOT . '/view/upload.php';
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
        }
    }

    public function errorNotFound()
    {

        $controllerFile = ROOT . '/view/e404.php';
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
        }
    }


    public function loginPage($errors)
    {
        $controllerFile = ROOT . '/view/login_form.php';
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
        }
    }

    public function registrationPage($errors)
    {
        $controllerFile = ROOT . '/view/registration_form.php';
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
        }
    }

    public function accountPage()
    {
        $controllerFile = ROOT . '/view/account.php';
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
        }
    }


    public function test()
    {
        $controllerFile = ROOT . '/view/testpage.php';
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
        }
    }


}