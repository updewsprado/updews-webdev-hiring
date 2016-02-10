<!DOCTYPE html>
<html>
<head>

<title>Table "accel"</title>
	
<link rel="stylesheet" type="text/css" href="mystyle.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="ddtf.js"></script>


</head>

<body>

<div id="header">
	<h1 align="center">Table "accel"</h1>
</div>

<div class="container">

	<div id="sidebar">
		<div align="center">
			<p>Sidebar</p>
		</div>
	</div>

<?php

//header('Content-type: text/plain');

$server = "localhost";
$username = "trainee";
$password = "updews";
$dbname = "updews_training";

$con = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $con->prepare("SELECT * FROM accel");
$stmt->execute();

?>


	<div id="content">
		<div id="tableDiv">
			<table id="myTable" align="center">
				<thead>
					<tr>
						<th>Timestamp</th>
						<th>Node</th>
						<th>X-Val</th>
						<th>Y-Val</th>
						<th>Z-Val</th>
						<th>M-Val</th>
						<th>Purged</th>
					</tr>
				</thead>
				<tbody>
					<?php
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
					?>
				</tbody>
			</table>
			<script>
				jQuery('#myTable').ddTableFilter();
			</script>

		</div>
	</div>
</div>
	

</body>
</html>