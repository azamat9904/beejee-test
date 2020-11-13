<?php
    namespace application\core;

    class Router{
        public $routes = [];
        public $params = [];

        public function __construct(){
            $routes = ROUTES;
            foreach($routes as $key => $values){
                $this->add($key, $values);
            }
        }

        public function add($route, $params){
            $route = '#^'. $route . '$#';
            $this->routes[$route] = $params;
         }
 
         public function match(){
             $url = trim($_SERVER['REQUEST_URI'], '/');
             foreach($this->routes as $route => $params){
                 if(preg_match($route, $url, $matches)){
                     $this->params = $params;
                     return true;
                 }
             }
             return false;
         }
 
         public function run(){
             
             if($this->match()){
                 $className = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
                 $action = $this->params['action'] . 'Action';
 
                 if(class_exists($className) && method_exists($className, $action)){
                     $controller = new $className($this->params);   
                     call_user_func([$controller, $action]);
                     return;
                 }
             }
             
             echo "Some error, Page is not found";
         }
    }