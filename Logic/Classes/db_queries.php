<?php

include_once 'db_connection.php';
require_once 'user.php';

class Queries {
	
	public function getAvarageGoals() {
		$con = new Connection();
		$result = $con->run_query('SELECT (SELECT COUNT(ID) FROM goal) / (SELECT COUNT(ID) FROM user)');
		while ($row = $result->fetch_row()) {
        	$avgGoals = $row[0];
    	}
		return $avgGoals;
	}
	
	public function markGoalAsAchieved($goalId) {
		$con = new Connection();
		$result = $con->run_query('UPDATE goal SET goalStatus = 1 WHERE goalId = "' . $goalId . '"');
		//$con->close_connection($con);
		return $result;
	}
	
	public function createUser($user){
		$con = new Connection();
		$result = $con->run_query('INSERT INTO user (`facebook_id`, `first_name`, `last_name`, `username`, 
			`email`, `city`, `country`, `age`, `gender`, `worktitle`, `password`) 
			VALUES (NULL,"'.$user->getFirstName().'","'. $user->getLastName().'","'. $user->getUserName().'",
			"'. $user->getEmail().'","'.$user->getCity().'","'. $user->getCountry().'","'. $user->getAge().'",
			"'. $user->getGender().'","'. $user->getWorktitle().'","'. $user->getPassword().'")');
		return $result;
	}
	
	public function loginAuth($username, $password){
		$con = new Connection();
		$con->run_query('SELECT * FROM user WHERE username ="'.$username.'" AND password="'.$password.'"');	
	}

	public function getUserId($username) {
		$con = new Connection();
		$result = $con->run_query('SELECT `ID` FROM user WHERE username ="'.$username.'"');
		while ($row = $result->fetch_row()) {
        	$userId = $row[0];
    	}
		return $userId;
	}
	
	public function createBucketList($userId, $title, $description) {
		$con = new Connection();
		$result = $con->run_query('INSERT INTO list (`user_id`, `name`, `description`) 
			VALUES ("'.$userId.'", "'.$title.'", "'.$description.'")');	
		return $result;
	}
}
?>