	<?php
		$result_number = mysql_query("SELECT * FROM log ") or die ("Invalid query: " . mysql_error());
		$number = mysql_num_rows($result_number);
		$number = htmlspecialchars ($number);?>
		
	<?php if (isset($_GET['log_list']) && $_GET['log_list']>1) :?>
		<?php 
		$num_rows = 30;
		$num_limit = ($_GET['log_list']-1)*$num_rows;
		$n = 1;
		?>
	<?php else :?>
		<?php 
		$n = 1;
		$num_limit = 0;
		$num_rows = 30;		?>
	<?php endif?>
	<div id="table_log">
		<h1>Журнал посещений</h1>	
	
		<form action="" method="get">
				Выберите страницу:
				<select size= "1" name="log_list">
				<?php $_GET['log_list'] = isset($_GET['log_list']) ? $_GET['log_list'] : 1;?>
				<option disabled selected><?=$_GET['log_list']?></option>
			<? while($n <= ($number/30)+1) : ?>
				<option><?=$n++?></option>
			<?php endwhile?>
			<input type="submit" value="Выбрать" />
		</form>
		<br/>
		
	<table cols="31" border="1">
	<tr bgcolor="#e0e0e0" align="center">
		<td>№</td>
		<td>User</td>
		<td>Дата</td>
		<td>Время</td>
		<td>Внешний IP</td>
		<td>Откуда</td>
		<td>Куда</td>
		<td>Браузер</td>
		<td>Локальный IP</td>
	</tr>
		<?php
		$result = mysql_query(sprintf("SELECT * FROM log LIMIT %d, %d", $num_limit, $num_rows )) or die ("Invalid query: " . mysql_error());
		$numFields = mysql_num_fields ($result);
		
		?><?php $k=1 ?>
		<?while ($row_log = mysql_fetch_array($result)) :?>
			<? foreach($row_log as &$value) 
				{
					$value = htmlspecialchars ($value);
				}?>
				
				<?php if ($k%2)  : ?>
					<tr >
				<?php else: ?>
					<tr bgcolor="#f5f5f6">
				
				<?php endif ?>
				<?$k++?>
				<?php $i=0 ; ?>
				<?php  while ($i <= ($numFields-1)) : ?>
						
						
						
						<td><?php echo "$row_log[$i]"; $i++ ?></td>
				<?php endwhile ?>
			</tr>
		<?php endwhile ?>
		
	</table>
	</div>
	