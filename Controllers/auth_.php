<?php 
$_POST['logout'] = isset($_POST['logout']) ? $_POST['logout'] : false;
$_POST['username'] = !empty($_POST['username']) ? $_POST['username'] : false;
$_POST['password'] = !empty($_POST['password']) ? $_POST['password'] : false;
$_POST['remember'] = !empty($_POST['remember']) ? $_POST['remember'] : false;

$_POST['login_reg'] = isset($_POST['login_reg']) ? $_POST['login_reg'] : false;
$_POST['username_reg'] = !empty($_POST['username_reg']) ? $_POST['username_reg'] : false;
$_POST['password_reg'] = !empty($_POST['password_reg']) ? $_POST['password_reg'] : false;
$_POST['repeat_password_reg'] = !empty($_POST['repeat_password_reg']) ? $_POST['repeat_password_reg'] : false;

session_start();
if (!isset($_SESSION['username']) && isset($_COOKIE['username'])){
	$_COOKIE['username'] = mysql_real_escape_string ($_COOKIE['username']);
	$_COOKIE['auth'] = mysql_real_escape_string ($_COOKIE['auth']);
	$_SESSION['username'] = $_COOKIE['username'];
	$_SESSION['auth'] = $_COOKIE['auth'];
}
	
if (!isset($_SESSION['activ']) && isset($_COOKIE['activ'])){
	$_COOKIE['auth'] = mysql_real_escape_string ($_COOKIE['auth']);
	$_SESSION['activ'] = $_COOKIE['activ'];
}
	
if (isset ($_POST['login'])) 
{	
	
	$_POST['username'] = mysql_real_escape_string ($_POST['username']);
	$_POST['password'] = mysql_real_escape_string ($_POST['password']);
	login($_POST['username'], $_POST['password']);
} elseif ($_POST['logout']) {
    
	logout();
}

if (isset($_POST['login_reg']) && isset ($_POST['username_reg']) && isset($_POST['e_mail_reg'])) {
$_POST['username_reg'] = mysql_real_escape_string ($_POST['username_reg']);
$_POST['e_mail_reg'] = mysql_real_escape_string ($_POST['e_mail_reg']);
$_POST['password_reg'] = mysql_real_escape_string ($_POST['password_reg']);
$_POST['repeat_password_reg'] = mysql_real_escape_string ($_POST['repeat_password_reg']);
    login_reg($_POST['username_reg'], $_POST['e_mail_reg'], $_POST['password_reg'], $_POST['repeat_password_reg']);
	/*echo $_POST['password_reg'];
	$result = mysql_query("INSERT INTO users (login, password)
    VALUES ('{$_POST['username_reg']}', '{$_POST['password_reg']}')")or die("Invalid query: " . mysql_error());*/
} elseif ($_POST['logout']) {
    logout();
}

	
	//
	//  Создание заказа	
	//
	if (isset ($_POST['quote']))
	{
		if (isset($_SESSION['username']) && isset ($_POST['color']) && $_POST['color'] != '0')
		{
			$id = intval ($_GET['id']);
			require_once '/Model/ProductModel.php';
			require_once '/Model/CreateQuoteModel.php';
			$product = new ProductModel();
			$product->load($id);
			$quote= new CreateQuoteModel();
			$quote->setProduct($product);
			$quote->addQuoteToDB();
		}
		
		if(!isset($_SESSION['username']))
		{
			$_SESSION['msg'] = 'Вы не зарегестрированны!';
		}
		
		elseif ($_POST['qty'] < '0')
		{
			$_SESSION['msg'] = 'Колличество < 0';
		}
		elseif (!isset ($_POST['color']))
		{
			$_SESSION['msg'] = 'Выбирете цвет';
		}
		elseif (isset ($_POST['color']) && $_POST['color'] == '0')
		{
			$_SESSION['msg'] = 'Выбирете цвет';
		}
		
		elseif (isset($_SESSION['username']) && isset ($_POST['color']) &&$_POST['color'] != '0')
		{
			$_SESSION['msg'] = 'Ваш заказ добавлен в корзину';
		}
		
		unset($_POST['quote']); // TODO: про бновлении страницы продукта обновляется заказ...
		
	}
//////////////////////////////////////////////////////

//////////////////////////////////////////////////////