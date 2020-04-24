<?php

namespace application\core;

use application\core\View;

class Router
{
    protected $routes = [];
    protected $params = [];
    
    public function __construct()
    {
        $routes = require 'application/config/routes.php';
        foreach ($routes as $route => $params) {
            $this->add($route, $params);
        }
    }
    
    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match()
    {
        
        $url = trim(catParams($_SERVER['REQUEST_URI']), '/');

        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                  $this->params = $params;
                  return true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {
             $pathToController = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($pathToController)) {
                $action = $this->params['action'] . "Action";
                if (method_exists($pathToController, $action)) {
                    $controller = new $pathToController($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }
}
