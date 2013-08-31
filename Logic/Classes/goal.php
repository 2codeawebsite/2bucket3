<?php

//include_once $_SERVER['DOCUMENT_ROOT'].'/Logic/Database/queries.php';

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
	 * Requirement no. 9
	 * Calculates the avarage number of goals of all the users
	 * NB!: Function changed when the database is connected
	 * 
	 * @return double
	 */
	public static function calculateAvarageGoals() {
		/*
		 * To be excluded when the database is connected 
		 */
		$numberOfTotalGoals = 10;
		$numberOfUsers = 3;
		
		/*
		 * To be included when the database has been connected
		 * 
		$instance = new Queries();
		$result = $instance->getAvarageGoals();
		while ($row = $result->fetch_object()) {
			$numberOfTotalGoals = $row->Goals;
			$numberOfUsers = $row->Users;
		}
		*/
		
		$result = $numberOfTotalGoals / $numberOfUsers;
		
		return number_format($result, 2);
		
	}
	
	
	/*
	 * Requirement no. 7
	 * This method runs when a user has achieved a goal
	 * NB!: Method changed when a database is implemented
	 * 
	 * @return: boolian
	 */
	public static function markGoalAsAchieved($goalId) {
		
		$result = FALSE;
		/*
		 * To be excluded when the database has been implemented
		 * */
		$result = TRUE;
		
		/*
		 * To be included when the database has been implemented
		 * 
		$instance = new Queries();
		$result = $instance->markGoalAsAchieved($goalId);
		if($result) $result = TRUE;
		*/
		
		return $result;
	}
	
	
	
}

?>