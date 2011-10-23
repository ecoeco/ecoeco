<?php
class headerController
{

	public function showHeader()
	{
		switch($_SERVER['SERVER_NAME']) 
		{ 
		case 'localhost': 
			//$log = new LogModel();
			//$log->run();
		break; 
		case 'ecoeco.elitno.net':
			$log = new LogModel();
			$log->run();
		break; 
		}
		
		$header = new HeaderModel();
		if (isset ($_SESSION['username']))
		{
			$header->checkQuote();
		}
		
		$view = new HeaderView();
        $view->setHeader($header);
        $view->renderHtml();
	}
	
	
}