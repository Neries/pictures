<?php

include_once ROOT . '/models/Pictures.php';
include_once ROOT . '/components/View.php';
include_once ROOT . '/healpers/PicturesHealper.php';

class PicturesController
{
    public $content;
    public $arr;
    public $view;

    /**
     *
     * создать новый экземпляр класса View и передаем масив
     * полученный от action
     * вызываем masterInclude
     *
     * @param $arrDataFromDb
     */
//    public function callMaster($arrDataFromDb)
//    {
//        $master = new View();
//        $master->generateFormPictures($arrDataFromDb);
//        $master->masterInclude();
//    }

    /**
     * получаем масив всех значений из бд задаем в переменную
     * передаем масив callMaster
     *
     */

    public function actionIndex()
    {

        $arr = Pictures::getPicturesList();
        $master = new View();
        $master->generateFormPictures($arr);
        $master->masterInclude();


    }

    public function actionView($id)
    {

        if ($id) {
            $arr = Pictures::getPicturesItemByID($id);
            $master = new View();
            $master->generateFormPictures($arr);
            $master->masterInclude();

//            $this->callMaster($arr);

        }
    }

    public function actionAdd()
    {
        $master = new View();
        $master->generateFormAdd();
        $master->masterInclude();
    }

    public function actionUploadFile()
    {
        $_SESSION['message'] = 'Упсс! Что то пошло не так :(';
        $_SESSION['type_message'] = 'alert alert-danger';

        $uploadfile = uploadPictures::uploadFileName();
        if (uploadPictures::uploadInFolder($uploadfile)){
            Pictures::writePictures($uploadfile);
            $_SESSION['message'] = 'Файл успешно загружен! :)';
            $_SESSION['type_message'] = 'alert alert-success';
        }

        header('Location: /');

    }


}