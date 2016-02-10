<?php

$server = "localhost";
$username = "trainee";
$password = "updews";
$dbname = "updews_training";

$con = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $con->prepare("SELECT * FROM accel");
$stmt->execute();


$action = $_POST["action"];
if($action == "showroom")
{

echo'<script type="text/javascript">
  g = new Dygraph(

    document.getElementById("graphdiv"),';

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
    

  echo ",{
    	legend: 'always',
    	labels:  ['try','node','xval','yval', 'zval', 'mval'],
    	connectSeparatedPoints: true,
   		drawPoints: true,
    	title: 'Table \"accel\"'

    }

  );

</script>";

}

/*
$action = $_POST["action"];
if($action == "showroom")
{

	<script type="text/javascript">
	  g = new Dygraph(

	    // containing div
	    document.getElementById("graphdiv"),

	    //put values here

	    ,{
	    	legend: 'always',
	    	labels:  ['try','node','xval','yval', 'zval', 'mval'],
	    	connectSeparatedPoints: true,
	   		drawPoints: true,
	    	title: 'Table "accel"'

	    }

	  );

	</script>
}*/

?>

