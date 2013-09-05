<?php

class Connection {
	
	private $db = array();
	private $connection;

	function __construct(){
		$this->db['host'] 		= 'localhost';
		$this->db['user'] 		= 'root';
		$this->db['password'] 	= '';
		$this->db['db'] 		= 'bucket_db';
		
		$this->connect();
	}
	
	function connect(){
		$db = $this->db;
		$mysqli = new mysqli($db['host'], $db['user'], $db['password'], $db['db']);
		
		if ($mysqli->connect_error) {
    		die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
		}
		
		$this->connection = $mysqli;
	}
	
	public function run_query($query){
		$result = $this->connection->query($query);
		return $result;
	}
	
	public function free_result($result){
		$result->free();
	}
	public function close_connection($con){
		$con->close();
	}
}


?>