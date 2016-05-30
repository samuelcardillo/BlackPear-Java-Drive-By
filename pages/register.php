<?php if($mod_login->isLogged()) header('Location: '.$_SERVER['PHP_SELF'].'?p=connected'); ?>

<div align="center">
    BlackPear<br/>
	[Registration]<br/><br/>
	<?php
		if(!isset($_POST['registerKey']) || !isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['email']))
        {
			if(isset($_GET['OrderStatus']) == "P") 
				print '<span style="color: green;">Congratulation you are now a BlackPear customer. 
						Please, put your register key (sended to you when PayPro confirm de payment) below.</span>';
			?>
			<form method="POST" action="<?php print $_SERVER['PHP_SELF']; ?>?p=register">
				<table>
					<tr>
						<td>Username :</td>
						<td><input type="text" name="username" placeholder="Username..." required="required"/></td>
					</tr>
					<tr>
						<td>Password :</td>
						<td><input type="password" name="password" placeholder="Password..." required="required"/></td>
					</tr>
					<tr>
						<td>Email :</td>
						<td><input type="email" pattern="[^ @]*@[^ @]*" name="email" placeholder="email@provider.tld" required="required"/></td>
					</tr>
					<tr>
						<td>Register Key :</td>
						<td><input type="text" name="registerKey" placeholder="xxxx-xxxx-xxxx-xxxx" required="required"/></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="Register"/></td>
					</tr>
				</table>
			</form>
			<?php
		}
		else
		{
			if($mod_login->checkRegistration($_POST['username'],$_POST['registerKey']))
			{
				$username = htmlspecialchars(addslashes($_POST['username']));
				$password = htmlspecialchars(addslashes(md5($_POST['password'])));
				$email = htmlspecialchars(addslashes($_POST['email']));
				$registerKey = htmlspecialchars(addslashes($_POST['registerKey']));
				$licenseKey = $mod_generate->genString(10)."-".$mod_generate->genString(15)."-".$mod_generate->genString(15)."-".$mod_generate->genString(10);
				mysql_query("INSERT INTO bpcms_users VALUES('', '$username','$password','$email','$licenseKey','0','0','0','','0')");
				mysql_query("UPDATE licensekey SET isused='1' WHERE registerkey='$registerKey'");
				print '<span style="color: green;"/>You are now registered.<br/> Please note your license key :<br/><br/> <b style="color: red;">'.$licenseKey.'<br/><br/>(<i style="font-size: 18px;">VERY IMPORTANT</i>)</b>.<br/><br/> <a href="'.$_SERVER['PHP_SELF'].'?p=home">Continue</a>.</span>';
			}
			else
				print '<span style="color: red;"/>ERROR : Username or Registration Key are already used. <a href="'.$_SERVER['PHP_SELF'].'?p=register">Try again</a>.</span>';
		}
	?>
</div>