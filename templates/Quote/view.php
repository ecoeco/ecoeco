<?php if ($quote['number'] <= 0): ?>
	<a  href="index.php" style="font-size: 18pt; font-family: Arial, sans-serif; color: #666">Корзина пуста</a>
<?php elseif($quote['number'] > 0): ?>
	<div id="quote">
	<form action="" method="post">
		<table>
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
			<?php  foreach ($quote['quote_item'] as $quote_item):?>
				<tr >
					<?php  (++ $i) ; ?>
					<td><a  href="index.php?id=<?= $quote_item['id_product']; ?>" style="font-size: 10pt; font-family: Arial, sans-serif; color: #666">
							<img title="<?= $quote_item['product_name']; ?>" alt="" src="<?= $quote_item['img'] ?>" border="0" />
						</a> 
						</br>
						<a  href="index.php?id=<?= $quote_item['id_product']; ?>" style="font-size: 10pt; font-family: Arial, sans-serif; color: #666"><?= $quote_item['product_name']; ?> </a>
					</td>
					<td><?= $quote_item['date']; ?> </td>
					<td> 
						<p><select size="1" name="item[<?= $quote_item['id_quote_item']; ?>]['color']">
						<option selected style="font-size: 10pt; font-family: Arial, sans-serif; color: #666" value="<?= $quote_item['color']; ?>"><?= $quote_item['color']; ?></option>
						<?= $quote_item['ral']; ?>
						</select></p>
					</td>
					<td><?= $quote_item['price'] . '  € ' ; ?> </td>
					<td>
						<p><input type="number" value="<?= $quote_item['qty']; ?>" size="12" name="item[<?= $quote_item['id_quote_item']; ?>]['qty']" min="1" max="1000" value="1" /></p>
					</td>
					
					<td>Кол-во: <?= $quote_item['qty']; ?> шт.
						</br>
							<div id = "quote_ral">
								<ul>
									<li><?= $quote_item['print_ral_quote'] ?></li>
								</ul>
							</div>
					</td>
					<td><?= $quote_item['total'];?> € </td>
					
					<?php
					//
					// Кнопка удаления позиции
					//
					?>
					<td>
						<div>
							<button
								type="submit" name="del[<?= $quote_item['id_quote_item']; ?>]" ><img src="img/del.gif" alt="Удалить позицию"/>
							</button>
						</div>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
		<div id="total_order">
			Ваш заказ на <?= $quote['total_sum']; ?> €.
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
<?php endif ?>