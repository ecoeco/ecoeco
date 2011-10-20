<?php
// подключается в \Model\QuoteModel.php  	function acceptanceOfAnOrder()
$img = '<a  href="http://ecoeco.elitno.net/" style="font-size: 10pt; font-family: Arial, sans-serif; color: #666"><img title="ECO-Schulte" alt="" src="http://ecoeco.elitno.net/img_small/eco-logo.png" border="0" /></a>';
$result_ = mysql_query(sprintf('SELECT * 
		FROM  quote,quote_item 
		WHERE quote.id_quote=quote_item.id_quote 
		AND quote.activ=\'1\'
		AND quote.customer_id=\'%s\'', $_SESSION['username']) )or die("Invalid query: " . mysql_error());
	$text_mas [] = '<html>'.'<head>'.'<title>Ваш заказ</title>'.$img.'</head>'.'<body>'.'<p>Ваш заказ на '.$d.'</p>'.
	'<table cols="5" border="1">'.'<tr bgcolor="#e0e0e0" align="center">'.'<td>Продукт</td>'.'<td width="70px">Цена</td>'.'<td>Цвет</td>'.'<td>Колличество </td>'.'<td> Сумма</td>'.'</tr>';
	$total=0;
	while ($quote = mysql_fetch_array($result_))
	{
		$product = '<a  href="http://ecoeco.elitno.net/index.php?id='.$quote['id_product'].'" style="font-size: 10pt; font-family: Arial, sans-serif; color: #666"><img title="'.$quote['product_name'].'" alt="" src="http://ecoeco.elitno.net/'.$quote['img'].'" border="0" /></a><br/></br/>
					<a  href="http://ecoeco.elitno.net/index.php?id='.$quote['id_product'].'" style="font-size: 10pt; font-family: Arial, sans-serif; color: #666">'.$quote['product_name'].'</a>';
		$total = $total + $quote['total'];
		$text_mas [] = '<tr>'.'<td align="center">'.$product.'</td>'.'<td align="center">  '. $quote['price'].' €  </td>'.'<td>'.$quote['color'].'</td>'.'<td align="center">'.$quote['qty'].'</td>'.'<td align="center">'.$quote['total'].'</td>'.'</tr>';
	}
	$text_mas [] = '<tr>'.'<td colspan="4" align="right"> Сумма заказа </td>'.'<td  align="center"><b>'. $total .' €</b></td>'.'</tr>';
	$text_mas [] = '</table>'.'</body>'.'</html>';
	
$mail = mysql_query(sprintf("SELECT * FROM users WHERE login='%s'", $_SESSION['username']) )or die("Invalid query: " . mysql_error());
	
while ($user_mail = mysql_fetch_array($mail))
{
$addr=$user_mail['mail'];
}

$theme = 'Ваш заказ принят';
$text = implode(" ", $text_mas);

/* Для отправки HTML-почты вы можете установить шапку Content-type. */
$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

if (isset($addr) && isset($theme) 
        && $addr != "" && $theme != "" ) {
			
    if (mail($addr, $theme, $text, $headers, "From: vadim_baron@mail.ru")) {
        echo '<h3>На Ваш E-mail: <u>' . $addr . '</u> отправлено cообщение </h3>';
    }
    else {
        echo '<h3>При отправке сообщения возникла ошибка</h3>';
    }
}