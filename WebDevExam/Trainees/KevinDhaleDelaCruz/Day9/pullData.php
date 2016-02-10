<?php

//header('Content-type: text/plain');

$server = "localhost";
$username = "trainee";
$password = "updews";
$dbname = "updews_training";

$con = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$action = $_POST["action"];
if($action == "showroom")
{
	$stmt = $con->prepare("SELECT * FROM accel");
	$stmt->execute();

	echo "<div id=\"tableDiv\">";
	echo "<table id=\"myTable\" align=\"center\">";
	echo "<tr>";
	echo "<th>Timestamp</th>";
	echo "<th>Node</th>";
	echo "<th>X-Val</th>";
	echo "<th>Y-Val</th>";
	echo "<th>Z-Val</th>";
	echo "<th>M-Val</th>";
	echo "<th>Purged</th>";
	echo "</tr>";

	foreach( $stmt as $row )
	{
		echo "<tr>";
		echo "<td>".$row['time_stamp']."</td>";
		echo "<td>".$row['node']."</td>";
		echo "<td>".$row['xval']."</td>";
		echo "<td>".$row['yval']."</td>";
		echo "<td>".$row['zval']."</td>";
		echo "<td>".$row['mval']."</td>";
		echo "<td>".$row['purged']."</td>";
		echo "</tr>";
	}

	echo "</table>";
	echo "</div>";
}

?>