<?php

if(isset ($_POST["submit"]))
{
	$server = "localhost";
	$username = "trainee";
	$password = "updews";
	$dbname = "updews_training";

	$con = mysql_connect('localhost', 'root', '');
	if (!$con) {
	    die('Could not connect: ' . mysql_error());
	}

	$sql = mysql_select_db($dbname, $con);

	if (!$sql) {
	  // If we couldn't, then it either doesn't exist, or we can't see it.
	  $stmt = "CREATE DATABASE $dbname";

	  if (mysql_query($stmt, $con)) {
	      echo "Database " . $dbname . " created successfully\n";
	  } else {
	      echo 'Error creating database: ' . mysql_error() . "\n";
	  }

	} else {
		echo "Database " . $dbname . " already exists!";
	}
}

?>