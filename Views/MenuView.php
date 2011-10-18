<?php
class MenuView
{
	private $_Menu;

    function setMenu($menu)
    {
	$this->_menu = $menu;
        return $this;
    }
	
    function getMenuData()
    {
        return $this->_menu
		->getData();
    }

    function renderHtml()
    {
		$menu = $this->getMenuData();
		// $menu['group'][$i]['category'][$k]['product'][$n] 
		//var_dump ($menu['group']['3']); die;
        include_once '/templates/Menu/left.php';
		
    }
}