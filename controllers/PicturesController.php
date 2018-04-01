<?php

include_once ROOT . '/models/Pictures.php';
include_once ROOT . '/components/View.php';
include_once ROOT . '/healpers/PicturesHealper.php';

class PicturesController
{


    public function actionIndex()
    {

        $arr = Pictures::getPicturesList();
        $master = new View();
        $master->generateFormPictures($arr);


    }

    public function actionView($id)
    {

        if ($id) {
            $arr = Pictures::getPicturesItemByID($id);
            $master = new View();
            if (!empty($arr)) {
                $master->generateFormPictures($arr);
            } else $master->errorNotFound();

        }
    }

    public function actionAdd()
    {
        $master = new View();
        $master->generateFormAdd();
    }

    public function actionUploadFile()
    {
        $_SESSION['message'] = 'Упсс! Что то пошло не так :(';
        $_SESSION['type_message'] = 'alert alert-danger';

        $uploadfile = uploadPictures::uploadFileName();
        if (uploadPictures::uploadInFolder($uploadfile)) {
            Pictures::writePictures($uploadfile);
            $_SESSION['message'] = 'Файл успешно загружен! :)';
            $_SESSION['type_message'] = 'alert alert-success';
        }

        header('Location: /');

    }

    public function actionDelete($id)
    {
        Pictures::deletePictures($id);
        header('Location: /');
    }

    public function actionTestPage()
    {
        $master = new View();
        $master->test();
    }


}