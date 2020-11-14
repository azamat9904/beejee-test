<?php
    namespace application\controllers;
    use application\core\Controller;
    use application\libs\Pagination;

    class TaskController extends Controller{

        public function indexAction(){
            $pagination = new Pagination($this->route, $this->model->tasksCount());
            $data = [
                'pagination' => $pagination->get(),
                'tasks' => $this->model->tasksList($this->route),
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