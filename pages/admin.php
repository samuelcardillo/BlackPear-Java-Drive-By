<?php 
	set_time_limit(500);
	// Protection
	if(!$mod_login->isLogged() OR !$mod_login->isAdmin($_SESSION['username'])) header('Location: '.$_SERVER['PHP_SELF'].'?p=home');
?>

<script language="javascript">
function actionToDo(chaine)
{		
		if (chaine == 'generateAction')
		{
			var generateText = document.getElementById("generateRunning");
			var generateForm = document.getElementById("generateForm");
			generateText.style.display = "block";
			generateForm.submit();
		}
}
</script>

<div align="center">
	<form id="generateForm" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?p=admin">
		<table  style="text-align: right;" cellspacing="30">
			<tr>
				<td style="text-align: right;">Generate a register key.</td>
				<td><input type="submit" id="generateRegister" value="Generate"/></td>
			</tr>
			<tr>
				<td style="text-align: right;">Generate a reseller key.</td>
				<td><input type="submit" id="generateReseller" value="Generate"/></td>
			</tr>
		</table>
	</form> 
</div>

<?php

if(isset($_POST['generateRegister']))
	{
		mysql_connect("localhost", "blackpear", "[CENSORED FOR GITHUB]");
		mysql_select_db("bp_gen");
	
	// Include the generator module
		include("module/module.php");
	
		// Generate the license key for the skids
		$license_key  = $mod_generate->genString(10)."-".$mod_generate->genString(8)."-".$mod_generate->genString(10);
		print "Registration key : ".$license_key;
			   
		mysql_query("INSERT INTO licensekey VALUES('','$license_key','0')");
		mysql_close();
	}
	
	if(isset($_POST['generateReseller']))
	{
	
		mysql_connect("localhost", "blackpear", "[CENSORED FOR GITHUB]");
		mysql_select_db("bp_gen");
	
	// Include the generator module
		include("module/module.php");

	// Generate the reseller license for the futur buisness man
		$resellerKey = $mod_generate->genString(8)."-".$mod_generate->genString(10)."-".$mod_generate->genString(5);
		print "Reseller license : ".$resellerKey;
		
		mysql_query("INSERT INTO resellerkey VALUES('','$resellerKey','0','Nothing')");
		mysql_close();
	}
?>