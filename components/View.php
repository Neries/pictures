<?php

class View
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/view/master.php';
        $this->routes = include($routesPath);
    }

    public static function master()
    {

    }
}