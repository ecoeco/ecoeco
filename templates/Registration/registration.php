<?php
if (isset($_SESSION['username']))
{	
	$_SESSION['username'] = mysql_real_escape_string($_SESSION['username']);
	echo 'Вы уже зарегестрированы как ' . $_SESSION['username'];
}
else {?>
	<div id="reg">
		<h3>Registration</h3>
		<form action="" method="post">

			<p>Login</br><input type="text" name="username_reg" />
			<div id="check_user">
				<button
					type="submit" name="check_user" ><img src="img/check_user.png"  alt="Обновить"/>
				</button>
				Проверить пользователя.
			</br>	
				<?php check_user () ?>
			</div>
			</p>
			<p>E-mail</br><input type="text" name="e_mail_reg" /></p>
			<p>Password</br><input type="password" name="password_reg" /></p>
			<p>Repeat password</br><input type="password" name="repeat_password_reg" /></p>
			<p><input type="submit" name="login_reg" value="Enter" /></p>

		</form>
	</div>
<?php }?>


<?php /*
function check_user ()
{
	if (isset($_POST['check_user']) && isset ($_POST['username_reg']))
	{ 
		$result_user = mysql_query(sprintf("SELECT id_user FROM users WHERE login = '%s'", $_POST['username_reg']));
		$number = mysql_num_rows($result_user);
		$number = htmlspecialchars ($number);
		$id_user = mysql_fetch_array($result_user);
		
		if($_POST['username_reg'] == '')
		{
		echo 'Введите имя';
		}
		elseif 	($number == 0)
		{
			echo 'Такой пользователь не зарегестрированн.';
		}
		elseif ($number >= 1)
		{
			echo 'Такой пользователь уже зарегестрированн.';
		}
		
	}
}		*/?>
</div>