<?php
    namespace application\core;

    class View{
        public static $layout = 'layout';
        public $path;
        public $route;

        public function __construct($route){
            $this->route = $route;
            $this->path = $this->route['controller'] . '/' . $this->route['action'];
        }

        public function render($title, $vars = []){
            extract($vars);

            $path = APPROOT . "/application/views/" . $this->path . '.php';
            if(file_exists($path)){
                self::requireFile($path, $title);
                return;
            }

            self::errorCode(404);
        }

        public static function requireFile($path, $title, $vars=[]){
            ob_start();
            require_once $path;
            $content = ob_get_clean();
            require_once APPROOT . "/application/views/layouts/" . self::$layout . '.php';
        }

        public static function errorCode($code, $title="Error"){
            http_response_code($code);
            $path = APPROOT . "/application/views/errors/" . $code . '.php';
            self::requireFile($path, "Not found");
            exit();
        }

        public function redirect($url){
            header('Location: ' . $url);
        }
    }