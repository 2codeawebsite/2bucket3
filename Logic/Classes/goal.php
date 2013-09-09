<?php

include_once 'db_queries.php';

class Goal {
	
	private $goalId;
	private $userId;
	private $startDate;
	private $title;
	private $description;
	
	/*
	 * With this type of constructor we are able to do method overload. 
	 * In PHP it is not possible to have multiple constructors like in Java 
	 */
	public function __construct() {
		$argv = func_get_args();
        switch( func_num_args() ) {
            case 1:
                self::__construct1();
                break;
            case 2:
                self::__construct2( $argv[0], $argv[1], $argv[2], $argv[3] );
				break;
			case 3:
                self::__construct3( $argv[0], $argv[1], $argv[2], $argv[3], $argv[4] );
         }
	}
	
	public function __construct1() {}
	
	public function __construct2($userId, $startDate, $title, $description) {
		$this->userId 		= $userId;
		$this->startDate 	= $startDate;
		$this->title 		= $title;
		$this->description 	= $description;	
	}
	
	public function __construct3($goalId, $userId, $startDate, $title, $description) {
		$this->goalId 		= $goalId;
		$this->userId 		= $userId;
		$this->startDate 	= $startDate;
		$this->title 		= $title;
		$this->description 	= $description;	
	}
	
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
	
	public static function constructGoal($userId, $startDate, $title, $description) {
		$goal = new self();
		
		$goal->userId 		= $userId;
		$goal->startDate 	= $startDate;
		$goal->title 		= $title;
		$goal->goal 		= $goal;
				
		return $goal;
	}
	
	/*
	 * Requirement no. 9 
	 * @return double
	 */
	public function calculateAvarageGoals() {
		
		$qry = new Queries();
		$result = $qry->getAvarageGoals();
		
		return number_format($result, 2);
		
	}
	
	
	/*
	 * Requirement no. 7
	 * This method runs when a user has achieved a goal
	 * NB!: Method changed when a database is implemented
	 * 
	 * @return: boolian
	 */
	public function markGoalAsAchieved($goalId) {
		
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
