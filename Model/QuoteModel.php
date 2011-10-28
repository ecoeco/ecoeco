<?php
class QuoteModel
{
    public $_dataQuote;
	
	//
	//Текущий продукт
	//
	
    public function load()
    {
		$_SESSION['username'] = mysql_real_escape_string ($_SESSION['username']) ;
		$result = mysql_query(sprintf("SELECT * 
			FROM  quote,quote_item 
			WHERE quote.id_quote = quote_item.id_quote
			AND quote.activ = 1
			AND quote.customer_id = '%s'", $_SESSION['username']) )or die("Invalid query: " . mysql_error());
		$number['number'] = mysql_num_rows($result);
		$this->_dataQuote = array();	
		//echo $number['number']; die;
		if ($number['number'] > 0)
		{	
			$this->_dataQuote = $this->_dataQuote + $number;
			$k = 1;
			$total_sum=0;
			do
			{	
				$row['quote_item'][$k] = mysql_fetch_array($result);
				foreach ($row['quote_item'] as $q) 
				{
					foreach ($q as &$quote) 
					{
						$quote = htmlspecialchars ($quote);
					}
				}
				$total_sum = $row['quote_item'][$k]['total'] + $total_sum;
				//
				//    Печать выбора RAL  
				//
				$result_ral = mysql_query(sprintf('SELECT img_ral FROM catalog_product WHERE id_product = %d', intval($row['quote_item'][$k]['id_product']))) or die("Invalid query: " . mysql_error());
				$ral=mysql_fetch_array($result_ral);
				$ral_quote= htmlentities ($ral['img_ral']);
					
				switch($ral_quote) 
				{ 
					case '5': 
						$row['quote_item'][$k]['ral']='<option selected value="Нерж. мат" >Нерж. мат</option>';
					break; 
					case '4':
						$row['quote_item'][$k]['ral']='<option value="Нерж. мат">Нерж. мат</option>
							<option value="Нерж. полиров.">Нерж. полиров.</option>';
					break; 
					case '3':
						$row['quote_item'][$k]['ral']='<option value="Белый RAL 9016">Белый RAL 9016</option>
							<option value="Серый RAL 9006">Серый RAL 9006</option>
							<option value="Коричневый RAL 8014">Коричневый RAL 8014</option>
							<option value="Нерж. мат">Нерж. мат</option>
							<option value="Нерж. полиров.">Нерж. полиров.</option>
							<option value="Черный RAL 9005">Черный RAL 9005</option>';
					break; 
					case '2':
						$row['quote_item'][$k]['ral']='<option value="Белый RAL 9016">Белый RAL 9016</option>
							<option value="Серый RAL 9006">Серый RAL 9006</option>
							<option value="Коричневый RAL 8014">Коричневый RAL 8014</option>
							<option value="Нерж. мат">Нерж. мат</option>
							<option value="Нерж. полиров.">Нерж. полиров.</option>
							<option value="Черный RAL 9005">Черный RAL 9005</option>';
					break; 
					case '1':
						$row['quote_item'][$k]['ral']='<option value="Белый RAL 9016">Белый RAL 9016</option>
							<option value="Серый RAL 9006">Серый RAL 9006</option>
							<option value="Коричневый RAL 8014">Коричневый RAL 8014</option>';
					break;
				}
				
				// Печать выбранного RAL в quote.php
				switch($row['quote_item'][$k]['color'])
				{
					case 'Белый RAL 9016':
						$row['quote_item'][$k]['print_ral_quote'] = '<p class="mat" style="background-color:#fff;height:18px;padding-top:2px;padding-left:2px;padding-right:2px;color:#000;border: 1px solid #000">Белый RAL 9016</p>';
					break;
					case 'Серый RAL 9006':
						$row['quote_item'][$k]['print_ral_quote'] = '<p class="mat" style="background-color:#b2b3b5">Серый RAL 9006</p>';
					break;
					case 'Коричневый RAL 8014':
						$row['quote_item'][$k]['print_ral_quote'] = '<p class="mat" style="background-color:#42290a">Корич. RAL 8014</p>';
					break;
					case 'Черный RAL 9005':
						$row['quote_item'][$k]['print_ral_quote'] = '<p class="mat" style="background-color:#000000">Черный RAL 9005</p>';
					break;
					case 'Нерж. мат':
						$row['quote_item'][$k]['print_ral_quote'] = '<p class="mat" style="background-color:#8b929a">Нерж. мат</p>';
					break;
					case 'Нерж. полиров.':
						$row['quote_item'][$k]['print_ral_quote'] = '<p class="mat" style="background-color:#8b929a">Нерж. полиров.</p>';
					break;
				}
				$k++ ;
			}	while ( $k<=$number['number']);
			$row['total_sum'] = $total_sum;
			$this->_dataQuote = $this->_dataQuote + $row;
			//var_dump($row['quote_item']); die;
			return $this;
		}
		else {
			$this->_dataQuote = $this->_dataQuote + $number;
			return $this;
		}
    }
	
	
	function processingUpdatesQuote () 
	{
		if(!isset($_SESSION['username']))
		{
			$_SESSION['msg'] = 'Вы не залогинены'; die;
		}
		if (isset($_POST['update_quote_item']))// обновление позиций в заказа (в quote_item)
		{ 
			foreach($_POST['item'] as $key_quote => $item) 
			{
				$key_quote = intval($key_quote);
				var_dump($item);
				$item["'color'"] = mysql_real_escape_string ($item["'color'"]);
				
				$item["'qty'"] = intval($item["'qty'"]);
				
					$sql=sprintf(
						"UPDATE quote_item
						SET color = '%s',
						qty = %d,
						total = qty*price
						WHERE id_quote_item = %d", $item["'color'"], $item["'qty'"], $key_quote);
					mysql_query($sql) or die("Invalid query: " . mysql_error());
			}
		}

		if(isset($_POST['del'])) // удаление позиции из заказа (в quote_item)
		{
			foreach($_POST['del'] as $key_del => $item) 
				{
					$key_del = intval($key_del);
					mysql_query(sprintf("DELETE FROM quote_item WHERE id_quote_item = %d", $key_del)) or die("Invalid query: " . mysql_error());
				}
			foreach($_POST['item'] as $key_quote => $item) 
			{
				$key_quote = intval($key_quote);
				$item["'color'"] = mysql_real_escape_string ($item["'color'"]);
				$item["'qty'"] = intval($item["'qty'"]);
				
					$sql=sprintf(
						"UPDATE quote_item
						SET color = '%s',
						qty = %d,
						total = qty*price
						WHERE id_quote_item = %d", $item["'color'"], $item["'qty'"], $key_quote);
					mysql_query($sql) or die("Invalid query: " . mysql_error());
			}	
		}
	
	}
	function acceptanceOfAnOrder()
	{
		switch($_SERVER['SERVER_NAME']) 
		{ 
		case 'localhost': 
			$dbname = 'test';
		break; 
		case 'ecoeco.elitno.net': 
			$dbname = 'ecoeco';
		break; 
		}
		
		foreach ($this->_dataQuote['quote_item'] as $quote)
			{
				$id_quote=$quote['id_quote'];
			
			}
		$d=date('Y-m-d');						// настроить $dbname
		$order_insert = mysql_query("INSERT INTO $dbname.order ( id_order, id_customer, id_quote )
						VALUES ('', '{$_SESSION['username']}', '{$id_quote}')") or die("Invalid query1: " . mysql_error());
		 
		$id_order = mysql_insert_id();

		$result_ = mysql_query(sprintf('SELECT * 
				FROM  quote,quote_item 
				WHERE quote.id_quote=quote_item.id_quote 
				AND quote.activ=\'1\'
				AND quote.customer_id=\'%s\'', $_SESSION['username']) )or die("Invalid query: " . mysql_error());
		while ($quote = mysql_fetch_array($result_))
		{
		
			foreach($quote as &$value) 
				{
					$value = htmlspecialchars ($value);
				}
			$insert_order_ite = mysql_query("INSERT INTO order_item (id_order, id_quote_item, id_product, data, product_name, price, color, qty, total)
						VALUES ('{$id_order}', '{$quote['id_quote_item']}', '{$quote['id_product']}', '{$d}', '{$quote['product_name']}', '{$quote['price']}', '{$quote['color']}', '{$quote['qty']}', '{$quote['total']}')")or die("Invalid query: " . mysql_error());
		} // TODO: templates/mail.php
			require 'templates/mail.php';
		$update_quote = mysql_query(sprintf("UPDATE quote SET activ = '0' WHERE customer_id = '%s' AND id_quote=%d", $_SESSION['username'], $id_quote)) or die("Invalid query: " . mysql_error());

		$update_quote_quote_item = mysql_query(sprintf("UPDATE quote_item SET date_order ='%s' WHERE id_quote=%d", $d, $id_quote)) or die("Invalid query: " . mysql_error());
	}
	public function getData()
    {
        return $this->_dataQuote;
    }
}