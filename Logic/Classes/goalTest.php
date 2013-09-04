<?php

require_once 'goal.php';
require_once 'user.php';

class GoalTest extends PHPUnit_Framework_TestCase {
	
	public function testObject() {
		$goal = new Goal(1, 1, '2013-08-30', 'Go to Syria', 'Talk to the Syrian leader and tell him that he is OK');
		$this->assertNotNull($goal);
	}
	
	/*
	 * This test is a bit irellevant! This could just as well be a database select statement 
	 * SELECT COUNT(goalId) FROM goals WHERE userId = 1
	 */
	public function testNumberOfGoalds() {
		$user = new User(1, 'Jens', 'Hansen', 'jhansen', 'jens@hansen.dk', 'Copenhagen', 'Denmark', 45, 'male', 'carpenter');
		
		$goal1 = Goal::constructWithAll(1, $user->getUserId(), '2013-08-30', 'Go to Syria', 'Talk to the Syrian leader and tell him that he is OK');
		$goal2 = Goal::constructWithAll(2, $user->getUserId(), '2013-08-30', 'Go to Syria', 'Talk to the Syrian leader and tell him that he is OK');
		
		$array = array(0 => $goal1, 1 => $goal2);
		$this->assertEquals(sizeof($array), 2);
	}
	
	public function testCalculateAvarageGoals() {
		$count = Goal::calculateAvarageGoals();
		$this->assertEquals($count, 3.33);
	}
	
	public function testMarkGoalAsAchieved() {
		$result = Goal::markGoalAsAchieved(3);
		$this->assertTrue($result);
	}
	
	
}


?>