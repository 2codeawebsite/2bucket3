<?php
include('../../header.php');
$page 	= 'bucket';
$qry = new Queries();
?>
<div id="site"> 
<?php
	if($_SESSION['user']):
		$goals = $qry->getGoals($_SESSION['user']['ID']);
		include('menu.php');
?>
	    <h2>Add bucket list</h2>
	    <form action="addbucketlist2.php" method="POST">
			<label for="title">Bucket list title:</label><br /><input type="text" name="title" id="title" value="Trip to australia"/><br>
			<label for="description">Description:</label><br /><textarea name="description" rows="4" cols="50">So many things to do</textarea>
			<p><input type="submit" value="Create Bucket list" class="green"></p>
		</form>
	</div>
<?php endif; include('../../footer.php'); ?>