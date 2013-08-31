<?php

class Goal {
	
	private $goalId;
	private $userId;
	private $startDate;
	private $title;
	private $description;
	
	/*
	public function __construct($goalId, $userId, $startDate, $title, $description) {
		$this->goalId 		= $goalId;
		$this->userId 		= $userId;
		$this->startDate 	= $startDate;
		$this->title 		= $title;
		$this->description 	= $description;	
	}
	 */
	 
	public static function constructEmpty() {
		return new self();
	}	 
	
	public static function constructWithAll($goalId, $userId, $startDate, $title, $description) {
		$goal = new self();
		
		$goal->goalId 		= $goalId;
		$goal->userId 		= $userId;
		$goal->startDate 	= $startDate;
		$goal->title 		= $title;
		$goal->goal 		= $goal;
				
		return $goal;
	}
	
	
	/*
	 * Calculates the avarage number of goals of all the active users
	 * Function changed when the database is connected
	 * 
	 * @return double
	 */
	public static function calculateAvarageGoals() {
		// $numberOfTotalGoals = SELECT COUNT(goalId) FROM goal;
		$numberOfTotalGoals = 1000;
		// $numberOfUsers = SELECT COUNT(userId) FROM user;
		$numberOfUsers = 333;
		
		$result = $numberOfTotalGoals / $numberOfUsers;
		return number_format($result, 2, ",", ".");
		
	}
	
	
	
}

?>