<?php
//
//  Создание заказа		  // auth_.php
//
class CreateQuoteModel
{
	
	function setProduct($product)
    {
        $this->_product = $product;
        return $this;
    }
	function getProductData()
    {
        return $this->_product
		->getData();
    }
	
		
	function addQuoteToDB()
	{	
		$product = $this->getProductData();
		//var_dump($_POST);
		$d = date('Y-m-d');
		$product['price'] = intval($product['price']);
		$_POST['qty'] = intval($_POST['qty']);
		$_SESSION['username'] = mysql_real_escape_string ($_SESSION['username']);
		$total = $product['price'] * $_POST['qty'];

		$product['id_product'] = intval($product['id_product']) ;
		$product['img_small_cat'] = mysql_real_escape_string ($product['img_small_cat']) ;
		$product['name'] = mysql_real_escape_string ($product['name']) ;
		$_POST['color'] = mysql_real_escape_string ($_POST['color']) ;

		$result_quote = mysql_query(sprintf("SELECT * FROM quote WHERE activ=1 AND customer_id = '%s'", $_SESSION['username']) )or die("Invalid query: " . mysql_error());
		$number = mysql_num_rows($result_quote);
		$number = htmlspecialchars ($number);
		if ($number >= 1) //кол-во активных квот = 1
		{
			$quote = mysql_fetch_array($result_quote);
			$id_quote = intval ($quote['id_quote']);
			$result_select_existence_product = mysql_query(sprintf('SELECT * FROM quote_item WHERE id_quote = %d AND id_product = %d AND color = \'%s\'', $id_quote, $product['id_product'], $_POST['color'])) or die("Invalid query: " . mysql_error());
			$number_existence_product = mysql_num_rows($result_select_existence_product);
			$number_existence_product = htmlspecialchars ($number_existence_product);
			if ($number_existence_product < 1 )
			{
				$result_insert_new_quote_item = mysql_query("INSERT INTO quote_item (id_quote, id_product, img, date, product_name, price, color, qty, total)
								VALUES ('{$id_quote}','{$product['id_product']}', '{$product['img_small_cat']}', '{$d}', '{$product['name']}', '{$product['price']}', '{$_POST['color']}', '{$_POST['qty']}', '{$total}')")or die("Invalid query: " . mysql_error());
			}
			elseif ($number_existence_product = 1)
			{
				while ($quote_item = mysql_fetch_array($result_select_existence_product))
				{
					$quote_item['id_quote_item'];
					$result_update_existence_product = mysql_query(sprintf( "UPDATE quote_item SET qty = qty+%d, total = qty*price	WHERE id_quote_item = %d", $_POST['qty'], $quote_item['id_quote_item'])) or die("Invalid query: " . mysql_error());
				}
			}
			else
			{

			}

		}

		elseif ($number < 1) // нет активных квот
		{
			$result = mysql_query("INSERT INTO quote ( customer_id, activ)
				VALUES ('{$_SESSION['username']}', '1')")or die("Invalid query: " . mysql_error());

			$id_quote = mysql_insert_id();
			$result = mysql_query("INSERT INTO quote_item (id_quote, id_product, img, date, product_name, price, color, qty, total)
						VALUES ('{$id_quote}','{$product['id_product']}', '{$product['img_small_cat']}', '{$d}', '{$product['name']}', '{$product['price']}', '{$_POST['color']}', '{$_POST['qty']}', '{$total}')")or die("Invalid query: " . mysql_error());

		}
		else
		{

		}
	}
}