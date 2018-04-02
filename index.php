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



//+Придумать шаблонизатор-
//+переделать View php......-
//+добавить имя картинки вместо Header+
//+удаление?+
//+добавить дату сохранения картинки и user -
// Не сломать то, что работает
// Добавить users
// поиск?
// messages между users
// привилегии у users
// админка?
// js добавить асинхронности:
//   спросить у Никиты про подгрузку
//   в поиск

// рефакторинг и коментарии
//

//почтитать про font-awesome.min.css



