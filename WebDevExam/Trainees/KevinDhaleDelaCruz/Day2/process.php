<?php  

if(isset ($_POST["submit"]))
{
	$post = $_POST;

	$server = "localhost";
	$username = "updews";
	$password = "";
	$dbname = "updews";

	try
	{
		$con = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if ($con->query ("DESCRIBE Users")) {
		} else {

			$sql = "CREATE TABLE Users (
		    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		    firstname VARCHAR(30) NOT NULL,
		    lastname VARCHAR(30) NOT NULL,
		    email VARCHAR(50),
		    age INT(2) UNSIGNED,
		    reg_date TIMESTAMP
		    )";

			$con->exec($sql);
			echo "Table Users created successfully";
		}

		$sql = "INSERT INTO Users (firstname, lastname, email, age) 
			VALUES (:firstname, :lastname, :email, :age)";
		
		$stmt = $con->prepare($sql);

		$stmt->bindParam(':firstname', $post['firstname'], PDO::PARAM_STR);       
		$stmt->bindParam(':lastname', $post['lastname'], PDO::PARAM_STR); 
		$stmt->bindParam(':email', $post['email'], PDO::PARAM_STR);
		$stmt->bindParam(':age', $post['age'], PDO::PARAM_STR);
		
		if ($stmt->execute()) {
			echo "Save sucess!";
		} else {
			echo "Save failed!";
		}

		$con = null;

	} catch(PDOException $e) {
		echo $e->getMessage();
	}

}

?>