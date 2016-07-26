<?php
define('DS', DIRECTORY_SEPARATOR); // separator
define('ROOT', dirname(__FILE__)); //root directory
require_once(ROOT . DS . 'config' . DS . 'config.php'); //config for db
require_once(ROOT . DS . 'classes' . DS . 'autoload.php'); //autoload the file name to be used

$isave = 0;
if(isset($_POST['cases'])) //check if cases is set
{
	$case = $_POST['cases'];
	$obj = new Model();
	
	switch($case)
	{
		case 1: //ajax request random quotes
			echo json_encode($obj->getQuotes());
		break;
		case 2: //ajax request accel selected by node
			$id = $_POST['id'];
			echo json_encode($obj->getSelectedNode($id));
		break;
	}
}
?>