<?php

class Goal {
	
	private $goalId;
	private $userId;
	private $startDate;
	private $title;
	private $description;
	
	public function __construct($goalId, $userId, $startDate, $title, $description) {
		$this->goalId = $goalId;
		$this->userId = $userId;
		$this->startDate = $startDate;
		$this->title = $title;
		$this->description = $description;	
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
	 * Should these two methods be in this class or the User class?
	 * 
	public function numberOfUnachievedGoals($totalGoals, $goalsAchieved) {

		$result = $totalGoals - $goalsAchieved;

		if($result >= 0) {
			return $result;
		} else {
			return false;
		}
	}

	public function numberOfUnachievedGoalsProcentage($totalGoals, $goalsAchieved) {

			return $goalsAchieved / $totalGoals * 100;

	}
	 */
	
}

?>