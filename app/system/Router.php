<?php

namespace app\system;


class Router
{
    static public function route()
    {
        $routes = explode("/", $_SERVER["REQUEST_URI"]);

        $controller_name = !empty($routes[1]) ? ucfirst($routes[1]) : "Task";
        $method = !empty($routes[2]) ? $routes[2] : "show_tasks";
        $id = !empty($routes[3]) ? $routes[3] : null;

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
