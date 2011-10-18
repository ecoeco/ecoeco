<div id="left_menu">
    <ul id="nav">
		<li>
			<a href="index.php"><b>Home</b></a>
		</li>
	</ul>
	<ul id="nav2">
	<?php $result_gp = mysql_query('SELECT id_group, name FROM catalog_groups');
	while ($group = mysql_fetch_array($result_gp)):?>
	<?php 
		foreach($group as &$value) 
			{
				$value = htmlspecialchars ($value);
			}
		?>
		<li>
			<a  href="index.php?gp=<?php echo $group['id_group']; ?>"><?php echo $group['name']; ?></a>
			<ul>
				<?php $group['id_group']= intval($group['id_group']);?>
				<?php $result = mysql_query(sprintf('SELECT id_category, name FROM catalog_category WHERE group_id = %d', $group['id_group'])); ?>
				<?php while ($category = mysql_fetch_array($result)): ?>
				<?php 
					foreach($category as &$value) 
						{
							$value = htmlspecialchars ($value);
						}
					?>
					<li>
						<a class="brd" href="index.php?cat=<?php echo $category['id_category']; ?> "><?php echo $category['name']; ?></a>
						<ul>
							<?php $category['id_category']= intval ($category['id_category']);?>
							<?php $result_cat = mysql_query(sprintf('SELECT id_product, name, id_category FROM catalog_product WHERE id_category = %d', $category['id_category'])); ?>
							<?php while ($product = mysql_fetch_array($result_cat)): ?>
								<?php 
								foreach($product as &$value) 
									{
										$value = htmlspecialchars ($value);
									}
								?>
								<li>
									<a class="brd" href="index.php?id=<?= $product['id_product'];?>"> <?= $product['name']; ?></a>
								</li>
							<?php endwhile; ?>
						</ul>
					</li>
				<?php endwhile; ?>
			</ul>
		</li>
	<?php endwhile; ?>
	</ul>
</div>