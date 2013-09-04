<?php 

require_once 'user.php';


class UserTest extends PHPUnit_Framework_TestCase {

	function testGetAgeCreateObject() {
		$user = new User('Jens', 'Hansen', 'jhansen', 'jens@hansen.dk', 'Copenhagen', 'Denmark', 45, 'male', 'carpenter', '1234');
		$this->assertNotNull($user);
	}

	/*
	 * Test getAge() method
	 * */
	function testGetAge() {
		$user = new User('Jens', 'Hansen', 'jhansen', 'jens@hansen.dk', 'Copenhagen', 'Denmark', 45, 'male', 'carpenter', '1234');
		$age = $user->getAge();
		$this->assertEquals($age, 45);
	}

	/*
	 * Test years left to live based on age and gender (male)
	 */
	function testGetAgeMale() {
		$user = new User('Jens', 'Hansen', 'jhansen', 'jens@hansen.dk', 'Copenhagen', 'Denmark', 45, 'male', 'carpenter', '1234');
		$yearsLeftToLive = $user->calculateYeasLeftToLive($user->getAge(), $user->getGender());
		$this->assertEquals($yearsLeftToLive, 29);
	}

	/*
	 * Test years left to live based on age and gender (female)
	 * */
	function testGetAgeFemale() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 45, 'female', 'cleaner', '1234');
		$yearsLeftToLive = $user->calculateYeasLeftToLive($user->getAge(), $user->getGender());
		$this->assertEquals($yearsLeftToLive, 33);
	}

	/*
	 * Test years left to live based on age and gender. The age is lower than required. 
	 * @return false
	 * */	
	function testGetAgeLowAgeFalse() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 9, 'female', 'cleaner', '1234');
		$yearsLeftToLive = $user->calculateYeasLeftToLive($user->getAge(), $user->getGender());
		$this->assertFalse($yearsLeftToLive);
	}

	/*
	 * Test years left to live based on age and gender. The age is higher than required. 
	 * @return false
	 * */
	function testGetAgeHighAgeFalse() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 121, 'female', 'cleaner', '1234');
		$yearsLeftToLive = $user->calculateYeasLeftToLive($user->getAge(), $user->getGender());
		$this->assertFalse($yearsLeftToLive);
	}


	function testNumberOfUnachievedGoals() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 45, 'female', 'cleaner', '1234');
		$numberOfUnachievedGoals = $user->numberOfUnachievedGoals(10, 4);
		$this->assertEquals($numberOfUnachievedGoals, 6);
	}


	function testNumberOfUnachievedGoalsProcentage() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 45, 'female', 'cleaner', '1234');
		$number = $user->numberOfUnachievedGoalsProcentage(10, 4);
		$this->assertEquals($number, 40);
	}

	function testFearFactor() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 45, 'female', 'cleaner', '1234');

		$yearsLeftToLive = $user->calculateYeasLeftToLive($user->getAge(), $user->getGender());
		$numberOfUnachievedGoalsProcentage = $user->numberOfUnachievedGoalsProcentage(10, 4);

		// the $fearFactor varable needs to be parsed to a String (strval) in order to pass the test.
		$fearFactor = strval ($user->fearFactor($yearsLeftToLive, $numberOfUnachievedGoalsProcentage));

		$this->assertEquals($fearFactor, '1.862');
	}

}
?>