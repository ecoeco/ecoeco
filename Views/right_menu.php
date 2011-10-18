<div id="right_menu">
	<?php if (isset($_SESSION['auth']) && $_SESSION['auth']): ?>
		<div>
		<?php 
		$msg_hello = sprintf('Вы вошли как, %s!', $_SESSION['username']);
		echo sprintf('<span>%s</span>', $msg_hello);
		?></div>
		<form action="" method="post">
			<p>
				<input type="submit" name='logout' value="Exit" />
			</p>
		</form>
	<?php else : ?>
		<div id="login">Login</div>
		<form action="" method="post">
			<div><input type="text" name="username" /></div>
			<div><input type="password" name="password" /></div>
			<div><input type="submit" name="login" value="Enter" /></div>
		</form>
	<div id="registration">
	<a href="registration.php" >Registration</a>
	</div>	
	<?php endif; ?>
	<?php if (isset($_SESSION['auth']) && $_SESSION['activ'] === '2') : ?>
	    <form action="index.php" method="POST">
	        <p>
	            <input type="submit" name='AdminEnter' value="Admin" />
	        </p>
		</form>
	<?php endif;?>	
			<p>
				<a href="/pdf/tabl_door_closers.pdf" target="_blank">Таблица дверных доводчиков</a>
			</p>
	
</div>

