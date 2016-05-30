<?php
	#################
	# INCLUSION PART
	
	// Default include module
		include("default/template.php");
		include("default/news.php");
		include("default/login.php");
		include("default/generate.php");
		include("default/jdb.php");
		include("default/security.php");
		
	##################
	# DECLARATION PART
	
	// Default declaration
		$mod_template 		= new Mod_Template();
		$mod_news 				= new Mod_News();
		$mod_login 				= new Mod_Login();
		$mod_generate			= new Mod_Generate();
		$mod_jdb					= new Mod_JavaDriveBy();
		$mod_security			= new Mod_Security();
?>