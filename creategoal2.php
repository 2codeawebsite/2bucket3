<?php

session_start();

require_once 'Logic/Classes/goal.php';
require_once 'Logic/Classes/db_queries.php';

if(
	isset($_POST['title']) && !empty($_POST['title']) &&
	isset($_POST['description']) && !empty($_POST['description'])  
){
	$title = $_POST['title'];
	$description = $_POST['description'];
	
	$userId = 1;
	$startDate = date("Y-m-d");
	
	$goal = Goal::constructGoal($userId, $startDate, $title, $description);
	$qry = new Queries();
	$result = $qry->createGoal($goal);

	if($result){
		header('Location: index.php');
	} else{
		header('Location: creategoal.php');
	}
	
}else{
	header('Location: creategoal.php');
}






?>