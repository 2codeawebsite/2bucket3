<?php 
require_once 'Logic/Classes/goal.php';
require('header.php');
$goal = new Goal();
$procent = new Queries();
?>
	<?php
		if($_SESSION['user_created']) {
			echo "<strong>" . $_SESSION['user_created'] . "</strong>";
			//$_SESSION['user_created'] = NULL;
		}
	
	?>
	<div id="spacer">
		<div class="average">
	        Each user has <br>an average of
	        <h1><?php echo $procent->procentageAchievedGoalsAllUsers(); ?></h1>
	        goals to achieve!<br>
	    </div>
	    <div class="average">
	        Each user has <br>an average of
	        <h1><?php echo $goal->calculateAvarageGoals(); ?></h1>
	        goals to achieve!<br>
	    </div>
	</div>
	<div id="site">
	    <h2>Newest goals</h2>
	    <?php
	       
	    ?>
	</div>
	
</body>

</html> 