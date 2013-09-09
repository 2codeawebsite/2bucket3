<?php include('header.php'); ?>
	<div id="site">
	    <h2>Add goal</h2>
	    <form action="creategoal2.php" method="POST">
			<label for="title">Goal title:</label><br /><input type="text" name="title" id="title" value="Grow a beard"/><br>
			<label for="description">Description:</label><br /><textarea name="description" rows="4" cols="50">Because it's the manly thing to do</textarea>
			<p><input type="submit" value="Create Goal" class="green"></p>
		</form>
	</div>
<?php include('footer.php'); ?>