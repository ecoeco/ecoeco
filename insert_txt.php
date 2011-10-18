<?php
// Обновление поле тхт в catalog_product из адреса к фалу на текст из файла.
require 'config.php';
require 'functions.php';
require 'auth.php';

require 'templates/header.php';
//require 'templates/left_menu.php';
//require 'templates/right_menu.php';

$id=60;
while ($id++ < 61)
{
$result = mysql_query(sprintf('SELECT * FROM catalog_product WHERE id_product = %d', $id));
    $product = mysql_fetch_array($result);
$txt = file($product['txt']);
echo 'Описание:';
$n = count($txt); 
for ($i = 0; $i < $n; $i ++) { ?>
	<li>
		<?php echo $txt[$i + 0] ; ?>
	</li> <?php
}
$comma_separated = implode("\r\n", $txt);
$sql=sprintf("UPDATE catalog_product SET txt = '%s' WHERE id_product = %d", $comma_separated, $id);
		mysql_query($sql) or die("Invalid query: " . mysql_error());

}
//require 'templates/body.php';
require 'templates/footer.php';
