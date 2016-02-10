<!DOCTYPE html>
<html>
<head>

<title>DyGraphs</title>
	
<link rel="stylesheet" type="text/css" href="mystyle.css">
<script type="text/javascript" 
	src="dygraph-combined-dev.js"></script>

</head>

<body>
	<div id="header">
		<h1 align="center">DyGraphs</h1>
	</div>

	<div class="container">
		<div id="sidebar">
			<p style="text-align:center;">Sidebar</p>
		</div>
		<div id="content">
			<div id="graphdiv"></div>
		</div>
	</div>
	
	<script type="text/javascript">
	  g = new Dygraph(

	    // containing div
	    document.getElementById("graphdiv"),

	    <?php
	    	$server = "localhost";
			$username = "trainee";
			$password = "updews";
			$dbname = "updews_training";

			$con = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $con->prepare("SELECT * FROM accel");
			$stmt->execute();

			$i = 1;
			echo "[";
			foreach( $stmt as $row )
			{
				$node = $row['node'];
				$xval = $row['xval'];
				$yval = $row['yval'];
				$zval = $row['zval'];
				$mval = $row['mval'];
				echo "[".$i.",".$node.",".$xval.",".$yval.",".$zval.",".$mval."]";
				$i++;
				if( end($stmt) !== $row) {
					echo ",";
				}

			}
			echo "]";
		?>,
	    {
	    	legend: 'always',
	    	labels:  ['try','node','xval','yval', 'zval', 'mval'],
	    	connectSeparatedPoints: true,
       		drawPoints: true,
	    	title: 'Table "accel"'

	    }

	  );
	</script>

</body>
</html>