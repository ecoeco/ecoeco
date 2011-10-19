<?php
if(!isset($_SESSION['username']))
{
	$_SESSION['msg'] = 'Вы не залогинены';
}
if (isset($_POST['update_quote_item']))// обновление позиций в заказа (в quote_item)
{ 
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
?>

<?php
// Начало страницы HTML


if (isset($_SESSION['username']))
{	
	$_SESSION['username'] = mysql_real_escape_string ($_SESSION['username']) ;
	$result = mysql_query(sprintf("SELECT * 
		FROM  quote,quote_item 
		WHERE quote.id_quote = quote_item.id_quote
		AND quote.activ = 1
		AND quote.customer_id = '%s'", $_SESSION['username']) )or die("Invalid query: " . mysql_error());
	$number = mysql_num_rows($result);
		if ($number <= 0)
			{?>
			<a  href="index.php" style="font-size: 18pt; font-family: Arial, sans-serif; color: #666">Корзина пуста</a>
			<?php
			
			}
			
			
	elseif($number > 0)
	{
    $result = mysql_query(sprintf('SELECT * 
		FROM  quote,quote_item 
		WHERE quote.id_quote=quote_item.id_quote 
		AND quote.activ=\'1\'
		AND quote.customer_id=\'%s\'', $_SESSION['username']) ) or die("Invalid query: " . mysql_error());
    //$id_quote=$quote_item['id_quote'];
	$i = 0; 
	$total_sum=0;
	?>
	<div id="quote">
	<form action="" method="post">
	
		<table >
			<tr align="center">
				
				<td>Продукт</td>
				<td>Дата</td>
				<td>Цвет</td>
				<td>Цена</td>
				<td>Колличество</td>
				<td>В заказе</td>
				<td>Сумма</td>
				<td>
					<div id="update_button">
						<button
							type="submit" name="update_quote_item" ><img src="img/refresh.png" alt="Обновить"/>
						</button>
					</div>
				</td>
			</tr>
			
			<?php
		while ($quote_item = mysql_fetch_array($result))
		{
		$id_quote=$quote_item['id_quote'];
			?>
			
			<tr >
				<?php  (++ $i) ; ?>
				<td><a  href="index.php?id=<?php echo $quote_item['id_product'] = htmlentities($quote_item['id_product']) ; ?>" 
							style="font-size: 10pt; font-family: Arial, sans-serif; color: #666">
					<img
					 title="<?php echo $quote_item['product_name'] = htmlentities ($quote_item['product_name']); ?>" alt="" src="<?php echo $quote_item['img'] ?>" border="0" />
					</a> 
					</br>
					<a  href="index.php?id=<?php echo $quote_item['id_product'] = htmlentities($quote_item['id_product']) ; ?>" 
							style="font-size: 10pt; font-family: Arial, sans-serif; color: #666">
							<?php echo $quote_item['product_name']; ?> </a>
				</td>
				<td><?php echo $quote_item['date']; ?> </td>
				
				<td> 
				<?php 
				$result_ral = mysql_query(sprintf('SELECT img_ral FROM catalog_product WHERE id_product = %d', $quote_item['id_product']) )or die("Invalid query: " . mysql_error());
				$ral=mysql_fetch_array($result_ral);
				$ral_quote= htmlentities ($ral['img_ral']);
				/////////////////////////////
				//    Печать выбора RAL    // 
				/////////////////////////////
				if($ral_quote == '5')
				{
				?>	
					<p><select size="1" name="item[<?php echo $quote_item['id_quote_item'] ; ?>]['color']">
						<option selected style="font-size: 10pt; font-family: Arial, sans-serif; color: #666" value="<?php echo $quote_item['color']; ?>"><?php echo $quote_item['color']; ?></option>
						<option selected value="Нерж. мат" >Нерж. мат</option>
					</select></p>
				<?php
				}

				elseif($ral_quote == '4')
				{
				?>
					<p><select size="1" name="item[<?php echo $quote_item['id_quote_item'] ; ?>]['color']">
						<option selected style="font-size: 10pt; font-family: Arial, sans-serif; color: #666" value="<?php echo $quote_item['color']; ?>"><?php echo $quote_item['color']; ?></option>
						<option value="Нерж. мат">Нерж. мат</option>
						<option value="Нерж. полиров.">Нерж. полиров.</option>
					</select></p>
				<?php
				}
				elseif($ral_quote == '3')
				{
				?>
					<p><select size="1" name="item[<?php echo $quote_item['id_quote_item'] ; ?>]['color']">
						<option selected style="font-size: 10pt; font-family: Arial, sans-serif; color: #666" value="<?php echo $quote_item['color']; ?>"><?php echo $quote_item['color']; ?></option>
						<option value="Белый RAL 9016">Белый RAL 9016</option>
						<option value="Серый RAL 9006">Серый RAL 9006</option>
						<option value="Коричневый RAL 8014">Коричневый RAL 8014</option>
						<option value="Нерж. мат">Нерж. мат</option>
						<option value="Нерж. полиров.">Нерж. полиров.</option>
						<option value="Черный RAL 9005">Черный RAL 9005</option>
					</select></p>
				<?php
				}
				elseif($ral_quote == '2')
				{
				?>
					<p><select size="1" name="item[<?php echo $quote_item['id_quote_item'] ; ?>]['color']">
						<option selected style="font-size: 10pt; font-family: Arial, sans-serif; color: #666" value="<?php echo $quote_item['color']; ?>"><?php echo $quote_item['color']; ?></option>
						<option value="Белый RAL 9016">Белый RAL 9016</option>
						<option value="Серый RAL 9006">Серый RAL 9006</option>
						<option value="Коричневый RAL 8014">Коричневый RAL 8014</option>
						<option value="Нерж. мат">Нерж. мат</option>
						<option value="Нерж. полиров.">Нерж. полиров.</option>
						<option value="Черный RAL 9005">Черный RAL 9005</option>
					</select></p>
								
					
					<?php
				}
				elseif($ral_quote == '1')
				{
				?>
					<p><select size="1" name="item[<?php echo $quote_item['id_quote_item'] ; ?>]['color']">
						<option selected style="font-size: 10pt; font-family: Arial, sans-serif; color: #666" value="<?php echo $quote_item['color']; ?>"><?php echo $quote_item['color']; ?></option>
						<option value="Белый RAL 9016">Белый RAL 9016</option>
						<option value="Серый RAL 9006">Серый RAL 9006</option>
						<option value="Коричневый RAL 8014">Коричневый RAL 8014</option>
					</select></p>
				<?php
				}
				?>
					
					

					
				</td>
			
				<td><?php echo $quote_item['price'] = htmlentities($quote_item['price']) . '  € ' ; ?> </td>
				<td>
					<p><input 
						type="number" 
						value="<?php echo $quote_item['qty']; ?>" size="12" name="item[<?php echo $quote_item['id_quote_item']; ?>]['qty']" min="0" max="1000" value="1" /></p>
				</td>
				
				<td>Кол-во: <?php echo $quote_item['qty']; ?> шт.
				</br>
				<div></div>
					<div id = "quote_ral">
					<ul >
					
					<?php 
					$color = $quote_item['color'];
					print_ral_quote ($color)?>
					
					</ul>
					</div>
				</td>
				<td><?php 
					echo $quote_item['total'] = htmlentities($quote_item['total']);
					echo ' € '; 
					$total_sum = $quote_item['total'] + $total_sum;
				?>
				</td>
				
				<?php
				//
				// Кнопка удаления позиции
				//
				?>
				<td>
					<div>
						<button
							type="submit" name="del[<?php echo $quote_item['id_quote_item']; ?>]" ><img src="img/del.gif" alt="Удалить позицию"/>
						</button>
					</div>
				</td>
			</tr>
			<?php
		}
		?>
		</table>
		 
				
			<div id="total_order">
			Ваш заказ на <?php echo $total_sum; ?> €.
			</div>
	 
		
		
	</form>
	<div id="buy_button">
		<form action="" method="post">
		<button
			type="submit" name="order_buy" ><img src="img/buy.jpg" />
		</button>
		</form>
	</div>
	</div>
	
	<?php 
	
	}
	
}

?>
<?php 
////////////////////////////////
//							  //
//      Принятие заказа       //
//							  //
////////////////////////////////
if (isset ($_POST['order_buy']))
{
$d=date('Y-m-d');						// настроить $dbname
	$order_insert = mysql_query("INSERT INTO $dbname.order ( id_customer, id_quote )
					VALUES ('{$_SESSION['username']}', '{$id_quote}')") or die("Invalid query: " . mysql_error());
	 
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
		}
		require 'templates/mail.php';
	$update_quote = mysql_query(sprintf("UPDATE quote SET activ = '0' WHERE customer_id = '%s' AND id_quote=%d", $_SESSION['username'], $id_quote)) or die("Invalid query: " . mysql_error());

	$update_quote_quote_item = mysql_query(sprintf("UPDATE quote_item SET date_order ='%s' WHERE id_quote=%d", $d, $id_quote)) or die("Invalid query: " . mysql_error());
	
	
}
?>
<?php //require 'templates/footer.php'; ?>