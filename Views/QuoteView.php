<?php
class QuoteView extends View
{
    

    function renderHtml()
    {
		$quote = $this->getViewData();
		$i = 0; 
        include_once 'templates/Quote/view.php';
		
    }
}

