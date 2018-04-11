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

                /////////////////ЗАГРУЗКА////////////////
                if (isset($_POST['download'])){
                        $arr = Pictures::getPicturesItemByID($id);
                        $fileDir = ROOT . '/' . $arr['location'];
                        if (file_exists($fileDir)) {
                            PicturesHealper::fileForceDownload($fileDir);
                        } else {
                            $_SESSION['message'] = 'Файл не найден... :(';
                            $_SESSION['type_message'] = 'alert alert-danger';
                            header('Location: /');
                    }
                }
                /////////////////Удаление////////////////
                if (isset($_POST['delete'])){
                    Pictures::deletePictures($id);
                    header('Location: /');
                }
                /////////////////////////////////////////

                $master->generateFormOnePicture($arr);
            } else $master->errorNotFound();

        }
    }

    public function actionAdd()
    {
        if (isset($_POST['submit'])){
            $_SESSION['message'] = 'Упсс! Что то пошло не так :(';
            $_SESSION['type_message'] = 'alert alert-danger';

            $uploadfile = PicturesHealper::uploadFileName();
            if (PicturesHealper::uploadInFolder($uploadfile)) {
                Pictures::writePictures($uploadfile);
                $_SESSION['message'] = 'Файл успешно загружен! :)';
                $_SESSION['type_message'] = 'alert alert-success';
            }

            header('Location: /');
        }

        $master = new View();
        $master->generateFormAdd();
    }

    public function actionTestPage()
    {
        $master = new View();
        $master->test();
    }

}