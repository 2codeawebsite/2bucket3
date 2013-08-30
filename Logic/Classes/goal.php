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
		$goal = new Goal();
		return $goal;
	}	 
	
	public static function constructWithAll($goalId, $userId, $startDate, $title, $description) {
		$goal = new Goal();
		$goal->goalId 		= $goalId;
		$goal->userId 		= $userId;
		$goal->startDate 	= $startDate;
		$goal->title 		= $title;
		$goal->goal 		= $goal;
				
		return $goal;
	}
	
	public function getGoalId() {
		return $this->goalId;
	}
	
	public function getUserId() {
		return $this->userId;
	}
	
	public function getStartDate() {
		return $this->startDate;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function getDescription() {
		return $this->description;
	}
	
	/*
	 * Calculates the avarage number of goals of all the active users
	 */
	public function calcualteAvarageGoals() {
		// $numberOfTotalGoals = SELECT COUNT(goalId) FROM goal;
		$numberOfTotalGoals = 1000;
		// $numberOfUsers = SELECT COUNT(userId) FROM user WHERE (SELECT userId FROM goal WHERE COUNT(goalId) > 0);
		$numberOfUsers = 100;
		
		return $numberOfTotalGoals / $numberOfUsers;
	}
	
	
	
}

?>