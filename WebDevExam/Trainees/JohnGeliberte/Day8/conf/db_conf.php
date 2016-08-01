<?php
$host = "localhost";
$user = "root";
$password = "secret123";
$datbase = "dews_training";
$con = mysqli_connect($host,$user,$password);
mysqli_select_db($con,$datbase);
?>