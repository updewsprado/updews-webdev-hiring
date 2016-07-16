<?php

class UserController extends Controller {
    
	/*
	default action goes to home page
	*/
	public function actionIndex()
	{
		$this->gohome();
	}
	
	/*
		action register page
	*/
	
	public function actionRegister() 
	{
		if(isset($_SESSION['session_id']) && $_SERVER['REQUEST_METHOD'] == 'POST')
	    {
			$obj = new User();
			if(isset($_POST['txtfname']))
			{
				if (!filter_var($_POST['txtemail'], FILTER_VALIDATE_EMAIL) === false)
				{
					if($obj->setRegister($_POST))
						$this->render('register',array("isave"=>1,'message'=>'User Info successfully saved'));
					else
						$this->render('register',array("isave"=>1,'message'=>'Invalid: Server Error'));
				}
				else
					$this->render('register',array("isave"=>1,'message'=>'Invalid: Email'));
			}else
				$this->render('register',array("isave"=>1,'message'=>'Please fill up your name.'));
		}else
			$this->render('register');
	}
	
	
}
