<?php
include('../../header.php');
$page 	= 'goal';
$qry = new Queries();
?>
<div id="site"> 
<?php
	if($_SESSION['user']):
		$lists = $qry->getBucketList($_SESSION['user']['ID']);
		include('menu.php');
?>
	    <h2>Add goal</h2>
	    <form action="<?php echo base_url; ?>views/account/creategoal2.php" method="POST">
			<label for="title">Goal title:</label><br /><input type="text" name="title" id="title" value="Grow a beard"/><br>
			<label for="description">Description:</label><br /><textarea name="description" rows="4" cols="50">Because it's the manly thing to do</textarea>
			<p>Lists:</p>
			<?php
				foreach($lists as $row){
					echo '<input type="radio" name="list" value="'.$row['ID'].'"> '.$row['name'].'<br>';
				}
			?>
			<p><input type="submit" value="Create Goal" class="green"></p>
		</form>
	</div>
<?php endif; include('../../footer.php'); ?>