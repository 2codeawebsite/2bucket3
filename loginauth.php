<?php
session_start();
require_once 'Logic/Classes/db_queries.php';

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
	$un = $_POST['username'];
	$pw = $_POST['password'];
	
	$qry = new Queries();
	$result = $qry->loginAuth($un, $pw);
	if ($result[0]) {
		$_SESSION['user'] = $qry->getUserInfo($un);
		header('Location: index.php');
		//Location and content?
	} else {
		$_SESSION['login_failed'] = 'User not found or incorrect password!';
		header('Location: login.php');
	}
} else {
	$_SESSION['login_failed'] = 'You got to type something in both fields!';
	header('Location: login.php');
}
?>
