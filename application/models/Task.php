<?php
    namespace application\models;
    use application\core\Model;

    class Task extends Model{

        public function getTasks(){
            $this->db->query("SELECT * FROM task");
            return $this->db->resultSet();
        }

        public function createTask($name, $email, $task){
            $params = [
                'name' => $name,
                'email' => $email,
                'task' => $task
            ];
            $this->db->query("INSERT INTO task (name, email, task, status) VALUES(:name, :email, :task, 'Новый')" , $params);
            return $this->db->execute();
        }

        public function validateTask($name, $email, $task){
            $data = [
                'name' => '',
                'email' => '',
                'task' => '',
                'name_err' => '',
                'email_err' => '',
                'task_err' => ''
            ];

            $data['name'] = checkInput($name);
            $data['email'] = checkInput($email);
            $data['task'] = checkInput($task);

            if(empty($data['name']))
                 $data['name_err'] = 'Name is required';


            if(empty($data['email']))
                $data['email_err'] = 'Email is required';
            else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
                $data['email_err'] = "Invalid email format";
            
            
            if(empty($data['task'])) 
                $data['task_err'] = 'Task is required';

            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['task_err'])){
                return ['isValid' => true, 'data' => $data];
            }
            
            return ['isValid' => false, 'data' => $data];
        }

        public function tasksCount() {
            return $this->db->column('SELECT COUNT(id) FROM task');
        }
        
        public function tasksList($route) {
            $max = 3;
            $params = [
                'max' => $max,
                'start' => ((($route['page'] ?? 1) - 1) * $max),
            ];
            return $this->db->row('SELECT * FROM task ORDER BY id ASC LIMIT :start, :max', $params);
        }
    }