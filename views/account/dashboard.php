<?php
include('../../header.php');
$page 	= 'dashboard';
$qry 	= new Queries();
?>
<div id="site"> 
<?php
	if($_SESSION['user']):
		$goals = $qry->getGoals($_SESSION['user']['ID']);
		include('menu.php');
	?>
	<div class="content">
	    <h2>My Goals</h2>
	    <?php
	    	foreach($goals as $row){
	    		echo '<div class="goalbox">';
	    		echo '<h2>'.$row['title'].'</h2>';
				echo '<p class="description">'.$row['description'].'</p>';
				echo '<p>List: '.$row['name'].'</p>';
				
				if($row['days'] > 1){
					echo '<p>You have '.$row['days'].' days to achieve this goal</p>';					
				} elseif($row['days'] == 1) {
					echo '<p>You have '.$row['days'].' day to achieve this goal</p>';
				} else {
					echo '<p>'.abs($row['days']).' days to slow.. You are the weakest leech, goodbye!</p>';
				}
				echo '</div>';
	    	}
	    ?>
	</div>
	<?php endif; ?>
</div>
<?php include('footer.php'); ?>