<?php

class SiteController extends Controller {
    
	
	/*
		action home page
	*/
	
	public function actionHome() 
	{
	    $this->render('home');
	}
	
	/*
		action about us page
	*/
	
	public function actionAbout() 
	{
	    $this->render('about');
	}
	
	/*
		action find us page
	*/
	
	public function actionFindus() 
	{
	    $this->render('findus');
	}
	
	/*
		action find us page
	*/
	
	public function actionQuote() 
	{
	   $obj = new Site();
	   $var = $obj->getQuotes();
	   echo json_encode($var);
	}
	
	/*
		action find us page
	*/
	
	public function actionGraph() 
	{
	    $this->render('graph');
	}
}
