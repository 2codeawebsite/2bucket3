<?php 
require_once 'Logic/Classes/goal.php';
require_once 'Logic/Classes/db_queries.php';

include('header.php');

$goal = new Goal();
$procent = new Queries();
?>
	<div id="site">
	    <h2>Newest goals</h2>
	    <?php
	       if($_SESSION['user']) { var_dump($_SESSION['user']); }
	    ?>
	</div>
<?php include('footer.php'); ?>