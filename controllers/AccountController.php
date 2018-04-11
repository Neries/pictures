<?php

//include_once ROOT . '/models/Users.php';
include_once ROOT . '/components/View.php';
include_once ROOT . '/healpers/PicturesHealper.php';


class AccountController
{

    public function actionView()
    {
        if(isset($_POST['submit'])){
            session_unset();


            $_SESSION['message'] = 'GL HF :)';
            $_SESSION['type_message'] = 'alert alert-danger';

            header('Location: /');
            exit();
        }
        $master = new View();
        $master->test();
    }



}