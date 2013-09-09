<?php
session_start();

require_once 'Logic/Classes/db_queries.php';

if(
	isset($_POST['title']) && !empty($_POST['title']) &&
	isset($_POST['description']) && !empty($_POST['description'])  
){	
	$userId = $_SESSION['user']['ID'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	
	$qry = new Queries();
	$result = $qry->createBucketList($userId, $title, $description);

	if($result){
		header('Location: index.php');
	} else{
		header('Location: addbucketlist.php');
	}	
} else {
	header('Location: addbucketlist.php');
}

?>