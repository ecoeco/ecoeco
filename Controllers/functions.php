<?php
function validate_alphanumeric_underscore($str)
{
	return preg_match('/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/',$str); //на логин
}
function validate_mail($str)
{
	return preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i",$str); //mail	
}

function login($username, $password = false, $remember = false)
{
	
    if (!validate_alphanumeric_underscore($username)) {
        $_SESSION['msg'] = 'Forbidden chars in login. Try again.';
        return false;
    }
	
    if (!$password) {
        $_SESSION['msg'] = 'Please, provide pass';
        return false;
    }
	//$user['activ'] = '';
	$_POST['username'] = mysql_real_escape_string ($_POST['username']);
	$result = mysql_query(sprintf('SELECT id_user, login, password, activ FROM users WHERE login = \'%s\'', $_POST['username']));
    
	$number = mysql_num_rows($result);
			if ($number == 0)
				{
				$_SESSION['msg'] = 'Такой пользователь не зарегистрирован.';
				return false;
				}
	$user = mysql_fetch_array($result);
		
			$user['id_user'] = htmlspecialchars ($user['id_user']);
			$user['login'] = htmlspecialchars ($user['login']);
			$user['password'] = htmlspecialchars ($user['password']);
			$user['activ'] = htmlspecialchars ($user['activ']);
		
	if (($user['login'] === $username) &&  ($user ['password'] === md5($password)) && ($user['activ'] === '0')){
		$_SESSION['msg'] = 'User is not yet active.';
		return false;
	}
	
	if (($user['login'] === $username) &&  ($user ['password'] === md5($password)) && (($user['activ'] === '1') or ($user['activ'] === '2'))){
	}
	elseif ($user ['password'] != md5($password))
		{
		$_SESSION['msg'] = 'Неправильный пароль.';
		return false;
	}
	else{
		return false;
	}
	
    $_SESSION['auth'] = true;
	setcookie('auth', ' ', time() + 3600 * 24 * 7);
	
    $_SESSION['username'] = $username;
	setcookie('username', $username, time() + 3600 * 24 * 7);
		
	$_SESSION['activ'] = $user['activ'];
	setcookie('activ', $user['activ'], time() + 3600 * 24 * 7);
    
	//$_SESSION['msg'] = sprintf('Hello, %s!', $username);
	session_regenerate_id();
    return true;
}


function print_session_msg()
{
    if (isset($_SESSION['msg'])) {
        echo sprintf('<span>%s</span>', $_SESSION['msg']);
		//<script>alert('1');</script>
    }
	
}

function logout()
{
	setcookie('username', '', time() -1);
	setcookie('activ', '', time() -1);
	setcookie('auth', '', time() -1);
    unset($_SESSION['auth']);
	unset($_SESSION['username']);
	unset($_SESSION['msg']);
	unset($_SESSION['activ']);
}

