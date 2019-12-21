<?php


namespace system\Router;


class Router
{
    public function parseUrl ()
    {
        if(($pos = strpos($_SERVER['REQUEST_URI'], '?')) !== false){
            $route = substr($_SERVER['REQUEST_URI'], 0, $pos);
        }
        $route = is_null($route) ? $_SERVER['REQUEST_URI'] : $route;
        $route = explode('/', $route);
        array_shift($route);
        $result[0] = array_shift($route);
        $result[1] = array_shift($route);
        $result[2] = $route;
        return $result;
    }

    public function run() {
        $data = $this->parseUrl();
        $controllerName = $data[0];
        $action = $data[1];

        $controller = sprintf("Controller\\%s", ucfirst($controllerName));

        if (class_exists($controller)) {
            $controller = new $controller('request', 'view');
            $response = $controller->$action();
            echo $response;
        } else {
            //$controller = new NotFoundController($request, $view);
            var_dump('error');
        }


    }

}