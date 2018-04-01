<?php


class Router
{

    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * Returns request string
     * @return string
     */
    private function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }


    /**
     *
     */
    public function run()
    {
        $uri = $this->getUri();

        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                $controllerObject = new $controllerName;
                if (method_exists($controllerObject, $actionName)) {
                    $result = call_user_func_array([$controllerObject, $actionName], $parameters);

                    if (!$result || $result != null) {
                        break;
                    }

                } else {
                    include_once 'View.php';
                    $a = new View;
                    $a->errorNotFound();
                    break;
                }


            }
        }
    }
}