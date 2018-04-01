<?php

class View
{

    /**
     * Получаем масив и генерируем блоки с картинками
     * получаем строку с данными и сетим её в $readyBlock
     * @param $arrDataFromDb
     */


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

    public function test()
    {
        $controllerFile = ROOT . '/view/testpage.php';
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
        }
    }


}