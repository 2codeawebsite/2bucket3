<?php 

require_once 'goal.php';
require_once 'db_connection.php';
require_once 'db_queries.php';


class GoalTestDb extends PHPUnit_Framework_TestCase {
		
	public function XtestCalculateAvarageGoals() {
		$goal = new Goal();
		$count = $goal->calculateAvarageGoals();
		$this->assertEquals($count, 0.22);
	}

}
?>