<?php $result = mysql_query('SHOW STATUS'); ?>
<table border="1">
	<tr>
		<td>Name</td>
		<td>Status</td>	
	</tr>
	<?php while ($row = mysql_fetch_assoc($result)): ?>
	<tr>
		<td> <?php echo $row['Variable_name'];?></td>
		<td> <?php echo $row['Value'] ;?></td>
	</tr>
	<?php endwhile?>
</table>