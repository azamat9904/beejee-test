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
    }