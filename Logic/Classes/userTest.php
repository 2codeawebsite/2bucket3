<?php 

require_once 'user.php';
require_once 'db_connection.php';
require_once 'db_queries.php';


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
		$age = $user->age;
		$this->assertEquals($age, 45);
	}

	function testGetWrongProperty() {
		$user = new User('Jens', 'Hansen', 'jhansen', 'jens@hansen.dk', 'Copenhagen', 'Denmark', 45, 'male', 'carpenter', '1234');
		$age = $user->wrong_property;
		$this->assertNull($age);
	}

	/*
	 * Test years left to live based on age and gender (male)
	 * TestCase1 of hybrid flow graph
	 */
	 
	function testCalculateYeasLeftToLiveMale() {
		$user = new User('Jens', 'Hansen', 'jhansen', 'jens@hansen.dk', 'Copenhagen', 'Denmark', 45, 'male', 'carpenter', '1234');
		$yearsLeftToLive = $user->calculateYeasLeftToLive($user->age, $user->gender);
		$this->assertEquals($yearsLeftToLive, 29);
	}

	/*
	 * Test years left to live based on age and gender (female)
	 * TestCase2 of hybrid flow graph
	 * */
	function testCalculateYeasLeftToLiveFemale() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 45, 'female', 'cleaner', '1234');
		$yearsLeftToLive = $user->calculateYeasLeftToLive($user->age, $user->gender);
		$this->assertEquals($yearsLeftToLive, 33);
	}

	/*
	 * Test years left to live based on age and gender. The age is lower than required. 
	 * TestCase3 of hybrid flow graph
	 * @return false
	 * */	
	function testCalculateYeasLeftToLiveLowAge() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 9, 'female', 'cleaner', '1234');
		$result = $user->calculateYeasLeftToLive($user->age, $user->gender);
		$this->assertFalse($result);
	}
	
	/*
	 * Test years left to live based on age and gender. The age is higher than required. 
	 * TestCase4 of hybrid flow graph
	 * @return false
	 * */
	function testCalculateYeasLeftToLiveHighAge() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 121, 'female', 'cleaner', '1234');
		$yearsLeftToLive = $user->calculateYeasLeftToLive($user->age, $user->gender);
		$this->assertFalse($yearsLeftToLive);
	}
	
	/*
	 * Two test of the numberOfUnachievedGoals()-function
	 * */
	
	function testNumberOfUnachievedGoalsOk() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 9, 'female', 'cleaner', '1234');
		$result = $user->numberOfUnachievedGoals(10, 5);
		$this->assertEquals($result, 5);
	}

	function testNumberOfUnachievedGoalsLow() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 9, 'female', 'cleaner', '1234');
		$result = $user->numberOfUnachievedGoals(10, 11);
		$this->assertFalse($result);
	}
	
	/*
	 * Two tests of the numberOfUnachievedGoalsProcentage()-function
	 * */
	function testNumberOfUnachievedGoalsProcentageOk() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 9, 'female', 'cleaner', '1234');
		$result = $user->numberOfUnachievedGoalsProcentage(10, 5);
		$this->assertEquals($result, 50);
	} 
	
	function testNumberOfUnachievedGoalsProcentageHigh() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 9, 'female', 'cleaner', '1234');
		$result = $user->numberOfUnachievedGoalsProcentage(10, 20);
		$this->assertFalse($result);
	} 
	
	
	/*
	 * One test of the fearFactor()-function
	 * */
	function testFearFactorOk() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 45, 'female', 'cleaner', '1234');

		$yearsLeftToLive = $user->calculateYeasLeftToLive($user->age, $user->gender);
		$numberOfUnachievedGoalsProcentage = $user->numberOfUnachievedGoalsProcentage(10, 4);

		// the $fearFactor varable needs to be parsed to a String (strval) in order to pass the test.
		$fearFactor = strval ($user->fearFactor($yearsLeftToLive, $numberOfUnachievedGoalsProcentage));

		$this->assertEquals($fearFactor, '1.862');
	}
	
	
	/*
	 * Two tests of the testFearFactorProcentage()-function
	 * */


}
?>