function edit_id ($id)
{
	if (!is_numeric($id)) {
		die;
	}
	$id = intval ($id);
	require_once 'admin/EditProduct.php'; 

	//
	// Обновление описание продукта 
	//
	if (isset($_POST['EditProductTxt'])) 
		{
			$item = mysql_real_escape_string ($_POST['EditProductTxt']);
			//$item = mysql_real_escape_string ($_POST['EditProductTxt']);
			$result = mysql_query(sprintf("UPDATE catalog_product SET txt = '%s' WHERE id_product = %d", $item, $id)) or die("Invalid query: " . mysql_error());
		}
	
	//
	// Обновление продукта 
	//
	
	if (isset($_POST['price'])) 
		{
			
			$_POST['id_category'] = intval ($_POST['id_category']);
			$_POST['name'] = mysql_real_escape_string ($_POST['name']);
			$_POST['price'] = intval ($_POST['price']);
			$_POST['img_big'] = mysql_real_escape_string ($_POST['img_big']);
			$_POST['img_small'] = mysql_real_escape_string ($_POST['img_small']);
			$_POST['img_small_cat'] = mysql_real_escape_string ($_POST['img_small_cat']);
			$_POST['img_cad'] = mysql_real_escape_string ($_POST['img_cad']);
			$_POST['img_ral'] = intval ($_POST['img_ral']);
			//$_POST['txt'] = mysql_real_escape_string ($_POST['txt']);
			$_POST['ma'] = mysql_real_escape_string ($_POST['ma']);
			$_POST['number_of_hits'] = intval ($_POST['number_of_hits']);
			
			$result = mysql_query(sprintf("UPDATE catalog_product 
								SET id_category = %d, name = '%s', price = %d, img_big = '%s', img_small = '%s', img_small_cat = '%s', img_cad = '%s', img_ral = %d,  ma = '%s', number_of_hits = %d
								WHERE id_product = %d", 
								$_POST['id_category'], $_POST['name'], $_POST['price'], $_POST['img_big'], $_POST['img_small'], $_POST['img_small_cat'], $_POST['img_cad'], $_POST['img_ral'], $_POST['ma'], $_POST['number_of_hits'], $id)) or die("Invalid query: " . mysql_error());
		}
	
    $result = mysql_query(sprintf('SELECT * FROM catalog_product WHERE id_product = %d', $id)) or die("Invalid query: " . mysql_error());
    if ($product = mysql_fetch_array($result)){
		foreach($product as &$product_) 
			{
				$product_ = htmlspecialchars ($product_);
			}
		
		if ($product) {
			require_once 'admin/EditorProduct.php';		
		}
	}
}
function edit_cat ($id)
{
	if (!is_numeric($id)) {
		die;
	}
	$id = intval ($id);
	require_once 'admin/EditCategory.php'; 
	
	//
	// Обновление описание категории 
	//
	if (isset($_POST['id_category']) && isset($_POST['group_id']) && isset($_POST['description']) && !isset($_POST['DelCategory'])) 
		{
			$id_category=intval($_POST['id_category']); 
			$group_id=intval($_POST['group_id']);
			$name=mysql_real_escape_string($_POST['name']);
			$img=mysql_real_escape_string($_POST['img']);
			$description=mysql_real_escape_string($_POST['description']);
			$result = mysql_query(sprintf("UPDATE catalog_category
				SET  group_id = %d, name= '%s', img= '%s', description = '%s'
				WHERE id_category = %d", $group_id, $name, $img, $description, $id_category)) or die("Invalid query: " . mysql_error());
		}
	
	//
	// Добовление категории
	//
	
	if (isset($_POST['AddCategoryNewCat'])) 
		{
			
			$AddCategoryNewCat = intval ($_POST['AddCategoryNewCat']);
			$AddCategoryName = mysql_real_escape_string ($_POST['AddCategoryName']);
			$AddCategoryImg = mysql_real_escape_string ($_POST['AddCategoryImg']);
			$AddCategoryDescription = mysql_real_escape_string ($_POST['AddCategoryDescription']);
			
			$sql = (sprintf("INSERT INTO catalog_category" . "(id_category, group_id, name, img, description)" .
					"VALUES ('', %d, '%s', '%s', '%s');", $AddCategoryNewCat, $AddCategoryName, $AddCategoryImg, $AddCategoryDescription));
			if($result = mysql_query($sql))
			{
				$_SESSION['msg'] = 'Добавленна новая категория ' . '"' . $AddCategoryName . '"';
			}
			else
			{
				die("Invalid query: " . mysql_error());
			}
		}
	
	//
	// Удаление категории 
	//
	if (isset($_POST['id_category']) && isset($_POST['group_id']) && isset($_POST['description']) && isset($_POST['DelCategory'])) 
		{
			$delCategory=mysql_real_escape_string($_POST['DelCategory']);
			$id_category=intval($_POST['id_category']); 
			$group_id=intval($_POST['group_id']);
			$name=mysql_real_escape_string($_POST['name']);
			$img=mysql_real_escape_string($_POST['img']);
			$description=mysql_real_escape_string($_POST['description']);
			
			$sql = (sprintf("DELETE FROM catalog_category
				WHERE `catalog_category`.`id_category` = %d", $id_category)) or die("Invalid query: " . mysql_error());
			if($result = mysql_query($sql))
			{
				$_SESSION['msg'] =  'Категория '. '"' . $name . '"' . ' удалена';
			}
			else
			{
				die("Invalid query: " . mysql_error());
			}
		}
	
    $result = mysql_query(sprintf('SELECT * FROM catalog_category WHERE id_category = %d', $id)) or die("Invalid query: " . mysql_error());
    if ($category = mysql_fetch_array($result)){
		foreach($category as &$key) 
			{
				$key = htmlspecialchars ($key);
			}
		
		if ($category) {
			require_once 'admin/EditorCategory.php';		
		}
	}
}

