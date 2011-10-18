<title>ECO Schulte <?= $category['title']['name']; ?></title>
<?php
//
// Смежные категории
//
?>
<div id="product_menu">
	<ul>
		<li>
			<a style="border-bottom: 1px solid #ccc" href="index.php?gp=<?php echo $cat['group']['id_group'];?>"><b><?= $cat['group']['name'];?>:</b></a> 
		</li>
			<?php foreach ($cat['cat'] as $cat): ?>
		<li>
			<a href="index.php?cat=<?= $cat['id_category'];?>"> <?= $cat['name'];?></a>
		</li>
			<?php endforeach; ?>
	</ul>
</div>
</br>
<div id="info_int" align="center"><b>ECO Schulte <?php echo $category['title']['name']; ?></b></div>
<?php
//
//Картинки продуктов в текущей категории
//
?>
	<div id="catalog_img">
		<?php foreach($category['product'] as $product) : ?>
		<li>
			<a href="index.php?id=<?php echo $product['id_product'];?>">
				<img src="<?= $product['img_small_cat']; ?>" title="ECO Schulte <?= $product['name']; ?>" alt="<?= $product['name'] ?>" />					
			</a>
			</br>
			<a align="center" href="index.php?id=<?= $product['id_product'] ; ?>"><?= $product['name']; ?></a>
		</li>
		<?php endforeach; ?>
			
	</div>
<?php
//
//Галерея больших картинок текущей групы
//
?>
<div id="gallery">
	<p>
		<a class="group"  rel="group1" href="img/eco_logo.png" title="ECO Schulte">Галерея:</a>
		<?php foreach($category['product'] as $product): ?>
			<a class="group" rel="group1" href="<?= $product['img_big']; ?>" title="<?= $product['name']; ?>"></a>
		<?php endforeach; ?>
	</p>
</div>