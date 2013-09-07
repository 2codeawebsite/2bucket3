<?php

include_once 'db_connection.php';
require_once 'user.php';
require_once 'goal.php';

class Queries {
	
	public function getAvarageGoals() {
		$con = new Connection();
		$result = $con->run_query('SELECT (SELECT COUNT(ID) FROM goal) / (SELECT COUNT(ID) FROM user)');
		$row = $result->fetch_array(MYSQLI_NUM);
		return $row[0];
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
	
	public function createGoal($goal){
		$con = new Connection();
		$result = $con->run_query('INSERT INTO goal (`user_id`, `start_date`, `title`, `description`) 
			VALUES ("'.$goal->getUserId().'", "'.$goal->getStartDate().'", "'.$goal->getTitle().'", "'.$goal->getDescription().'")');
		return $result;
	}
	
	public function loginAuth($username, $password){
		$con = new Connection();
		$con->run_query('SELECT * FROM user WHERE username ="'.$username.'" AND password="'.$password.'"');	
	}

	public function getUserId($username) {
		$con = new Connection();
		$result = $con->run_query('SELECT `ID` FROM user WHERE username ="'.$username.'"');
		$row = $result->fetch_array(MYSQLI_NUM);
		return $row[0];
	}
	
	public function createBucketList($userId, $title, $description) {
		$con = new Connection();
		$result = $con->run_query('INSERT INTO list (`user_id`, `name`, `description`) 
			VALUES ("'.$userId.'", "'.$title.'", "'.$description.'")');	
		return $result;
	}
	
	/*
	 * This function queries a view that joins tables user, goal and list
	 * */
	public function getAllOnUsers($userId = NULL) {
		$con = new Connection();
		$qry = 'SELECT * FROM all_on_user';
		if($userId) {
			$qry .= ' WHERE user_id ='.$userId;
		} 
		$result = $con->run_query($qry);
		return $this->resultToArray($result);
	}
	
	
	/*
	 * Function takes a resultset and returns an array
	 * */
	private function resultToArray($result) {
	    $rows = array();
	    while($row = $result->fetch_assoc()) {
	        $rows[] = $row;
	    }
	    return $rows;
	}

}
?>