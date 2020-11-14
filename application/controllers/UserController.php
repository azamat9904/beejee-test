<?php
    namespace application\controllers;
    use application\core\Controller;

    class UserController extends Controller{

        public function __construct($params){
            parent::__construct($params);
            
            if(isUserLoggedIn()){
                $this->view->redirect('/');
            }
        }

        public function loginAction(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $result = $this->model->validateUser($_POST['email'], $_POST['password']);
                if($result['isValid']){
                    $_SESSION['user'] = ['email' => $result['data']['email'], 'password' => $result['data']['password']];
                    $this->view->redirect('/');
                    return;
                }
                $this->view->render("Login", $result['data']);
                return;
            }
            $this->view->render("Login");
        }

        public function logoutAction(){
            unset($_SESSION['user']);
            $this->view->redirect('/');
        }
    }