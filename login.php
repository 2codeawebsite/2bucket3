<?php 
include_once 'Logic/Classes/goal.php';
include_once 'Logic/Classes/db_queries.php';
	
include('header.php');

$goal = new Goal();
$procent = new Queries();
?>
	<div id="site">
		<?php 
			// if($_SESSION['new_user']) {
				// echo $_SESSION['new_user'];
				// $_SESSION['new_user'] = NULL;
			// }
		?>
	    <h2>Login</h2>
	    <form action="loginauth.php" method="POST" id="form_login">
			<label for="username">Username:</label> <input type="text" name="username" id="username"><br>
			<label for="password">Password:</label> <input type="text" name="password" id="password">
			<p><input type="submit" value="Login" class="green"></p>
			</form>
	    <?php
	       
	    ?>
	</div>
<?php include('footer.php'); ?>