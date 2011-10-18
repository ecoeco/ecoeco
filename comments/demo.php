<?php

// Error reporting:
error_reporting(E_ALL^E_NOTICE);

/*
/	Select all the comments and populate the $comments array with objects
*/

$comments = array();
$result = mysql_query("SELECT * FROM comments ORDER BY id ASC");

while($row = mysql_fetch_assoc($result))
{
	$comments[] = new Comment($row);
}

?>

<div id="main">

<?php

/*
/	Output the comments one by one:
*/

foreach($comments as $c){
	echo $c->markup();
}

?>

<div id="addCommentContainer">
	<p>Добавить комментарий</p>
	<form id="addCommentForm" method="post" action="">
    	<?php
		if (isset($_SESSION['username']))
		{
			
			$result = mysql_query(sprintf("SELECT login, mail
			FROM  users WHERE login = '%s'", $_SESSION['username']) )or die("Invalid query: " . mysql_error());
			while ($users = mysql_fetch_array($result))
			{
				foreach($users as &$value) 
					{
						$value = htmlspecialchars ($value);
					}
				?>
				<div>
				<label for="name">Имя</label>
				<input type="hidden" name="name" id="name" value="<?php echo $users['login'];?>"/>
				<label for="email">E-mail</label>
				<input type="hidden" name="email" id="email" value="<?php echo $users['mail'];?>"/>
					
			<?php	
			}?>
				<label for="url">Web-сайт</label>
				<input type="text" name="url" id="url" />
				
				<label for="body">Комментарий</label>
				<textarea name="body" id="comment_body" cols="20" rows="5"></textarea>
				<?php echo $_POST['submit'];?>
				<input type="submit" id="submit" value="Отправить" />
			</div>
		
		<?php
		}
		
		else
		{
		?>
			<div>
				<label for="name">Имя</label>
				<input type="text" name="name" id="name" />
				
				<label for="email">E-mail</label>
				<input type="text" name="email" id="email" />
				
				<label for="url">Web-сайт</label>
				<input type="text" name="url" id="url" />
				
				<label for="body">Комментарий</label>
				<textarea name="body" id="comment_body" cols="20" rows="5"></textarea>
				
				<input type="submit" id="submit" value="Отправить" />
			</div>
		<?php
		}
		?>
    </form>
</div>

</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="comments/script.js"></script>
