<?php
//require 'config.php';
//require 'functions.php';
//require 'auth.php';
//#################################################################



//#################################################################
//$d = date('Y-m-d');
//$_SESSION['username']= 'ecoeco';

$result_ = mysql_query(sprintf('SELECT * 
		FROM  quote,quote_item 
		WHERE quote.id_quote=quote_item.id_quote 
		AND quote.activ=\'1\'
		AND quote.customer_id=\'%s\'', $_SESSION['username']) )or die("Invalid query: " . mysql_error());
	$text_mas [] = '<html>'.'<head>'.'<title>Ваш заказ</title>'.'</head>'.'<body>'.'<p>Ваш заказ на '.$d.'</p>'.
	'<table>'.'<tr align="center">'.'<td>Продукт</td>'.'<td> Цена </td>'.'<td>Цвет</td>'.'<td>Колличество </td>'.'<td> Сумма</td>'.'</tr>';

	while ($quote = mysql_fetch_array($result_))
	{
	$text_mas [] = '<tr>'.'<td>'.$quote['product_name'].'</td>'.'<td align="center">'. $quote['price'].'€</td>'.'<td>'.$quote['color'].'</td>'.'<td align="center">'.$quote['qty'].'</td>'.'<td align="center">'.$quote['total'].'</td>'.'</tr>';
	}
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
        echo "<h3>Сообщение отправлено</h3>";
    }
    else {
        echo "<h3>При отправке сообщения возникла ошибка</h3>";
    }
}
?>