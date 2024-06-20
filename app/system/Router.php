<?php

namespace app\system;

class Router
{
    static public function route()
    {
        $routes = explode("/", $_SERVER["REQUEST_URI"]);

        $controller_name = isset($routes[1]) ? ucfirst($routes[1]) : "main";
        $method = isset($routes[2]) ? $routes[2] : "index";
        $id = isset($routes[3]) ? $routes[3] : null;

        try {
            $class = "app\controllers\\$controller_name";
            $controller = new $class();
            $controller->$method($id);
        } catch (\Throwable $error) {
            echo "<pre>";
            var_dump($error);
        }
    }
}
