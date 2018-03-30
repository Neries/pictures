<?php
include_once ROOT . '/models/Pictures.php';
include_once ROOT . '/components/View.php';

class uploadPictures
{

    public static function uploadInFolder($uploadfile)
    {

        if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile)) {
            return true;
        }

    }

    public static function uploadDir($uploaddir = 'img/content/')
    {
        return $uploaddir;
    }

    public static function uploadFileName()
    {
        $uploaddir = 'img/content/';

        $uploadfile = $uploaddir."$_SESSION[user_id]_".time().'_'.basename($_FILES['uploadfile']['name']);

        return $uploadfile;
    }
}

