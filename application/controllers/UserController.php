<?php
    namespace application\controllers;
    use application\core\Controller;

    class UserController extends Controller{

        public function loginAction(){
            $this->view->render("Login");
        }
    }