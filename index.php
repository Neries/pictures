<?php

require_once 'components/func.php';

session_start();

session('user_id', 13);

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

require_once(ROOT . '/components/Router.php');
include_once(ROOT . '/components/Db.php');

$router = new Router();
$router->run();



//+Придумать шаблонизатор+
// Не сломать то, что работает
// переделать View php......
// Добавить users
//+добавить имя картинки вместо Header
// поиск?
// удаление?
// добавить дату сохранения картинки
// messages между users
// добавить асинхронности
// спросить у Никиты про подгрузку
// привилегии у users
// админка?



