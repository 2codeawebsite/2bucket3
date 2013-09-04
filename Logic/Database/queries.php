<?php

include_once '/Logic/Database/connection.php';
require_once '/Logic/Classes/user.php';

class Queries {
	
	public function getAvarageGoals() {
		$con = new Connection();
		$result = $con->run_query('SELECT (SELECT COUNT(ID) FROM goal) AS Goals, (SELECT COUNT(ID) FROM user) AS Users');
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
		$result = $con->run_query('INSERT INTO user VALUES ("",NULL,"'.$user->getFirstName().'","'. $user->getLastName().'","'. $user->getUserName().'","'. $user->getEmail().'","'.
		$user->getCity().'","'. $user->getCountry().'","'. $user->getAge().'","'. $user->getGender().'","'. $user->getWorktitle().'","'. $user->getPassword().'")');

		return $result;
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