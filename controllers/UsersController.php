<?php

include_once ROOT . '/models/Pictures.php';
include_once ROOT . '/components/View.php';
include_once ROOT . '/healpers/PicturesHealper.php';


class UsersController
{


    public function actionLogin()
    {
        $master = new View();
        $master->loginPage();
    }

    public function actionRegistration()
    {
        $master = new View();
        $master->registrationPage();
    }
}