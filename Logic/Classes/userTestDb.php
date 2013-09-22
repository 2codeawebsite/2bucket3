<?php 

include_once 'user.php';
include_once 'db_connection.php';
include_once 'db_queries.php';


class UserTestDb extends PHPUnit_Framework_TestCase {
	
	function XtestCreateNewUser() {
		$user = new User('Nina', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 45, 'female', 'cleaner', '1234');
		$qry = new Queries();
		$result = $qry->createUser($user);
		$this->assertTrue($result);
	}

}
?>