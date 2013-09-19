<?php

require_once 'goal.php';
require_once 'user.php';

class GoalTest extends PHPUnit_Framework_TestCase {
	
	public function testObject() {
		$goal = new Goal(1, 1, '2013-08-30', 'Go to Syria', 'Talk to the Syrian leader and tell him that he is OK');
		$this->assertNotNull($goal);
	}
	
	function testGetTitle() {
		$goal = new Goal(1, 1, '2013-08-30', 'Go to Syria', 'Talk to the Syrian leader and tell him that he is OK');
		$title = $goal->title;
		$this->assertEquals($title, 'Go to Syria');
	}
	
	function testGetWrongProperty() {
		$goal = new Goal(1, 1, '2013-08-30', 'Go to Syria', 'Talk to the Syrian leader and tell him that he is OK');
		$prop = $goal->wrong_property;
		$this->assertNull($prop);
	}
	
	/*
	 * This test is a bit irellevant! This could just as well be a database select statement 
	 * SELECT COUNT(goalId) FROM goals WHERE userId = 1
	 */
	public function testNumberOfGoals() {
		$user = new User(1, 'Jens', 'Hansen', 'jhansen', 'jens@hansen.dk', 'Copenhagen', 'Denmark', 45, 'male', 'carpenter');
		
		$goal1 = new Goal(1, $user->userId, '2013-08-30', 'Go to Syria', 'Talk to the Syrian leader and tell him that he is OK');
		$goal2 = new Goal(2, $user->userId, '2013-09-30', 'Also go to Syria', 'Talk to the Syrian leader and tell him that he is not OK');
		
		//$goal1 = Goal::constructWithAll(1, $user->getUserId(), '2013-08-30', 'Go to Syria', 'Talk to the Syrian leader and tell him that he is OK');
		//$goal2 = Goal::constructWithAll(2, $user->getUserId(), '2013-08-30', 'Go to Syria', 'Talk to the Syrian leader and tell him that he is OK');
		
		$array = array(0 => $goal1, 1 => $goal2);
		$this->assertEquals(sizeof($array), 2);
	}
	
	
	public function testMarkGoalAsAchieved() {
		$goal = new Goal();
		$result = $goal->markGoalAsAchieved(3);
		$this->assertTrue($result);
	}
	
	
}


?>