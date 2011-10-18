<div>
<title> ECO Schulte <?php echo $product['name']; ?></title>


<?php
////////////////////////////////////////////
//										  //
//  Меню перехода но смежным продуктам	  //
// 					  					  //
////////////////////////////////////////////
?>
<div id="product_menu">
<ul>
	<?php if (!isset($category['group_id'])) : ?>
		<?php $category['group_id'] = 1 ;?>
	<?php endif;?>
	<?php $result_gp = mysql_query(sprintf('SELECT id_group, name FROM catalog_groups WHERE id_group = %d', $category['group_id'])) or die("Invalid query: " . mysql_error()); ?>
	<?php while ($gp = mysql_fetch_array($result_gp)): ?>
		<li>
			<a href="admin.php?edit_gp=<?php echo $gp['id_group'] = htmlspecialchars($gp['id_group']) ; ?>"><b><?php echo $gp['name'] = htmlspecialchars($gp['name']) ; ?>:</b></a>
		</li>
	<?php endwhile; ?>
	
	<?php $result_cat = mysql_query(sprintf('SELECT id_category, name FROM catalog_category WHERE group_id = %d', $category['group_id'])) or die("Invalid query: " . mysql_error()); ?>
	<?php while ($cat = mysql_fetch_array($result_cat)): ?>
		<li>
		<a style="border-bottom: 1px solid #ccc" href="admin.php?edit_cat=<?= $cat['id_category'] = htmlspecialchars($cat['id_category']) ;?>"><?= $cat['name']= htmlspecialchars($cat['name']) ;?></a> 
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
	<?php if (!isset($category['name'])) : ?>
		<?php $category['name'] = '<u>New category</u>' ;?>
	<?php endif;?>
    <p><b>ECO Schulte <?= $category['name'] ?> </b></p>
</div>
<?php
////////////////////////////////
//						  	  //
//  Добавление Категории	  //
// 					  	  	  //
////////////////////////////////
?>

<?php if (isset($_POST['AddCategory']) or isset ($_POST['AddCategoryNewCat'])) :?>
<form  name="InsertCategory" method="post" >
	<table border="0" > 	 	 	 	 	 	 	 	
		<tr>
			<td align="center">id_category</td>
			<td><textarea readonly name="AddCategoryId_category" cols="30" rows="1">Заполняется автоматически</textarea></td>
		</tr>
		<tr>
			<td align="center">group_id</td>
			<td>
				<select size= "1" name="AddCategoryNewCat">
					<option disabled selected value="0">Выберите категорию</option>
					
						<?php $result_gp = mysql_query('SELECT id_group, name FROM catalog_groups');
						while ($group = mysql_fetch_array($result_gp)):?>
						<?php 
						foreach($group as &$value) 
						{
							$value = htmlspecialchars ($value);
						}
						?>
					<option value="<?= $group['id_group']?>"><?= $group['name']?></option>
					<?php endwhile ?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="center">name</td>
			<td><textarea required name="AddCategoryName" cols="30" rows="2"></textarea></td>
		</tr>
		<tr>
			<td align="center">img</td>	
			<td><textarea name="AddCategoryImg" cols="30" rows="2"></textarea></td>
		</tr>
		<tr>
			<td align="center">description</td>
			<td><textarea  name="AddCategoryDescription" cols="30" rows="2"></textarea></td>
		</tr>
	</table> 
		 </br>
<form/>		
		<p><input type="submit" value="Добавить">	 
		 	
<?
//////////////////////////////////////////////////////////////
//													        //
//  Редактирование категорию: цена, характеристики, цвет...  //
// 					  									    //
//////////////////////////////////////////////////////////////
?>
<?php else : ?>
<form  name="UpdateCategory" method="post" >
<table border="0" > 	 	 	 	 	 	 	 	
		<tr>
			<td align="center">id_category</td>
			<td><textarea readonly name="id_category" cols="30" rows="1"><?= $category['id_category']; ?></textarea></td>
		</tr>
		<tr>
			<td align="center">group_id</td>
			<td><textarea name="group_id" cols="30" rows="2"><?= $category['group_id']; ?></textarea></td>
		</tr>
		<tr>
			<td align="center">name</td>
			<td><textarea name="name" cols="30" rows="2"><?= $category['name']; ?></textarea></td>
		</tr>
		<tr>
			<td align="center">img</td>	
			<td><textarea name="img" cols="30" rows="2"><?= $category['img']; ?></textarea></td>
		</tr>
		<tr>
			<td align="center">description</td>
			<td><textarea  name="description" cols="30" rows="2"><?= $category['description']; ?></textarea></td>
		</tr>
</table> 
		 </br>

<form/>
		
<p>	<input type="submit" value="Изменить">
	<input type="reset" value="Отменить изменения">
	<button
		type="submit" name="DelCategory" >Удалить Категорию
	</button>
</p>		 
		   
		   

 <?php endif ?>
</div>