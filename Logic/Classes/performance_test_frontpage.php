<?php

include_once 'Logic/Classes/user.php';
include_once 'Logic/Classes/goal.php';
include_once 'Logic/Classes/db_queries.php';

if(
	isset($_POST['id']) && !empty($_POST['id']) &&
	isset($_POST['firstname']) && !empty($_POST['firstname']) &&
	isset($_POST['lastname']) && !empty($_POST['lastname']) &&
	isset($_POST['username']) && !empty($_POST['username']) &&
	isset($_POST['email']) && !empty($_POST['email']) &&
	isset($_POST['city']) && !empty($_POST['city']) &&
	isset($_POST['country']) && !empty($_POST['country']) &&
	isset($_POST['age']) && !empty($_POST['age']) &&
	isset($_POST['gender']) && !empty($_POST['gender']) &&
	isset($_POST['worktitle']) && !empty($_POST['worktitle'])
){
	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$worktitle = $_POST['worktitle'];
	
	$user = new User($firstname, $lastname, $username, $email, $city, $country, $age, $gender, $worktitle, '');

	$qry = new Queries();
	$array = $qry->fearFactor($id);
	$result = number_format($user->fearFactorProcentage($user->age, $user->gender, $array[1], $array[0]), 2);
	
	echo '<div class="achieving green">';
	echo 'You have a';
	echo '<h1>'. $result . '%</h1>';
	echo 'of achieving your goals!';
	echo '</div>';
}

?>