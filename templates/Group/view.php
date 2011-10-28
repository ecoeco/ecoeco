<title>ECO Schulte Каталог <?= $group['title']['name']; ?></title>
<?php
//
// Смежные категории
//
?>

<div id="product_menu">
	<ul>
		<li>
			<a style="border-bottom: 1px solid #ccc" href="index.php"><b>Eco Schulte:</b></a> 
		</li>
			<?php foreach ($group['RelatedGroup'] as $gp): ?>
		<li>
			<a href="index.php?gp=<?= $gp['id_group'];?>"> <?= $gp['name'];?></a>
		</li>
			<?php endforeach; ?>
	</ul>
</div>
</br>
<div id="info_int" align="center"><b>ECO Schulte <?= $group['title']['name']; ?></b></div>
<?php
//
//Картинки продуктов в текущей категории
//
?>
	<div id="catalog_img">
		<?php foreach($group['foto'] as $product) : ?>
		<li>
			<a href="index.php?cat=<?= $product['id_category'];?>">
				<img src="<?= $product['img']; ?>" title="ECO Schulte <?= $product['name']; ?>" alt="<?= $product['name'] ?>" />					
			</a>
			</br>
			<a align="center" href="index.php?cat=<?= $product['id_category'] ; ?>"><?= $product['name']; ?></a>
		</li>
		<?php endforeach; ?>
	</div>