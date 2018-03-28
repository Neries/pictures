<?php

class uploadPicture
{
    public static function uploadPictures()
    {

    }
}


$message = "Error";
session_start();
$db = Db::getConnection();
$uploaddir = 'img/content/';
$uploadfile = $uploaddir."$_SESSION[user_id]_".time().'_'.basename($_FILES['uploadfile']['name']);

if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile))
{
    $statement = $db->prepare("INSERT INTO pictures(user_id, location) VALUES(:user_id, :location)");
    $statement->execute([
        "user_id" => $_SESSION['user_id'],
        "location" => $uploadfile,
    ]);

    $message = 'Файл сохранен';
}

return $message;