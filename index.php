<?php
		 /*-------------/
	  /	 BLACKPEAR 	 / BLACKPEAR STUFF
	 /	 SECURITY	  / IS SERIOUS STUFF
	/=============*/
	
	session_start();
	
	// Include all modules
	require_once("module/module.php");
	
	// MySQL configuration
	mysql_connect("localhost", "blackpear", "[CENSORED FOR GITHUB]");
	mysql_select_db("bp_gen");
	
	// Create the template
	(!isset($_GET['template'])) ? $name = "default" : $name = $_GET['template'];
	$templateUsed = $mod_template->getTemplate($name);
	
	include($templateUsed['header']); // Include the header of the page
	
	// Including the needed page
		if(isset($_GET['p'])) $name = $_GET['p'].".php";
		(is_file("pages/".$name)) ? $toView = htmlspecialchars(addslashes($name)) : $toView = "home.php";
		include("pages/".$toView); // Include the needed page
	// End of verification and inclusion
	
	include($templateUsed['footer']); // Include the footer of the page
	
	mysql_close();
?>