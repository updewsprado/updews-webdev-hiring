<?php	
if(session_id() == '') //check if session is already started
    session_start();

$url = (isset($_GET['url']) ? $_GET['url'] : '/');

define('DS', DIRECTORY_SEPARATOR); // separator
define('ROOT', dirname(dirname(__FILE__))); //root directory
define('BASE_FOLDER', 'dyexample'); //change your desired folder
require_once(ROOT . DS . BASE_FOLDER . DS .'config' . DS . 'config.php'); //include db_config.php
require_once (ROOT. DS . BASE_FOLDER . DS .'library' . DS . 'main.php'); // include main entrance to access views,models,controllers
