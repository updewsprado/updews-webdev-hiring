<!DOCTYPE html>
<html>
<head>

<title>DyGraphs</title>
	
<link rel="stylesheet" type="text/css" href="mystyle.css">
<script type="text/javascript" src="dygraph-combined-dev.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script type="text/javascript">
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>

</head>

<body>
	<div class="se-pre-con"></div>
	<div id="header">
		<h1 align="center">Gamb.csv Graph</h1>
	</div>

	<div class="container">
		<div id="sidebar">
			<p style="text-align:center;">Sidebar</p>
		</div>
		<div id="content">
			<div id="graphdiv"></div>

		</div>
	</div>

</body>

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

</html>