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
				$type = null;
				switch(true){
					case is_int($val):
					  $type = PDO::PARAM_INT;
					  break;
					case is_bool($val):
					  $type = PDO::PARAM_BOOL;
					  break;
					case is_null($val):
					  $type = PDO::PARAM_NULL;
					  break;
					default:
					  $type = PDO::PARAM_STR;
				  }	
				$this->stmt->bindValue(':'.$key, $val, $type);
			}
		}
	}

    public function execute(){
        return $this->stmt->execute();
    }
  
    public function single(){
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

	public function row($sql, $params = []) {
		$this->query($sql, $params);
		$this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function column($sql, $params = []) {
		$this->query($sql, $params);
		$this->stmt->execute();
		return $this->stmt->fetchColumn();
	}
}