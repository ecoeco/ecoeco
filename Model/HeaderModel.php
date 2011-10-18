<?php

class HeaderModel
{
	public $_dataHeader;
	
	function checkQuote()
	{
		$_SESSION['username'] = mysql_real_escape_string ($_SESSION['username']) ;
		$result = mysql_query(sprintf('SELECT * 
			FROM  quote,quote_item 
			WHERE quote.id_quote=quote_item.id_quote
			AND quote.activ=\'1\'
			AND quote.customer_id=\'%s\'', $_SESSION['username']) )or die("Invalid query: " . mysql_error());
		$number = mysql_num_rows($result);
		$number = htmlspecialchars ($number);
		
		$total_sum = 0;
		while ($quote_item = mysql_fetch_array($result))
		{
			$total_sum = $quote_item['total'] + $total_sum;
		}
			
		$this->_dataHeader = array ('number' => "$number", 'total_sum' => "$total_sum");
		//$this->_dataCat['number']=$number;
		//$this->_dataCat['total_sum']=$total_sum
		return $this;
	}
	public function getData()
    {
        return $this->_dataHeader;
    }
	
	
}