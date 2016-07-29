<?php
/** Autoload for any classes that are required **/
function __autoload($className) {

	if (file_exists(ROOT . DS . 'classes' . DS . $className . '.php')) 
	{
		require_once(ROOT . DS . 'classes' . DS . $className . '.php');
	} 
}

