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