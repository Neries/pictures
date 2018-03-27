<?php

include_once ROOT . '/models/Pictures.php';

class PicturesController
{
    public function actionIndex()
    {
        $picturesList = [];
        $picturesList = Pictures::getNewsList();

        return $picturesList;
    }

    public function actionView($id)
    {
        if ($id) {
            $picturesItem = Pictures::getNewsItemByID($id);



            return $picturesItem;
        }
    }
}