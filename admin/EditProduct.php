<form action="" method="get">
Выберите продукт:
<select size= "1" name="edit_id">
	<option disabled selected>Выберите продукт</option>
				
	<?php $result_gp = mysql_query('SELECT id_group, name FROM catalog_groups');
while ($group = mysql_fetch_array($result_gp)):?>
	<?php 
	foreach($group as &$value) 
		{
			$value = htmlspecialchars ($value);
		}
	?>
	<?php /* // TODO: Сделат выбор по группам
	<option disabled>------------------------------------------------------------</option>
	<option value="edit_gp=<?php echo $group['id_group']?>"><?php echo $group['name']; ?></option>
	<option disabled>------------------------------------------------------------</option>
	*/ ?>
	<?php $group['id_group'] = intval ($group['id_group']) ;?>
	<?php $result = mysql_query(sprintf('SELECT id_category, name FROM catalog_category WHERE group_id = %d', $group['id_group'])); ?>
		<?php while ($category = mysql_fetch_array($result)): ?>
		<?php 
			foreach($category as &$value) 
				{
					$value = htmlspecialchars ($value);
				}
			?>
<?php // TODO: Сделат выбор по категориям?>
	<option disabled> </option>		
	<option disabled><?php echo $category['name']; ?></option>
		<?php $category['id_category']= intval ($category['id_category']) ?>
		<?php $result_cat = mysql_query(sprintf('SELECT id_product, name, id_category FROM catalog_product WHERE id_category = %d', $category['id_category'])); ?>
		<?php while ($product = mysql_fetch_array($result_cat)): ?>
		<?php 
			foreach($product as &$value) 
				{
					$value = htmlspecialchars ($value);
				}
			?>
	
	<?
	//
	//Выбор продука
	//
	?>		
	<option value="<?php echo $product['id_product']?>"><?php echo $product['name'] ?></option>
			
		<?php endwhile; ?>
	<?php endwhile; ?>
<?php endwhile; ?>
</select>
<input type="submit" value="Выбрать" />
</form>
		
