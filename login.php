<!DOCTYPE html>
<?php session_start();?>
<html>
	<head>
		<title>2Bucket - Login</title>
	</head>

	<body>
		<?php
		if($_SESSION['login_failed']) {
		echo "<strong>" . $_SESSION['login_failed'] . "</strong>";
		$_SESSION['login_failed'] = NULL;
		}
	
	?> 
		<div>
			<form action="loginauth.php" method="POST">
			Username:<input type="text" name="username">
			Password:<input type="password" name="password">
			<input type="submit" value="Login"></form>
			<br>
		</div>
	</body>

</html>
