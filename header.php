<?php 
session_start();
require_once 'Logic/Classes/goal.php';
require_once 'Logic/Classes/user.php';
require_once 'Logic/Classes/db_queries.php';

$goal = new Goal();
$procent = new Queries();
?>

<!DOCTYPE html>
<html>
<head>
<title>2Bucket - Get it done before you die!</title>
<link href='http://fonts.googleapis.com/css?family=Pathway+Gothic+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<header id="header">
    <div class="container">
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <?php if($_SESSION['user']) { ?>
            	<li><a href="addgoal.php">Add goal</a></li>
            	<li><a href="addbucketlist.php">Create new bucket list</a></li>
            	<li><a href="logout.php">Logout [<?php echo $_SESSION['user']['first_name'] ?>]</a></li>
            <?php } else { ?>
            	<li><a href="createuser.php">Create user</a></li>
            	<li><a href="login.php">Login</a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="clearB"></div>
</header>
<div id="spacer">
			<?php
				if($_SESSION['user']) {
					
					$user = new User($_SESSION['user']['first_name'], $_SESSION['user']['last_name'], $_SESSION['user']['username'], 
					$_SESSION['user']['email'], $_SESSION['user']['city'], $_SESSION['user']['country'], $_SESSION['user']['age'],
					$_SESSION['user']['gender'], $_SESSION['user']['worktitle'], '');
					
					$qry = new Queries();
					$array = $qry->fearFactor($_SESSION['user']['ID']);
					$result = number_format($user->fearFactorProcentage($user->age, $user->gender, $array[1], $array[0]), 2);
					
					echo '<div class="achieving green">';
					echo 'You have a';
	        		echo '<h1>'. $result . '%</h1>';
	        		echo 'of achieving your goals!';
	    			echo '</div>';
				} 
				if (isset($_POST['id']) && !empty($_POST['id'])) {
					require_once 'Logic/Classes/performance_test_frontpage.php';
				}
			?>
		<div class="achieved green">
	        Users have
	        <h1><?php echo $procent->procentageAchievedGoalsAllUsers(); ?>%</h1>
	        achieved goals!
	    </div>
	    <div class="average green">
	        Users have an average of
	        <h1><?php echo $goal->calculateAvarageGoals(); ?></h1>
	        goals to achieve!
	    </div>
	</div>