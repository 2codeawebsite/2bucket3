<?php 
require_once '\Logic\Classes\user.php';
require_once '\Logic\Database\queries.php';
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
	
	$user = new user($firstname, $lastname, $username, $email, $city, $country, $age, $gender, $worktitle, $password);
	$qry = new queries();
	//$qry->createUser($user);
	if($qry->createUser($user)){
		header('Location: index.php');
	}else{
		header('Location: createuser.php');
	}
	
}else{
	header('Location: createuser.php');
}






?>