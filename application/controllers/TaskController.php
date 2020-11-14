<?php
    namespace application\controllers;
    use application\core\Controller;

    class TaskController extends Controller{

        public function indexAction(){
            $tasks = $this->model->getTasks();
            $data = [
                'tasks' => $tasks
            ];
            $this->view->render('Task', $data);
        }

        public function createTaskAction(){

            if($_SERVER['REQUEST_METHOD'] === "POST"){
                $data = $_POST;
                $result = $this->model->validateTask($data['name'], $data['email'], $data['task']);

                if($result['isValid']){
                    $name = $result['data']['name'];
                    $email =  $result['data']['email'];
                    $task =  $result['data']['task'];
                    $this->model->createTask($name, $email, $task);
                    createFeedback('task_created', "Task was successfully created");
                    $this->view->redirect("/");
                    return;
                }
                    
                $this->view->render('Create Task', $result['data']);
                return;
            }
            $this->view->render('Create Task');
        }

    }