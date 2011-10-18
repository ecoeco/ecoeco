<form action="" method="get">
Выберите продукт:
<select size= "1" name="edit_cat">
	<option disabled selected>Выберите категорию</option>
				
	<?php $result_gp = mysql_query('SELECT id_group, name FROM catalog_groups');
while ($group = mysql_fetch_array($result_gp)):?>
	<?php 
	foreach($group as &$value) 
		{
			$value = htmlspecialchars ($value);
		}
	?>

	<option disabled></option>
	<option disabled><?php echo $group['name']; ?></option>
	

	<?php $group['id_group'] = intval ($group['id_group']) ;?>
	<?php $result = mysql_query(sprintf('SELECT id_category, name FROM catalog_category WHERE group_id = %d', $group['id_group'])); ?>
		<?php while ($category = mysql_fetch_array($result)): ?>
		<?php 
			foreach($category as &$value) 
				{
					$value = htmlspecialchars ($value);
				}
			?>
	<option value="<?= $category['id_category']?>"><?php echo $category['name']; ?></option>
	<?php endwhile; ?>
<?php endwhile; ?>
</select>
<input type="submit" value="Выбрать" />
</form>

<form action="index.php" method="post">
	<p>
		<input type="submit" name='EditorCategory' value="Редактировать категорию" />
		<input type="submit" name='AddCategory' value="Добавить категорию" />
	</p>
</form>
