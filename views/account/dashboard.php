<?php
include('../../header.php');
$page 	= 'dashboard';
$qry 	= new Queries();
?>
<div id="site"> 
<?php
	if($_SESSION['user']):
		$list = $qry->getBucketList($_SESSION['user']['ID']);
		include('menu.php');
	?>
	<div class="content">
	    <h2>Dashboard</h2>
	    <?php
	    	foreach($list as $row){
	    		$goals = $qry->getBucketGoals($row['ID']);
				echo "<pre>";
				print_r($goals);
				
	    		echo '<div class="goalbox">';
	    		echo '<h2>'.$row['name'].'</h2>';
				echo '<p class="description">'.$row['description'].'</p>';
				
				foreach($goals as $goal){
					echo '<p class="goal"><strong>'.$goal['title'].':</strong> '.$goal['description'].'<br>';
				
					if($goal['days'] > 1){
						echo '<small>You have '.$goal['days'].' days to achieve this goal</small>';					
					} elseif($goal['days'] == 1) {
						echo '<small>You have '.$goal['days'].' day to achieve this goal</small>';
					} else {
						echo '<small>'.abs($goal['days']).' days to slow.. You are the weakest leech, goodbye!</small>';
					}
					echo '</p>';
				}
				echo '</div>';
	    	}
	    ?>
	</div>
	<?php endif; ?>
</div>
<?php include('../../footer.php'); ?>