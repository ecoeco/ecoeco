<?php
class HeaderView
{
	private $_header;

    function setHeader($header)
    {
        $this->_header = $header;
        return $this;
    }
	
    function getHeaderData()
    {
        return $this->_header
		->getData();
    }

    function renderHtml()
    {
		$header = $this->getHeaderData();
        include_once '/templates/Header/view.php';
		
    }
}

