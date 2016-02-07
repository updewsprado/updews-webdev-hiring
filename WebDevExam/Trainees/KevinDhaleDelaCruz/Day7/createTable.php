<?php  

if(isset ($_POST["submit"]))
{
	$post = $_POST;

	$server = "localhost";
	$username = "trainee";
	$password = "updews";
	$dbname = "updews_training";

	try
	{
		$con = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE TABLE accel (
		    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		    node INT(2) UNSIGNED,
		    xval INT(8),
		    yval INT(8),
		    zval INT(8),
		    mval INT(8),
		    purged VARCHAR(20),
		    time_stamp TIMESTAMP
		    )";

		$con->exec($sql);
		echo "Table accel created successfully";

	} catch(PDOException $e) {
		echo "Table accel already exists!";
	}

}

?>