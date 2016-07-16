<?php

class SiteController extends Controller {
    
	/*
	default action goes to home page
	*/
	public function actionIndex()
	{
		$this->gohome();
	}
	
	/*
		action home page
	*/
	
	public function actionHome() 
	{
	die('df');
	    $this->render('newhome');
	}
	
	
}
