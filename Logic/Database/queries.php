<?php

include_once '/Logic/Database/connection.php';

class Queries {
	
	public function getAvarageGoals() {
		$con = new Connection();
		$result = $con->run_query('SELECT (SELECT COUNT(goalId) FROM goal) AS Goals, (SELECT COUNT(userId) FROM user) AS Users');
		//$con->close_connection($con);
		return $result;
	}
	
	public function markGoalAsAchieved($goalId) {
		$con = new Connection();
		$result = $con->run_query('UPDATE goal SET goalStatus = 1 WHERE goalId = "' . $goalId . '"');
		//$con->close_connection($con);
		return $result;
	}
	
	public function createUser($user){
		$con = new Connection();
		$result = $con->run_query('INSERT INTO users VALUES ('.$user->$firstname.','. $user->$lastname.','. $user->$username.','. $user->$email.','.
		$user->$city.','. $user->$country.','. $user->$age.','. $user->$gender.','. $user->worktitle.','. $user->$password.')');
		
	}
	
	public function loginAuth($username, $password){
		$con = new Connection();
		$result = $con->run_query('SELECT * FROM user WHERE '.$username.' = username AND '.$password.'=password');
		if($result == TRUE){
			return TRUE;
		}else{
			return FALSE;
		}	
	}
}
?>