<?php
class CategoryView extends View
{
	
    function renderHtml()
    {
		$cat = $category = $this->getViewData();
        include_once 'templates/Category/view.php';
		
    }
}

