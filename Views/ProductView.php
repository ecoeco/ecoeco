<?php
class ProductView extends View
{
    

    function renderHtml()
    {
		$cat = $product = $this->getViewData();
        include_once 'templates/Product/view.php';
		
    }
}

