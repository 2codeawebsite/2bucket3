<?php 
include('header.php');
?>
	<div id="site">
	    <h2>Add bucket list</h2>
	    
	    <form action="addbucketlist2.php" method="POST">
			<label for="title">Bucket list title:</label><br /><input type="text" name="title" id="title" value="Trip to australia"/><br>
			<label for="description">Description:</label><br /><textarea name="description" rows="4" cols="50">So many things to do</textarea>
			<p><input type="submit" value="Create Bucket list" class="green"></p>
		</form>
	</div>
<?php include('footer.php'); ?>