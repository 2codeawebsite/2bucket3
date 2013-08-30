<?php

require_once 'Logic/Classes/goal.php';
require_once 'Logic/Classes/user.php';

class GoalTest extends PHPUnit_Framework_TestCase {
	
	public function testObject() {
		$goal = new Goal(1, 1, '2013-08-30', 'Go to Syria', 'Talk to the Syrian leader and tell him that he is OK');
		$this->assertNotNull($goal);
	}
	
	public function testNumberOfGoalds() {
		$user = new User(1, 'Jens', 'Hansen', 'jhansen', 'jens@hansen.dk', 'Copenhagen', 'Denmark', 45, 'male', 'carpenter');
		
		$goal1 = new Goal(1, $user->getUserId(), '2013-08-30', 'Go to Syria', 'Talk to the Syrian leader and tell him that he is OK');
		$goal2 = new Goal(2, 1, '2013-08-30', 'Go to Syria', 'Talk to the Syrian leader and tell him that he is OK');
		
		$array = array(0 => $goal1, 1 => $goal2);
		$this->assertEquals(sizeof($array), 2);
	}
	
	
	
}


?>