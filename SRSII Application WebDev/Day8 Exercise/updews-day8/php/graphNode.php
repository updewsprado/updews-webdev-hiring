<!DOCTYPE html>
<html>
<head>
	<title>DB PHP</title>
	<style>
		table, td {
			border: 1px solid black;
			text-align: center;
			font-family: Calibri;
		}
		td {
			width: 150px;
		}
	</style>
	<script src="../plugins/jquery-1.11.3.min.js"></script>
	<script src="../plugins/dygraph-combined-dev.js"></script>
</head>
<body>

<?php
	$node = intval($_POST["selectedNode"]);
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "trainee-updews";

	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);
	if ($mysqli->connect_error) {
		die("Connection failed: " . $mysqli->connect_error);
	}
	
	$query = "SELECT node, timestamp, xval, yval, zval, mval, purged FROM accel WHERE node = $node";
	
	if($result = $mysqli->query($query)) {
		echo "<table><tr><th>Time Stamp</th><th>Node</th><th>xval</th><th>yval</th><th>zval</th><th>mval</th><th>purged</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["timestamp"] . "</td><td>" . $row["node"] . "</td><td>" . $row["xval"] . "</td><td>" . $row["yval"] . "</td><td>" . $row["zval"] . "</td><td>" . $row["mval"] . "</td><td>" . $row["purged"] . "</td></tr>";
		}
		echo "</table>";
		$result->free();
	}
	
	$mysqli->close();
?>

<div id=”graphdiv2″ style=”width:600px; height:300px;”></div>
<script>
	graph2 = new Dygraph(document.getElementById(“graphdiv2”),
	<?php
	$node = intval($_POST["selectedNode"]);
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "trainee-updews";

	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);
	if ($mysqli->connect_error) {
		die("Connection failed: " . $mysqli->connect_error);
	}
	
	$query = "SELECT node, timestamp, xval, yval, zval, mval, purged FROM accel WHERE node = $node";
	
	if($result = $mysqli->query($query)) {
		while($row = $result->fetch_assoc()) {
			echo '"';
			$time = $row["timestamp"];
			echo ",";
			$x = $row["xval"];
			echo ",";
			$y = $row["yval"];
			echo ",";
			$z = $row["zval"];
			echo ",";
			$m = $row["mval"];
			echo '\n"';
		}
		$result->free();
	}
	
	$mysqli->close();
	?>
	

</script>

</body>
</html>