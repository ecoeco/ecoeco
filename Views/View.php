<?php

class View
{
    private $_view;

    function set($view)
    {
        $this->_view = $view;
        return $this;
    }
	
    function getViewData()
    {
        return $this->_view
		->getData();
    }
	function renderHtml()
    {
	}
}