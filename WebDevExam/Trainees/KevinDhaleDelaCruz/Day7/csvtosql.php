<?php
//header('Content-type: text/plain');
	
if(isset ($_POST["submit"]))
{
	$server = "localhost";
	$username = "trainee";
	$password = "updews";
	$dbname = "updews_training";

	try
	{
		$con = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $con->prepare("SELECT id FROM accel");
		$stmt->execute();

		if ($stmt->rowCount() > 0)
		{
			echo "Table already populated!";
		} else {

		   	$file = new SplFileObject("gamb.csv");
			$file->setFlags(SplFileObject::READ_CSV);
			foreach ($file as $row) {
			    list($timestamp, $node, $xval, $yval, $zval, $mval, $purged) = $row;
			    
			    $sql = "INSERT INTO accel (node, xval, yval, zval, mval, purged, time_stamp) VALUES ('$node', '$xval', '$yval', '$zval', '$mval', '$purged', '$timestamp')";
			    $con->exec($sql);
			}
			echo "Table migration successful!";
		}

	} catch(PDOException $e) {
		echo $e->getMessage();
	}

}

?>