<?php
    namespace application\controllers;
    use application\core\Controller;
    use application\libs\Pagination;

    class TaskController extends Controller{

        public function indexAction(){
            $pagination = new Pagination($this->route, $this->model->tasksCount());
            $sortingColumn = $_SESSION['sort_column'] ?? 'id';
            $sortingOrder = $_SESSION['sort_order'] ?? 'ASC';
            $paginationTemplate = (int)$pagination->amount == 1 ? '' : $pagination->get();
            $data = [
                'pagination' => $paginationTemplate,
                'tasks' => $this->model->tasksList($this->route, $sortingColumn, $sortingOrder),
            ];
            $this->view->render('Task', $data);
        }

        public function createTaskAction(){
            $this->postRequestHandler('create', 'task_created', 'Task was successfully created', 'Create Task');
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
            if(!isUserLoggedIn()){
                $this->view->redirect("/user/login");
                return;
            }
            $id = $this->route['id'];
            $this->postRequestHandler('edit', 'task_updated', 'Task was successfully updated', 'Create Task', $id);
            $task = $this->model->getTaskById($id);
            $this->view->render('Edit Task', $task);
        }

        public function checkAction(){
            if(!isUserLoggedIn()){
                $this->view->redirect("/user/login");
                return;
            }
            $id = $this->route['id'];
            $task = $this->model->getTaskById($id);
            if($task['status'] == '1'){
                $this->model->setStatus(0, $id);
            }else if($task['status']== '0'){
                $this->model->setStatus(1, $id);
            }
            $this->view->redirect('/');
        }

        public function postRequestHandler($action, $feedbackTitle, $feedbackMessage,$pageTitle,  $id=null){
            if($_SERVER['REQUEST_METHOD'] === "POST"){
                $data = $_POST;
                $result = $this->model->validateTask($data['name'], $data['email'], $data['task']);
                if($result['isValid']){
                    $name = $result['data']['name'];
                    $email =  $result['data']['email'];
                    $task =  $result['data']['task'];
                    if($action == 'create'){
                        $this->model->createTask($name, $email, $task);
                    }else if($action == 'edit'){
                        $this->model->updateTask($id, $name, $email, $task);
                    }
                    createFeedback($feedbackTitle, $feedbackMessage);
                    $this->view->redirect("/");
                    return;
                }
                $result['id'] = $id?? ''; 
                $this->view->render($pageTitle, $result['data']);
                return;
            }
        }

    }