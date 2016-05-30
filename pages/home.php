<?php if($mod_login->isLogged()) header('Location: '.$_SERVER['PHP_SELF'].'?p=connected'); ?>
<div align="center">
	BlackPear<br/>
	[Generator]<br/><br/>
	<?php
		if(isset($_POST['username']))
		{
			if($mod_login->checkInfos($_POST['username'],$_POST['password'])) // Check the validity of informations
			{
					$_SESSION['username'] = htmlspecialchars(addslashes($_POST['username']));
					
					header('Location: '.$_SERVER['PHP_SELF'].'?p=connected');
			}
			else
				print '<br/><span style="color: red;">Sorry but field are not correct.</span>';
		}
	?>
	<form method="POST" action="<?php print $_SERVER['PHP_SELF']; ?>">
		<table>
			<tr>
				<td>Username :</td>
				<td><input type="text" name="username"/></td>
			</tr>
			
			<tr>
				<td>Password :</td>
				<td><input type="password" name="password"/></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" value="Login"/> or <a style="color: white;" href="?p=register">Register</a></td>
			</tr>
		</table>
	</form>
</div>