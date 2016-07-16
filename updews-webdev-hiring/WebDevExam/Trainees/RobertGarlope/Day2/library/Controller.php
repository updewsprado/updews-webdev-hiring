<?php

class Controller extends Database {

	protected $_model;
	protected $_controller;
	protected $_action;
	protected $_template;
	public $db;
	public $title = "Home Page";
	public $charset = "UTF-8";
	public $description = "example";
	public $keyword = "example";
	private $jsfile = array();
	private $js = array();
	private $cssfile = array();
	private $css = array();
	function __construct($model, $controller, $action) //initialized the controller
	{
		$this->_controller = $controller;
		$this->_action = $action;
		$this->_model = $model;
		$this->db = $this->dbConnect();
	}
	
	//initialized start outputted the views file
    private function renderFile($_file_,$vars=null)
	{
		ob_start();
		ob_implicit_flush(false);
		if (is_array($vars) && !empty($vars)) 
			extract($vars);
		if (file_exists(ROOT . DS . BASE_FOLDER . DS . 'views' . DS . $this->_model . DS . $_file_ . '.php'))
			require_once(ROOT . DS . BASE_FOLDER . DS . 'views' . DS . $this->_model . DS . $_file_ . '.php');
		else
			die('File not found at views' . DS . $this->_model . DS . $_file_ . '.php');
		return ob_get_clean();
	}
	
	// set and attach all the file js from the getJsFile function
	public function setJsFile()
	{
		if(count($this->jsfile))
		{
			foreach($this->jsfile as $file){
				echo '<script src="/'.$file.'"></script>'. PHP_EOL;
			}	
		}
	}
	
	// get all the js file 
	//@var $_file_ file
	public function getJsFile($_file_)
	{ 
		
		$this->jsfile[] = $_file_;
	}
	
	// set and attach all the js inline script from the getJsInline function
	public function setJsInline()  
	{
		
		if(count($this->js))
		{
			echo '<script type="text/javascript">jQuery(document).ready(function () {';
			foreach($this->js as $file){
				echo $file;
			}
			echo '});</script>'. PHP_EOL;
		}
	}
	
	// get all the js inline script
	//@var $_file_ file
	function getJsInline($_file_)
	{ 

		$this->js[] = $_file_;
	}
	
	// set and attach all the js file from the getCssFile function 
	public function setCssFile() 
	{
		if(count($this->cssfile))
		{
			foreach($this->cssfile as $file){
				echo '<link href="/'.$file.'" rel="stylesheet">'. PHP_EOL;
			}	
		}
	}
	
	
	// get all the css file
	//@var $_file_ file
	public function getCssFile($_file_)
	{ 
		$this->cssfile[] = $_file_;
	}
	
	// set and attach all the css inline script from the getCssInline function
	public function setCssInline()  
	{
		if(count($this->css))
		{
			echo '<style type="text/css">';
			foreach($this->css as $file){
				echo $file;
			}
			echo '</style>'. PHP_EOL;
		}
	}
	
	// get all the js inline script
	//@var $_file_ file
	public function getCssInline($_file_)
	{ 
		$this->css[] = $_file_;
	}
	
	//render the requested page
	//@var $_file_ file
	//@var $vars array
	public function render($_file_, $vars = null) 
	{
		$content = $this->renderFile($_file_,$vars);
		include_once (ROOT . DS . BASE_FOLDER . DS . 'views' . DS . 'layout' . DS . 'main.php');
	}
	
	public function pureText($_file_, $vars = null) 
	{
		include_once (ROOT . DS . BASE_FOLDER . DS . 'views' . DS . $this->_model . DS . $_file_ .'.php');
	}
    
	public function redirect($url)
    {
       header("Location: $url");
    }
	public function gohome()
    {
       header("Location: /".BASE_FOLDER);
    }
}
