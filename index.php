<?php
include('header.php');
$qry = new Queries();
?>
	<div id="site"> 
		
		<?php
			$result = $qry->getBucketList();
			
			foreach($result as $row){
				echo '<h2>'.$row['name'].'</h2>';
			}
		?>
		
	</div>
<?php include('footer.php'); ?>