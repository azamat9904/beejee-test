<?php
    namespace application\core;
    use application\core\View;

    class Router{

        protected $routes = [];
        protected $params = [];

        public function __construct(){
            $routes = ROUTES;
            foreach($routes as $key => $values){
                $this->add($key, $values);
            }
        }

        public function add($route, $params){
           $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
           $route = '#^'. $route . '$#';
           $this->routes[$route] = $params;
        }

        public function match() {
            $url = trim($_SERVER['REQUEST_URI'], '/');
            foreach ($this->routes as $route => $params) {
                if (preg_match($route, $url, $matches)) {
                    foreach ($matches as $key => $match) {
                        if (is_string($key)) {
                            if (is_numeric($match)) {
                                $match = (int) $match;
                            }
                            $params[$key] = $match;
                        }
                    }
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
            
            View::errorCode(404);
        }
    }