<?php 
	set_time_limit(500);
	// Protection
	if(!$mod_login->isLogged() OR $mod_login->isReseller($_SESSION['username'])) header('Location: '.$_SERVER['PHP_SELF'].'?p=home'); 
?>

<div align="center">
	<table cellspacing="5">
	<tr style="background-color: grey;">
		<th>Creation date</th>
		<th>Last use</th>
		<th>Total use</th>
		<th>Infected</th>
		<th>Not infected</th>
	</tr>
	<?php
		$username = $_SESSION['username'];
		$jdbRequest = mysql_query("SELECT * FROM jdb_serials WHERE creator='$username'");
		while($jdbResult = mysql_fetch_assoc($jdbRequest)):
		?>
		<tr style="background-color: #303030">
			<td><?php ($jdbResult['creationDate'] != null) ? print $jdbResult['creationDate'] : print "N/A"; ?></td>
			<td><?php print $jdbResult['lastTime']; ?></td>
			<td><?php print $jdbResult['totalConn']; ?></td>
			<td><?php print $jdbResult['infected']; ?></td>
			<td><?php print $jdbResult['notInfected']; ?></td>
		</tr>
		<?php
		endwhile;
	?>
	</table>
</div>