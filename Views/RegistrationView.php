<?php
class RegistrationView extends View
{
    

    function renderHtml()
    {
		$reg = $this->getViewData();
		
        include_once 'templates/Registration/view.php';
		
    }
}

