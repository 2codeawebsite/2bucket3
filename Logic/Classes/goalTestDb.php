<?php 

include_once 'goal.php';
include_once 'db_connection.php';
include_once 'db_queries.php';


class GoalTestDb extends PHPUnit_Framework_TestCase {
		
	public function XtestCalculateAvarageGoals() {
		$goal = new Goal();
		$count = $goal->calculateAvarageGoals();
		$this->assertEquals($count, 0.22);
	}

}
?>