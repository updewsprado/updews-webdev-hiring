<?php
include_once 'conf/db_conf.php';

$row = 1;
if (($handle = fopen("gamb.csv", "r")) !== FALSE) {
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$num = count($data);
		for ($c=0; $c < $num; $c++) {
			echo $data[$c] . "<br />\n";
		}

		$sql_query = "INSERT INTO accel(time_stamp,node,xval,yval,zval,mval,purged) VALUES('$data[0]','$data[1]','$data[2]',																												'$data[3]','$data[4]','$data[5]','$data[6]')";
		mysqli_query($con,$sql_query);
	}
	fclose($handle);
}


?>