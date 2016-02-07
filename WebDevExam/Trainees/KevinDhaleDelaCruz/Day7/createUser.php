<?php  

if(isset ($_POST["submit"]))
{
	$post = $_POST;

	$server = "localhost";
	$username = "trainee";
	$password = "updews";
	$dbname = "updews_training";

	$con = new PDO("mysql:host=$server", 'root', '');
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try
	{
		$con = new PDO("mysql:host=$server", 'root', '');
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con->query("CREATE USER 'trainee'@$server IDENTIFIED BY 'updews'");
		$con->query("GRANT ALL PRIVILEGES  ON *.* TO $username@'localhost'
 			WITH GRANT OPTION");

		echo "User successfully created!";

	} catch(PDOException $e) {
		echo "User already exists!";
	}

}

?>