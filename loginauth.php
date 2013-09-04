<?php 
	require_once '\Logic\Database\queries.php';
if(
	isset($_POST['username']) && !empty($_POST['username']) &&
	isset($_POST['password']) && !empty($_POST['password']))
	{
	$con = new connection();
	$result = $con->loginauth($_POST['username'],$_POST['password']);
	if($result == TRUE){
		header('bucket.php');
	}else{
		header('login.php');
	}
				
	
}else{
	header('login.php');
}

?>
