<?php 
require_once 'Logic/Classes/goal.php';
require_once 'Logic/Classes/db_queries.php';

include('header.php');

$qry = new Queries();
?>
	<div id="site"> 
	    <h2>Newest goals</h2>
	    <?php
	       if($_SESSION['user']) {
	       		/* This is userinformation */
	       		var_dump($_SESSION['user']); 
			    /* This returns all the data on the user that is logged in */
		   		//var_dump($qry->getAllOnUsers($_SESSION['user']['ID']));
		   }
	    ?>
	</div>
<?php include('footer.php'); ?>