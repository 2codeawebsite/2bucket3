<?php
session_start();

require_once '../../Logic/Classes/goal.php';
require_once '../../Logic/Classes/db_queries.php';

if(
	isset($_POST['title']) && !empty($_POST['title']) &&
	isset($_POST['description']) && !empty($_POST['description'])  
){
	if(isset($_POST['id']) && !empty($_POST['id']))	{
		$userId = $_POST['id'];
	} else {
		$userId = $_SESSION['user']['ID'];	
	}
	$date 	= strtotime(date("Y-m-d")."+ 30 days");
	$endDate = date("Y-m-d",$date);
	
	$title 			= $_POST['title'];
	$description 	= $_POST['description'];
	$bucket 		= $_POST['list'];
	
	$goal = Goal::constructGoal($userId, $endDate, $title, $description, $bucket);
	$qry = new Queries();
	$result = $qry->createGoal($goal);

	if($result){
		header('Location: '.base_url.'views/account/dashboard.php');
	} else{
		header('Location: '.base_url.'views/account/addgoal.php');
	}
	
}else{
	header('Location: '.base_url.'views/account/addgoal.php');
}
?>