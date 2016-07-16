<?php	
if(session_id() == '') //check if session is already started
    session_start();

$url = (isset($_GET['url']) ? $_GET['url'] : '');

define('DS', DIRECTORY_SEPARATOR); // separator
define('ROOT', dirname(dirname(__FILE__))); //root directory
define('BASE_FOLDER', 'Day1'); //change your desired directory web folder
define('BASE_HOST', 'http://'.$_SERVER['HTTP_HOST']); //change your desired folder
define ('DEVELOPMENT_ENVIRONMENT',true); //set true to display errors

require_once(ROOT . DS . BASE_FOLDER . DS .'config' . DS . 'db_config.php'); //include db_config.php
require_once (ROOT. DS . BASE_FOLDER . DS .'library' . DS . 'main.php'); // include main entrance to access views,models,controllers
