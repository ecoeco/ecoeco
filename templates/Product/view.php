<title>ECO Schulte <?= $product['name'] ?></title>
<?php
//
//  Меню перехода но смежным продуктам
// 	
?>
<div id="product_menu">
    <ul>
        <li>
			<a style="border-bottom: 1px solid #ccc" href="index.php?cat=<?= $cat['cat']['id_category']; ?>"><b><?= $cat['cat']['name']; ?>:</b></a>
        </li>
			<?php foreach ($cat['cat_product'] as $cat_product): ?>
        <li>
			<a href="index.php?id=<?= $cat_product['id_product']; ?>"><?= $cat_product['name']; ?> </a>
        </li>
			<?php endforeach; ?>
    </ul>
</div>
<div id="info_int">
    <p><b>ECO Schulte <?= $product['name']; ?> </b></p>
</div>
<?php
//
//  Описание продукта: цена, характеристики, цвет...
//
?>
<div id="product_img">
    <ul id="product_img_list">
        <li>
			<a class="single_image" href="<?=$product['img_big']; ?>" title="<?= $product['name']; ?>"> <img alt="" title="<?= $product['name']; ?>" src="<?= $product['img_small']; ?>" /> </a>
        </li>
        <li>
            <div id="product_img_price">
                <span>Цена: </span><span><?= $product['price']; ?> €</span>
            </div>
        </li>
        <li>
            <div id="product_img_ma">
            <?php if ($product['ma'] != '0'): ?>
                <a href="<?= $product['ma'] ;?>" target="_blank"><b>Монтажная инструкция <?= $product['name']; ?> </b> </a>
            <?php endif; ?>
            </div>
        </li>
        <?php
        //
        // Рисование цветов к продукту 
        //?>
		<li>
			<div id="leftcol">
				<div class ="twotextcols">
					<div>
					<?= $product['ral'] ?>
					</div>					
				</div>
			</div>
		</li>
       
        <form action="" method="post">
            <li>
                <div id="product_img_qty">
                    Выбирете колличество:<input type="number" min="1" max="100" size="13" name="qty" value="1" />
                </div>
            </li>
            <li>
                <div id="product_img_color">
                    Выбирете цвет:
                    <?= $product['select_color'] ?>
                    <input type="submit" name="quote" value="Купить" />
                </div>
            </li>
        </form>

    </ul>
</div>
<div id="description">
    <ul>
		<?= htmlspecialchars_decode($product['txt']);?>
    </ul>
    <div id="product_cad">
        <img title="Габаритные размеры <?= $cat['cat']['name'].' '.$product['name']; ?>" alt="" src="<?= $product['img_cad']; ?>" />
    </div>
</div>