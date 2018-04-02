<?php
include_once ROOT . '/models/Pictures.php';
include_once ROOT . '/components/View.php';

class PicturesHealper
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

    public static function fileForceDownload($fileDir) {

            // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
            // если этого не сделать файл будет читаться в память полностью!
            if (ob_get_level()) {
                ob_end_clean();
            }
            // заставляем браузер показать окно сохранения файла
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($fileDir));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($fileDir));
            // читаем файл и отправляем его пользователю
            readfile($fileDir);
            exit;
    }
}

