<?php
	/*function my_session_start()
	{
		if (ini_get('session.use_cookies') && isset($_COOKIE['PHPSESSID'])) {
			$sessid = $_COOKIE['PHPSESSID'];
		} elseif (!ini_get('session.use_only_cookies') && isset($_GET['PHPSESSID'])) {
			$sessid = $_GET['PHPSESSID'];
		} else {
			session_start();
			return false;
		}

	   if (!preg_match('/^[a-z0-9]{32}$/', $sessid)) {
			return false;
		}
		session_start();

	   return true;
	}*/
	//my_session_start();
	
	session_start();
	
	$_SESSION["name"];
	$_SESSION["email"];
	$_SESSION["age"];
	
	// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy(); 
?>
