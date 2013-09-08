<?php @require('header.php'); ?>
	<center>
	<?php
		if($_SESSION['user_created']) {
			echo "<strong>" . $_SESSION['user_created'] . "</strong>";
			//$_SESSION['user_created'] = NULL;
		}
	
	?> 
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