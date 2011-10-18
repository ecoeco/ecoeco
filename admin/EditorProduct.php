<div >
<title> ECO Schulte <?php echo $product['name']; ?></title>

<form action="" method="post">
	<p>
		<input type="submit" name='Editor_Product' value="Редактировать продукт" />
		<input type="submit" name='Editor_Description' value="Редактировать описание" />
	</p>
</form>

<?php
////////////////////////////////////////////
//										  //
//  Меню перехода но смежным продуктам	  //
// 					  					  //
////////////////////////////////////////////
?>
<div id="product_menu">
<ul>
	<?php $result_cat = mysql_query(sprintf('SELECT id_category, name FROM catalog_category WHERE id_category = %d', $product['id_category'])); ?>
	<?php while ($cat = mysql_fetch_array($result_cat)): ?>
		<li>
		<a style="border-bottom: 1px solid #ccc" href="admin.php?edit_cat=<?php echo $cat['id_category'] = htmlspecialchars($cat['id_category']) ;?>"><b><?php echo $cat['name']= htmlspecialchars($cat['name']) ;?>:</b></a> 
		</li>
	<?php endwhile; ?>

	<?php $result_product = mysql_query(sprintf('SELECT id_product, name, id_category FROM catalog_product WHERE id_category = %d', $product['id_category'])); ?>
	<?php while ($prod = mysql_fetch_array($result_product)): ?>
		<li>
			<a href="admin.php?edit_id=<?php echo $prod['id_product'] = htmlspecialchars($prod['id_product']) ; ?>"><?php echo $prod['name'] = htmlspecialchars($prod['name']) ; ?></a>
		</li>
	<?php endwhile; ?>
</ul>
</div>
<?php
////////////////////////////
//						  //
//  Заголовок продукта	  //
// 					  	  //
////////////////////////////
?>
<div id="info_int">
    <p><b>ECO Schulte <?= $product['name'] = htmlspecialchars($product['name']) ; ?> </b></p>
</div>
<?php
////////////////////////////////////////////////////////////
//													      //
//  Редактирование продукта: цена, характеристики, цвет...	  //
// 					  									  //
////////////////////////////////////////////////////////////
?>
<?php if (isset($_POST['Editor_Description'])or isset($_POST['EditProductTxt'])) :?>
	<div id="product_img">
	<form  method="post" >
		<textarea name="EditProductTxt" cols="50" rows="15"><?php echo $product['txt']; ?></textarea>
		<p><input type="submit" value="Обновить">
		   <input type="reset" value="Отменить изменения"></p>
	<form/>
	</div>

	<div id="description">
		<ul>	
			<?= htmlspecialchars_decode($product['txt']) ?>
		</ul>	
			<div id = "product_cad">
				
			</div>
	</div>
<?php else : ?> 
<form  name="UpdateProduct" method="post" >
<table border="0" > 	 	 	 	 	 	 	 	
		<tr>
			<td align="center">id_product</td>
			<td align="center">id_category</td>
			<td align="center">name</td>
			<td align="center">price</td>	
			<td align="center">txt</td>
			<td align="center">ma</td>	
			<td align="center">number of hits</td>
		</tr>
	
		<tr>
			<td><textarea readonly name="id_product" cols="7" rows="1"><?php echo $product['id_product']; ?></textarea></td>
			<td><textarea name="id_category" cols="7" rows="1"><?php echo $product['id_category']; ?></textarea></td>
			<td><textarea name="name" cols="20" rows="2"><?php echo $product['name']; ?></textarea></td>
			<td><textarea name="price" cols="5" rows="1"><?php echo $product['price']; ?></textarea></td>
			<td><textarea readonly name="" cols="20" rows="2"><?php echo $product['txt']; ?></textarea></td>
			<td><textarea name="ma" cols="20" rows="2"><?php echo $product['ma']; ?></textarea></td>
			<td><textarea name="number of hits" cols="7" rows="1"><?php echo $product['number_of_hits']; ?></textarea></td>
		</tr>
		 </table> 
		 </br>
<table border="0"> 		 
		<tr>
			
			<td align="center">img_big</td>
			<td align="center">img_small</td>	
			<td align="center">img_small_cat</td>
			<td align="center">img_cad</td>	
			<td align="center">img_ral</td>
			
		</tr>

		<tr>
			<td><textarea name="img_big" cols="20" rows="2"><?php echo $product['img_big']; ?></textarea></td>
			<td><textarea name="img_small" cols="20" rows="2"><?php echo $product['img_small']; ?></textarea></td>
			<td><textarea name="img_small_cat" cols="20" rows="2"><?php echo $product['img_small_cat']; ?></textarea></td>
			<td><textarea name="img_cad" cols="20" rows="2"><?php echo $product['img_cad']; ?></textarea></td>
			<td><textarea name="img_ral" cols="5" rows="1"><?php echo $product['img_ral']; ?></textarea></td>
		</tr>
</table> 	
<form/>		
		<p><input type="submit" value="Обновить">
		   <input type="reset" value="Отменить изменения"></p>		 
		   
		   

 <?php endif ?>
</div>