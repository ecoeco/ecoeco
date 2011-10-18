<title>ECO Schulte</title>
<?php
//
//Картинки груп
//
?>
	<div id="catalog_img">
		<?php foreach($group['RelatedGroup'] as $product) : ?>
		<li>
			<a href="index.php?gp=<?php echo $product['id_group'];?>">
				<img src="<?= $product['img']; ?>" title="ECO Schulte <?= $product['name']; ?>" alt="<?= $product['name'] ?>" />					
			</a>
			</br>
			<a align="center" href="index.php?gp=<?= $product['id_group'] ; ?>"><?= $product['name']; ?></a>
		</li>
		<?php endforeach; ?>
	</div>