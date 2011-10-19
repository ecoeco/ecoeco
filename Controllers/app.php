<?php
class App
{
	function __construct ()
	{
	}
	
	function bootstrap()
	{
		require_once 'Model/ConnectionDBModel.php';
		require_once 'functions.php';
		require_once 'auth_.php';
		$header = new headerController;
		$header->showheader();
		$menu = new menuController;
		$menu->showmenu();
		echo '<div id="body">';
			$body = new bodyController;
			$body->showBody();
		echo '</div>';
		require_once 'templates/Footer/view.php';
	}
	function OpenFilesAdmin()
	{
		$this->loadFiles('Module');
		$this->loadFiles('Controllers');
		$this->loadFiles('admin');
	}
	public function setController($controller = '')
	{
		if(class_exists($controller))
		{
			$this->activeController = $controller;
		} 
		else 
		{
			print 'Controller doesnt exist!';
		}
	}
	public function run()
	{
		$controllerInstance = new $this->activeController();
		$controllerInstance->run();
	}
	
	private function loadFiles($name){
		if(is_file($name)){
		  require_once $name;
		  return;
		} 
		if(is_dir($name)){
		  if ($handle = opendir($name)){
		  	while (false !== ($file = readdir($handle))) {
		  	  if($file != '..' && $file != '.'){
		  	    $this->loadFiles($name.'/'.$file);
		  	  }
		  	}
		  	closedir($handle);
		  }
		}
	}
}


