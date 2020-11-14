<?php
    require_once "application/config/config.php";
    require_once "application/config/routes.php";
    require_once "application/libs/checkInput.php";
    require_once "application/libs/feedback.php";
    require_once "application/libs/checkAuth.php";
    use application\core\Router;

    function autoload_files($classNames){
        $path = str_replace('\\', '/', __DIR__ . '/' . $classNames . '.php');
        if(file_exists($path)){
            require_once $path;
        }
    }

    spl_autoload_register('autoload_files');
    session_start();

    $router = new Router();
    $router->run();
