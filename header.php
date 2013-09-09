<?php session_start();
require_once 'Logic/Classes/goal.php';
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
            <li><a href="createuser.php">Create user</a></li>
            <?php if($_SESSION['user']) { ?>
            	<li><a href="logout.php">Logout</a></li>
            <?php } else { ?>
            	<li><a href="login.php">Login</a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="clearB"></div>
</header>
<div id="spacer">
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