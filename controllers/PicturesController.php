<?php

include_once ROOT . '/models/Pictures.php';
include_once ROOT . '/components/View.php';

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
        Pictures::uploadPictures();
    }


}