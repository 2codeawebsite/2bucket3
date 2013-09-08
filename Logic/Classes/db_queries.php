<?php

include_once 'db_connection.php';
require_once 'user.php';
require_once 'goal.php';

class Queries {
	
	private $instance;
	
	public function getAvarageGoals() {
		$instance = new Connection();
		$result = $instance->run_query('SELECT (SELECT COUNT(ID) FROM goal) / (SELECT COUNT(ID) FROM user)');
		$row = $result->fetch_array(MYSQLI_NUM);
		return $row[0];
	}
	
	public function markGoalAsAchieved($goalId) {
		$instance = new Connection();
		$result = $instance->run_query('UPDATE goal SET goalStatus = 1 WHERE goalId = "' . $goalId . '"');
		//$instance->close_connection($instance);
		return $result;
	}
	
	public function createUser($user){
		$instance = new Connection();
		$result = $instance->run_query_last_inserted_id('INSERT INTO user (`facebook_id`, `first_name`, `last_name`, `username`, 
			`email`, `city`, `country`, `age`, `gender`, `worktitle`, `password`) 
			VALUES (NULL,"'.$user->first_name.'","'. $user->last_name.'","'. $user->username.'",
			"'. $user->email.'","'.$user->city.'","'. $user->country.'","'. $user->age.'",
			"'. $user->gender.'","'. $user->worktitle.'","'. $user->password.'")');
		return $result;
	}
	
	public function createGoal($goal){
		$instance = new Connection();
		$result = $instance->run_query('INSERT INTO goal (`user_id`, `start_date`, `title`, `description`) 
			VALUES ("'.$goal->userId.'", "'.$goal->startDate.'", "'.$goal->title.'", "'.$goal->description.'")');
		return $result;
	}
	
	public function loginAuth($username, $password){
		$instance = new Connection();
		$result = $instance->run_query('SELECT * FROM user WHERE username ="'.$username.'" AND password="'.$password.'"');
		return $result;
	}

	public function getUserId($username) {
		$instance = new Connection();
		$result = $instance->run_query('SELECT `ID` FROM user WHERE username ="'.$username.'"');
		$row = $result->fetch_array(MYSQLI_NUM);
		return $row[0];
	}
	
	public function createBucketList($userId, $title, $description) {
		$instance = new Connection();
		$result = $instance->run_query('INSERT INTO list (`user_id`, `name`, `description`) 
			VALUES ("'.$userId.'", "'.$title.'", "'.$description.'")');	
		return $result;
	}
	
	/*
	 * This function queries a view that joins tables 'user', 'goal' and 'list'
	 * */
	public function getAllOnUsers($userId = NULL) {
		$instance = new Connection();
		$qry = 'SELECT * FROM all_on_user';
		if($userId) {
			$qry .= ' WHERE user_id ='.$userId;
		}
		return $instance->run_query_return_array($qry);
	}

}
?>