<title>ECO Schulte Registration</title>
<div id="reg">
<?php if (isset($_SESSION['username'])):?>

	<?$_SESSION['username'] = mysql_real_escape_string($_SESSION['username']) ?>
	<?= 'Вы уже зарегестрированы как <u>' . $_SESSION['username'] .'</u>' ?>

<?php else : ?>
	
		<h3>Registration</h3>
		<form action="" method="post">

			<p>Login</br><input type="text" name="username_reg" />
			<div id="check_user">
				<button
					type="submit" name="check_user" ><img src="img/check_user.png"  alt="Обновить"/>
				</button>
				Проверить пользователя.
				</br>
				<?php if(isset($reg['message'])) :?>
					<?= $reg['message'] ?>
				<?php endif?>
			</div>
			</p>
			<p>E-mail</br><input type="text" name="e_mail_reg" /></p>
			<p>Password</br><input type="password" name="password_reg" /></p>
			<p>Repeat password</br><input type="password" name="repeat_password_reg" /></p>
			<p><input type="submit" name="login_reg" value="Enter" /></p>

		</form>
	
<?php endif?>

</div>