<?php
class HeaderView extends View
{
	

    function renderHtml()
    {
		$header = $this->getViewData();
        include_once 'templates/Header/view.php';
		
    }
}

