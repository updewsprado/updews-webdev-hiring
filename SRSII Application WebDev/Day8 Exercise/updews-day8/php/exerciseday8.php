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
</head>
<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "trainee-updews";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT timestamp, node, xval, yval, zval, mval, purged FROM accel";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "<table><tr><th>Time Stamp</th><th>Node</th><th>xval</th><th>yval</th><th>zval</th><th>mval</th><th>purged</th></tr>";
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["timestamp"] . "</td><td>" . $row["node"] . "</td><td>" . $row["xval"] . "</td><td>" . $row["yval"] . "</td><td>" . $row["zval"] . "</td><td>" . $row["mval"] . "</td><td>" . $row["purged"] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
		$conn->close();
	?>
	<br/>
	<h4>Please select a node to graph:</h4>
	<form action="graphNode.php" method="post">
		<select name="selectedNode">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
		</select>
		<input type="submit" value="Graph">
	</form>
</body>
</html>