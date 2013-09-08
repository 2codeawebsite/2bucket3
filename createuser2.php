<?php 

session_start();

require_once '\Logic\Classes\user.php';
require_once '\Logic\Classes\goal.php';
require_once '\Logic\Classes\db_queries.php';

if(
	isset($_POST['firstname']) && !empty($_POST['firstname']) &&
	isset($_POST['lastname']) && !empty($_POST['lastname']) &&
	isset($_POST['username']) && !empty($_POST['username']) &&
	isset($_POST['email']) && !empty($_POST['email']) &&
	isset($_POST['city']) && !empty($_POST['city']) &&
	isset($_POST['country']) && !empty($_POST['country']) &&
	isset($_POST['age']) && !empty($_POST['age']) &&
	isset($_POST['gender']) && !empty($_POST['gender']) &&
	isset($_POST['worktitle']) && !empty($_POST['worktitle']) &&
	isset($_POST['password']) && !empty($_POST['password'])  
){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$worktitle = $_POST['worktitle'];
	$password = $_POST['password'];
	
	$user = new User($firstname, $lastname, $username, $email, $city, $country, $age, $gender, $worktitle, $password);
	$qry = new Queries();
	$userId = $qry->createUser($user);
	
	if($userId){
		$goal = Goal::constructGoal($userId, date("Y-m-d"), 'My first goal', 'My first goal is to create my first goal.');
		if($qry->createGoal($goal)) {
			if($qry->createBucketList($userId, "Lifelong", "This is the lifelong bucket list")) {
				$_SESSION['user_created'] = 'The user and the bucket list with a goal has been created';
			} else {
				$_SESSION['user_created'] = 'The user and goal have been created and the bucket list was NOT created!';
			}
		} else {
			$_SESSION['user_created'] = 'The user has been created but the goal and bucket list was NOT created!';
		}
		header('Location: index.php');
	} else{
		header('Location: createuser.php');
	}
	
}else{
	header('Location: createuser.php');
}






?>