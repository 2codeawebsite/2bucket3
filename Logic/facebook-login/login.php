<?php
session_start();


// https://developers.facebook.com/docs/reference/login/#permissions

require 'src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook( array('appId' => '327709837366013', 'secret' => 'a96463e45658ba46a0ba3c6e86030f0f', ));

// Get User ID
$user = $facebook -> getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
	try {
		// Proceed knowing you have a logged in user who's authenticated.
		$user_profile = $facebook -> api('/me');
	} catch (FacebookApiException $e) {
		error_log($e);
		$user = null;
	}
}

// Login or logout url will be needed depending on current user state.
if ($user) {
	$logoutUrl = $facebook -> getLogoutUrl();
	
} else {
	$loginUrl = $facebook -> getLoginUrl(array(
		'scope' => 'user_about_me, user_hometown, email'
	));
}



/*
if ($user):
	echo $logoutUrl;

else: 
*/
//echo $loginUrl;
header ('Location: '.$loginUrl.'' );



if ($user) {
	$_SESSION['user_profile'] = $user_profile;
}

header ('../../createuser.php');
	
	
	/*<img src="https://graph.facebook.com/<?php echo $user; ?>/picture"> */

//print_r($user_profile); 
/*
			echo $user_profile['first_name'];
			echo '<br>';
			echo $user_profile['last_name'];
			echo '<br>';
			echo $user_profile['email'];
			echo '<br>';
			echo $user_profile['user_birthday'];
*/

?>
