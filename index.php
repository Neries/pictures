<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

require_once(ROOT . '/components/Router.php');
include_once(ROOT . '/components/Db.php');





// Придумать шаблонизатор
// Не сломать то, что работает





//include_once(ROOT . '/components/View.php');
//$a = new View;
//$a->master();
//die;



$router = new Router();
$router->run();
