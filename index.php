<?php
    require_once "application/config/config.php";

    function autoload_files($classNames){
        $path = str_replace('\\', '/', __DIR__ . '/' . $classNames . '.php');
        if(file_exists($path)){
            require_once $path;
        }
    }

    spl_autoload_register('autoload_files');
    session_start();

    ?>
