<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/Logic/Database/connection.php';

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
}

?>