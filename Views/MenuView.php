<?php
class MenuView extends View
{
	

    function renderHtml()
    {
		//$menu = $this->getMenuData();
		// $menu['group'][$i]['category'][$k]['product'][$n] 
		//var_dump ($menu['group']['3']); die;
        include_once 'templates/Menu/left.php';
		include_once 'templates/Menu/right.php';
    }
}