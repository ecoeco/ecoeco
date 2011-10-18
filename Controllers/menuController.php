<?php
class menuController
{
	
	public function showmenu()
	{
		$menu = new MenuModel();
        $menu->load();
		
		$view = new MenuView();
        $view->setMenu($menu);
        $view->renderHtml();
	}
	
	
	
	
}