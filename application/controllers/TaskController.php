<?php
    namespace application\controllers;
    use application\core\Controller;
    use application\libs\Pagination;

    class TaskController extends Controller{

        public function indexAction(){
            $pagination = new Pagination($this->route, $this->model->tasksCount());

            $sortingColumn = $_SESSION['sort_column'] ?? 'id';
            $sortingOrder = $_SESSION['sort_order'] ?? 'ASC';

            $data = [
                'pagination' => $pagination->get(),
                'tasks' => $this->model->tasksList($this->route, $sortingColumn, $sortingOrder),
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

        public function sortAction(){
            if($_SERVER['REQUEST_METHOD'] === "POST"){
                $columnName = checkInput($_POST['columnName']);
                $columnOrder = strtoupper(checkInput($_POST['columnOrder']));
                $_SESSION['sort_column'] = $columnName;
                $_SESSION['sort_order'] = $columnOrder;
                $this->view->redirect('/');
            }
        }

        public function editAction(){

            if($_SERVER['REQUEST_METHOD'] === "POST"){
                $data = $_POST;
                $result = $this->model->validateTask($data['name'], $data['email'], $data['task']);
                if($result['isValid']){
                    $name = $result['data']['name'];
                    $email =  $result['data']['email'];
                    $task =  $result['data']['task'];
                    $id = $this->route['id'];
                    $this->model->updateTask($id, $name, $email, $task);
                    createFeedback('task_updated', "Task was successfully updated");
                    $this->view->redirect("/");
                    return;
                }
                $result['id'] = $this->route['id']; 
                $this->view->render('Create Task', $result['data']);
                return;
            }

            $id = $this->route['id'];
            $task = $this->model->getTaskById($id);
            $this->view->render('Edit Task', $task);
        }
    }