<?php
class QuoteView
{
    private $_quote;

    function setQuote($quote)
    {
        $this->_quote = $quote;
        return $this;
    }
	
    function getQuoteData()
    {
        return $this->_quote
		->getDataQuote();
    }

    function renderHtml()
    {
		$quote = $this->getQuoteData();
		$i = 0; 
        include_once '/templates/Quote/view.php';
		
    }
}

