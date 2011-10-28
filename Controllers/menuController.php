<?php
class menuController
{
	
	public function showmenu()
	{
		//$menu = new MenuModel();
      //  $menu->load();
		
		$view = new MenuView();
        //$view->set($menu);
        $view->renderHtml();
	}
	
	
	
	
}