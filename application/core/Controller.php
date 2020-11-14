<?php
    namespace application\core;
    use application\core\View;

    abstract class Controller{

        protected $route;
        protected $view;

        public function __construct($route){
            $this->route = $route;
            $this->view = new View($route);
        }

    }