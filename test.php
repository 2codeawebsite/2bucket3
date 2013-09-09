<?php
session_start();

require_once 'Logic/Classes/user.php';
require_once 'Logic/Classes/db_queries.php';

$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 45, 'female', 'cleaner', '1234');
$result1 = $user->fearFactorProcentage(12, 'male', 8, 7);
$result2 = $user->fearFactorProcentage(74, 'male', 8, 1);
$result3 = $user->fearFactorProcentage(12, 'female', 8, 7);
$result4 = $user->fearFactorProcentage(78, 'female', 8, 1);

echo 'Male, 12 years, 8 total, 7 acheived: ' . $result1;
echo '<br>Male, 74 years, 8 total, 1 acheived: '. $result2;
echo '<br>Female, 12 years, 8 total, 7 acheived: '. $result3;
echo '<br>Female, 78 years, 8 total, 1 acheived: '. $result4;
echo '<br><br>';

$u = new User($_SESSION['user']['first_name'], $_SESSION['user']['last_name'], $_SESSION['user']['username'], 
	$_SESSION['user']['email'], $_SESSION['user']['city'], $_SESSION['user']['country'], $_SESSION['user']['age'],
	$_SESSION['user']['gender'], $_SESSION['user']['worktitle'], '0000');
	
$qry = new Queries();
$array = $qry->fearFactor($_SESSION['user']['ID']);
$result5 = number_format($u->fearFactorProcentage($u->age, $u->gender, $array[1], $array[0]), 2).' % chance of achieving your goals';
echo $result5;
?>