<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Volcanology Home</title>
</head>

<body>

<?php
	if (isset($_POST["subscribe"])) { 
		$userName = $_POST["name"];
		$userEmail = $_POST["email"];
		$userAge = $_POST["age"];
	}

	echo "<h1>Welcome, " . $userName . "!</h1>";
	echo "<h3>Your subscription summary:</h3>";
	echo "<p>Your email address: <b>" . $userEmail . "</b></p>";
	echo "<p>Your age: <b>" . $userAge . "</b></p>";
?>

</body>
</html>
