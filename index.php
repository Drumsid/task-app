<?php

require_once 'application/lib/dev.php';

use application\core\Router;

spl_autoload_register(
    function ($class) {
        $path = str_replace("\\", "/", $class . ".php");
        if (file_exists($path)) {
            include_once $path;
        }
    }
);

session_start();

$rout = new Router();

$rout->run();
