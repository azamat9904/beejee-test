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
            $data = [
                'name' => '',
                'email' => '',
                'task' => '',
                'name_err' => '',
                'email_err' => '',
                'task_err' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] === "POST"){
                $data['name'] = checkInput($_POST['name']);
                $data['email'] = checkInput($_POST['email']);
                $data['task'] = checkInput($_POST['task']);

                if(empty($data['name']))
                     $data['name_err'] = 'Name is required';


                if(empty($data['email']))
                    $data['email_err'] = 'Email is required';
                else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
                    $data['email_err'] = "Invalid email format";
                
                
                if(empty($data['task'])) 
                    $data['task_err'] = 'Task is required';

                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['task_err'])){
                    $taskCreated = $this->model->createTask($data['name'], $data['email'], $data['task']);
                    if($taskCreated){
                        createFeedback('task_created', "New Task was created");
                        $this->view->redirect('/');
                    }
                    return;
                }
                $this->view->render('Create Task', $data);

                return;
            }
            $this->view->render('Create Task', $data);
        }

    }