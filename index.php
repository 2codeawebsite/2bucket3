<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>2Bucket - Get it done before you die!</title>
</head>

<body>
	<center>
	<?php
		if($_SESSION['user_created']) {
			echo "<strong>" . $_SESSION['user_created'] . "</strong>";
			$_SESSION['user_created'] = NULL;
		}
	
	?> 
	<div class="button"><a href="createuser.php">Create User</a></div>
	<!-- <div class="button"><a href="Logic/facebook-login/login.php">Create User using Facebook</a></div> -->
	<div class="button"><a href="login.php">Login</a></div>
	<div class="button"><a href="creategoal.php">Create Goal</a></div>
	
	<br>
	<?php
	
		require_once 'Logic/Classes/goal.php';
		
		$goal = new Goal();
		echo 'The avarage number of goals per user is now: '.$goal->calculateAvarageGoals();
		echo '</center>';
		echo '<hr>';
		
		require_once '\Logic\Classes\db_queries.php';
		
		$qry = new Queries();
		$result = $qry->getAllOnUsers();
		echo '<pre>';
		print_r($result);
	
	?>
</body>

</html> 