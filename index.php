<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>2Bucket - Get it done before you die!</title>
</head>

<body>
	<?php
		if($_SESSION['user_created']) {
			echo "<strong>" . $_SESSION['user_created'] . "</strong>";
			$_SESSION['user_created'] = NULL;
		}
	
	?> 
<div class="button"><a href="createuser.php">Create User</a></div>
<!-- <div class="button"><a href="Logic/facebook-login/login.php">Create User using Facebook</a></div> -->
<div class="button"><a href="login.php">Login</a></div>
<br>
<?php

require_once 'Logic/Classes/goal.php';

$goal = new Goal();
echo 'The avarage number of goals per user is: '.$goal->calculateAvarageGoals();

?>
</body>

</html> 