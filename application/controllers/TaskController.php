<?php
    namespace application\controllers;
    use application\core\Controller;
    
    class TaskController extends Controller{

        public function indexAction(){
            $this->view->render('Task');
        }
    }