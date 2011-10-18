<div id="left_menu">
    <ul id="nav">
		<li>
			<a href="index.php"><b>Home</b></a>
		</li>
	</ul>
	<ul id="nav2">
	<?php $i=1;
		$k=1;
		$n=1;  // $menu['group'][$i]['category'][$k]['product'][$n] ?>
		<? //var_dump($menu['group']); die;?>
		<? //var_dump($menu['group'][$i]['category'][$k]['product']); die;?>
	<?php foreach($menu['group'] as $group) : ?>
		<li>
			<a  href="index.php?gp=<?= $group['id_group']; ?>"><?= $group['name']; ?></a>
			<ul><? //var_dump($group['id_group']); die;?>
				<?php foreach($menu['group'][$i]['category'] as $category) : ?>
					<li>
						<a class="brd" href="index.php?cat=<?= $category['id_category']; ?> "><?= $category['name']; ?></a>
						<ul>
						<? //var_dump($category); die;?>
							<?php foreach($menu['group'][$i]['category'][$k]['product'] as $product) : ?>
								<li><? //var_dump($menu['group'][$i]['category'][$k]['product']); die;?>
									<a class="brd" href="index.php?id=<?= $product['id_product'] ?>"> <?= $product['name'] ?></a>
								</li>
								<?php $k++ ?>
							<?php endforeach; ?>
						</ul>
					</li>
					<?php $i++ ?>
				<?php endforeach; ?>
			</ul>
		</li>
		<?php //$i++ ?>
	<?php  endforeach; ?>
	</ul>
</div>