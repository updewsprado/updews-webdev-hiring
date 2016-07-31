<?php
include_once 'conf/db_config.php';
if(isset($_POST['btn-save']))
{
	$full_name = $_POST['fullname'];
	$email = $_POST['email'];
	$age = $_POST['age'];

	$sql_query = "INSERT INTO users(name,email,age) VALUES('$full_name','$email','$age')";
	mysql_query($sql_query);
}

header('Location: ' . 'home.php');
die();
?>