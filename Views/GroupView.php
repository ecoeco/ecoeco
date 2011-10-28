<?php
class GroupView extends View
{
	

    function renderHtml()
    {
		$group = $this->getViewData();
		if (isset($_GET['gp']))
		{
			include_once 'templates/Group/view.php';
		}
		else 
		{
			include_once 'templates/Group/viewImg.php';
		}
		
		
    }
}

