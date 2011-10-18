<?php
//require_once 'Controllers/controller.php';

//$app = new Controller();
//$app->OpenFilesAdmin();
//require_once 'config.php';
//$app->setController('LogUsers');
//$app->run();

//require_once 'functions.php';
//require_once 'auth.php';
//require_once 'templates/header.php';
//require_once 'templates/left_menu.php';
//require_once 'templates/right_menu.php';
?>
<?php 
if (isset ($_SESSION['activ']) && ($_SESSION['activ']) != '2' )
	{
	
	?>
	<b><h3>You dont have permissions</h3></b>
	<p><a href="index.php">На главную</a></p>
	<?php 
	}
elseif (isset($_SESSION['auth']) && $_SESSION['activ'] === '2')
	{ ?>
	
    <form action="index.php" method="POST">
        <p>
            
            <input type="submit" name='browsing_history' value="Журнал посещений" />
			<input type="submit" name='mysql_status' value="MySQL Status" />
			<input type="submit" name='edit_product' value="Edit Product" />
			<input type="submit" name='edit_category' value="Edit Category" />
        </p>
	</form>
	
	
<?php }

elseif (!isset($_SESSION['auth']) )
{
	echo 'Вы не залогинены.';
	die;
}
else 
{
//header("Location: admin.php");
		die;
}
?>
<?php 
 /*
var_dump ($_POST);
echo '</br>' ;
echo '<-------------------------->' ;
echo '</br>' ;
var_dump ($_GET);*/
?>
	


