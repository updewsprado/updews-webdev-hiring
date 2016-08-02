<?php
	include_once 'conf/db_conf.php';
    $sql_query = "SELECT * FROM accel";
    $result = mysqli_query($con, $sql_query);

    $result_array = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $result_array[] = $row;
    }
    mysqli_close($con);

    $dbjson = fopen('dbjson.json', 'w');
	fwrite($dbjson, json_encode($result_array));
	fclose($dbjson);
?>