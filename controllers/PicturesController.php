<?php

include_once ROOT . '/models/Pictures.php';
include_once ROOT . '/components/View.php';

class PicturesController
{
    public function actionIndex()
    {

        $picturesList = [];
        $picturesList = Pictures::getPicturesList();

        return $picturesList;
    }

    public function actionView($id)
    {

        if ($id) {
            $picturesItem = Pictures::getPicturesItemByID($id);

//            $a = new View();
//            $result =$a->allPictures([$picturesItem['location']]);
//            return $result;

            return $picturesItem;
        }
    }
}