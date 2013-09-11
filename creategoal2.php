<?php

session_start();

require_once 'Logic/Classes/goal.php';
require_once 'Logic/Classes/db_queries.php';

if(
	isset($_POST['title']) && !empty($_POST['title']) &&
	isset($_POST['description']) && !empty($_POST['description'])  
){
	if(isset($_POST['id']) && !empty($_POST['id']))	{
		$userId = $_POST['id'];
	} else {
		$userId = $_SESSION['user']['ID'];	
	}
	$startDate = date("Y-m-d");
	$title = $_POST['title'];
	$description = $_POST['description'];
	
	$goal = Goal::constructGoal($userId, $startDate, $title, $description);
	$qry = new Queries();
	$result = $qry->createGoal($goal);

	if($result){
		header('Location: index.php');
	} else{
		header('Location: addgoal.php');
	}
	
}else{
	header('Location: addgoal.php');
}
?>