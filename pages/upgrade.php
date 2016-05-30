<?php 
	set_time_limit(500);
	// Protection
	if(!$mod_login->isLogged() OR $mod_login->isReseller($_SESSION['username'])) header('Location: '.$_SERVER['PHP_SELF'].'?p=home'); 
?>

<div align="center">
<?php
	if(!isset($_POST['upgradeKey']) OR empty($_POST['upgradeKey']))
	{
?>
	<h2><u>Need to resell Java Drive-By ?</u></h2>
	For only <b>15$</b> per month you are agree to resell Java Drive-By and control them easily. <br/>
	With the <b>reseller license</b> you just need to wait 2 minute between generations !<hr/>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?p=upgrade">
	<table>
		<tr>
			<td>Reseller key :</td>
			<td><input type="text" name="upgradeKey"/></td>
			<td><input type="submit" value="Upgrade"/></td>
		</tr>
	</form>
		<tr>
			<td></td>
			<td style="text-align: center;">OR</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td style="text-align: center;"><a style="text-decoration: none;" href="https://secure.payproglobal.com/orderpage.aspx?products=63092" target="a_blank"><button>Buy reseller license</button></a></td>
			<td></td>
		</tr>
	</table>
<?php
	}
	else
	{
		$upgradeKey = htmlspecialchars(addslashes($_POST['upgradeKey']));
		
		$upgradeQuery = mysql_query("SELECT * FROM resellerKey WHERE resellerKey='$upgradeKey'");
		$upgradeResult = mysql_fetch_assoc($upgradeQuery);
		$upgradeUsername = $_SESSION['username'];
		$subscriptionDate = date('m-d');
		if($upgradeResult['resellerKey'] != null && $upgradeResult['resellerKey'] == $upgradeKey && $upgradeResult['isUsed'] == '0')
		{
			// Update the key
			mysql_query("UPDATE resellerkey SET isUsed='1',byUser='$upgradeUsername' WHERE resellerKey='$upgradeKey'");
			
			// Update the user
			mysql_query("UPDATE bpcms_users SET isReseller='1',subscriptionDate='$subscriptionDate' WHERE Username='$upgradeUsername'");
			
			print '<span style="color: green;">Congratulations, you are now a reseller !</span>';
		}
		else
			die('<span style="color: red;">Sorry but the reseller license do not exist or it\'s already used.</span>');
	}
?>
</div>