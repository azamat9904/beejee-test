<?php

namespace application\libs;

use PDO;

class Db {

	protected $db;
    private $stmt;
    
	public function __construct() {
		$config = DB;
		$this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'', $config['user'], $config['password']);
	}

	public function query($sql, $params = []) {
		$this->stmt = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {			
				$this->stmt->bindValue(':'.$key, $val);
			}
		}
	}

    public function execute(){
        return $this->stmt->execute();
    }
  
    public function resultSet(){
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
  
    public function single(){
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
  
    public function rowCount(){
        return $this->stmt->rowCount();
    }

	public function lastInsertId() {
		return $this->db->lastInsertId();
	} 
}