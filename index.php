<?php
include('header.php');
$qry = new Queries();
?>
	<div id="site"> 
		<h1>Newest created goals in all users bucketlists!</h1>
		<?php
			$result = $qry->getBucketList();
			
			foreach($result as $row){
				$goals = $qry->getBucketGoals($row['ID']);
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
			}
		?>
		
	</div>
<?php include('footer.php'); ?>