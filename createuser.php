<?php include('header.php'); ?>
<div id="site">
	<form action="createuser2.php" method="POST" class="form_inputs">
		<table cellspacing="0" cellpadding="0">
		<tr><td>
		<label for="firstname">Name:</label>
		<input type="text" name="firstname" id="firstname" value="Hans"> 
		<label for="lastname">Last name:</label>
		<input type="text" name="lastname" id="lastname" value="Hansen">
		<label for="username">Username:</label>
		<input type="text" name="username" id="username" value="hhansen">
		<label for="password">Password:</label>
		<input type="text" name="password" id="password" value="1234">
		<label for="email">Email:</label>
		<input type="text" name="email" id="email" value="hans@hansen.dk">
		</td><td>
		<label for="city">City:</label>
		<input type="text" name="city" id="city" value="Copenhagen">
		<label for="country">Country:</label>
		<input type="text" name="country" id="country" value="Denmark">
		<label for="age">Age:</label>
		<input type="text" name="age" id="age" value="21">
		<label for="gender">Gender:</label>
		<input type="text" name="gender" id="gender" value="male">
		<label for="worktitle">Worktitle:</label>
		<input type="text" name="worktitle" id="worktitle" value="Student">
		</td></tr>
		<tr><td colspan="2">
		<p><input type="submit" value="Create User" class="green"></p>
		</td></tr>
		</table>
	</form>
</div>
<?php unclude('footer.php'); ?>