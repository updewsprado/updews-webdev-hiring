<?php




    /*
	Check if environment is development and display errors
	*/
	function setReporting() 
	{
		if (DEVELOPMENT_ENVIRONMENT == true) 
		{
			error_reporting(E_ALL);
			ini_set('display_errors','On');
		} 
		else 
		{
			error_reporting(E_ALL);
			ini_set('display_errors','Off');
			//ini_set('log_errors', 'On');
			//ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
		}
	}

	/* Check for Magic Quotes and remove them */

	function stripSlashesDeep($value) 
	{
		$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
		return $value;
	}

	function removeMagicQuotes() 
	{
		if ( get_magic_quotes_gpc() ) 
		{
			$_GET    = stripSlashesDeep($_GET   );
			$_POST   = stripSlashesDeep($_POST  );
			$_COOKIE = stripSlashesDeep($_COOKIE);
		}
	}

	/* Check register globals and remove them */

	function unregisterGlobals() 
	{
		if (ini_get('register_globals')) 
		{
			$array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
			foreach ($array as $value) 
			{
				foreach ($GLOBALS[$value] as $key => $var) 
				{
					if ($var === $GLOBALS[$key]) 
					{
						unset($GLOBALS[$key]);
					}
				}
			}
		}
	}

	

	function urlForHypen($u)
	{
		if(substr_count($u,'-'))
		{
			$splited = explode('-',$u);
			$cntrllname = '';
			foreach($splited as $val)
				$cntrllname = $cntrllname . ucwords($val);
			return $cntrllname;
		}
		return ucwords($u);
	}
    /* Main Call Function */
	function callMe() 
	{
		global $url; // get the values from the global variable $url index.php
		$urlArray = array();
		$paramArray = array();
		$controller="";
		$action="";
		$model="";
		$controllerName="";
	
		if($url !== '/')
		{
	
			$urlArray = explode("/",$url);
			array_shift($urlArray);
			if(count($urlArray))
			{	
				if(count($urlArray) < 2)
				{
					if(strstr($urlArray[0],'?'))
					{
						$urlArray = explode("?",$urlArray[0]);
						$controller = urlForHypen($urlArray[0]); // get the first element from the array	
					}else
						$controller = urlForHypen($urlArray[0]);
					$action = 'actionIndex';
					$actionName = 'Index';	
						
				}
				else
				{
					$controller = urlForHypen($urlArray[0]); // get the first element from the array
					array_shift($urlArray);// remove the first element from the array
					if(strstr($urlArray[0],'?'))
					{
						$urlArray = explode("?",$urlArray[0]);
						$action = urlForHypen($urlArray[0]); // get the first element from the array
					}else
					{
						$action = urlForHypen($urlArray[0]); // get the new first element from the array
						array_shift($urlArray);// remove the first element from the array
					}
						 
					$actionName = $action;
					$action = 'action'.$action;
				}
				$paramArray = $urlArray;
				$model= strtolower($controller);
				$controller .= 'Controller';
				$controllerName = $controller;

				if ((int)method_exists($controller, $action)) 
				{ //check if the action name method was existed
					$dispatch = new $controller($model,$controllerName,$action);
					if((int)method_exists($controller, 'behaviors'))
					{
						$rules = $dispatch->behaviors();
						if(count($rules['access']['rules']))
						{
							$is_allowed = false;
							$allow_guest_actions = array();
							$allow_logged_actions = array();
							$allow_admin = array();
							$not_allow_actions = array();
							foreach($rules['access']['rules'] as $val)
							{
								if($val['allow'])  //page allowed to be viewed
								{
									if(in_array('?',$val['roles'])) // allow as guest user
									{
										foreach($val['actions'] as $list_action)
											$allow_guest_actions[] = $list_action;
									}
									else if(in_array('@',$val['roles'])) // allow as logged user
									{
										foreach($val['actions'] as $list_action)
											$allow_logged_actions[] = $list_action;
									}
									else if(in_array('admin',$val['roles'])) // allow as logged user
									{
										foreach($val['actions'] as $list_action)
											$allow_admin[] = $list_action;
									}	
								}
								else  //page not allowed to be viewed
								{
									foreach($val['actions'] as $list_action)
											$not_allow_actions[] = $list_action;
								}
							}
								
						}
						$guest = new User();
					
						if(in_array(strtolower($actionName),$allow_logged_actions) && !$guest->loggedin()) //user must be logged
						{
							$_SESSION['cur_url'] = $_SERVER['REQUEST_URI'];
							$dispatch->redirect('/user/login');
						}
						
						if(in_array(strtolower($actionName),$allow_admin) && (!$guest->loggedin() || $guest->loggedin()) && $guest->loggedin_permission() != 1) //page that admin users allowed
						{
							page403();
						}
							
						if(in_array(strtolower($actionName),$not_allow_actions)) //user must be logged
						{
							page404();
						}
					}
					call_user_func_array(array($dispatch,$action),$paramArray);
				}else 
				{
					page404();
				}
			}else{
				$model = 'site';$controllerName='';$action='';
				$cntroler = new SiteController($model,$controllerName,$action);
				$cntroler->render('home');
			}
		}
		else
		{
			$model = 'site';$controllerName='';$action='';
			$cntroler = new SiteController($model,$controllerName,$action);
			$cntroler->render('home');
		}
			
	}

	function page404()
	{
		/*Generation 404 Code */
		header("HTTP/1.0 404 Not Found");
		//$model = 'notfound';$controllerName='';$action='';
		//$cntroler = new SiteController($model,$controllerName,$action);
		$cntroler = new SiteController('notfound','','');
		$cntroler->render('notfound');
		die();
	}

	function page403()
	{
		/*Generation 404 Code */
		header("HTTP/1.0 404 Not Found");
		$cntroler = new Controller('notfound','DefaultController','');
		$cntroler->render('notallow');
		die();
	}

	/** Autoload any classes that are required **/

	function __autoload($className) {

		if (file_exists(ROOT . DS . BASE_FOLDER . DS . 'library' . DS . $className . '.php')) 
		{
			require_once(ROOT . DS . BASE_FOLDER . DS . 'library' . DS . $className . '.php');
		} 
		else if (file_exists(ROOT . DS . BASE_FOLDER . DS . 'controllers' . DS . $className . '.php')) 
		{
			require_once(ROOT . DS . BASE_FOLDER . DS . 'controllers' . DS . $className . '.php');
		} 
		else if (file_exists(ROOT . DS . BASE_FOLDER . DS . 'models' . DS . $className . '.php')) 
		{
			require_once(ROOT . DS . BASE_FOLDER . DS . 'models' . DS . $className . '.php');
		} 
	}


setReporting();
removeMagicQuotes();
unregisterGlobals();
callMe();
