<?php

namespace application\lib;

use PDO;

class Db {

	protected $db;
	
	public function __construct() {
		$config = DB;
		$this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'', $config['user'], $config['password']);
	}

	public function query($sql, $params = []) {
		$stmt = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
                $type = PDO::PARAM_STR;

				if (is_int($val)) 
					$type = PDO::PARAM_INT;
				
				$stmt->bindValue(':'.$key, $val, $type);
			}
		}
	}

    public function execute(){
        return $this->stmt->execute();
    }
  
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
  
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
  
    public function rowCount(){
        return $this->stmt->rowCount();
    }

	public function lastInsertId() {
		return $this->db->lastInsertId();
	} 
}