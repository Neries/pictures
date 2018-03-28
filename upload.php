<?php

include 'test/db.php';
session_start();
$uploaddir = 'img/content/';
$uploadfile = $uploaddir."$_SESSION[user_id]_".time().'_'.basename($_FILES['uploadfile']['name']);


if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile))
{
    $statement = $pdo->prepare("INSERT INTO pictures(user_id, location) VALUES(:user_id, :location)");
    $statement->execute([
        "user_id" => $_SESSION['user_id'],
        "location" => $uploadfile,
    ]);


    header('Location:/pictures');
}
else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }





//// Выводим информацию о загруженном файле:
//echo "<h3>Информация о загруженном на сервер файле: </h3>";
//echo "<p><b>Оригинальное имя загруженного файла: ".$_FILES['uploadfile']['name']."</b></p>";
//echo "<p><b>Mime-тип загруженного файла: ".$_FILES['uploadfile']['type']."</b></p>";
//echo "<p><b>Размер загруженного файла в байтах: ".$_FILES['uploadfile']['size']."</b></p>";
//echo "<p><b>Временное имя файла: ".$_FILES['uploadfile']['tmp_name']."</b></p>";
//
//?>