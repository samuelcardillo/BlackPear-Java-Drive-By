<?php
	mysql_connect("localhost", "blackpear", "[CENSORED FOR GITHUB]");
	mysql_select_db("bp_gen");
	
	// Include the generator module
		include("../module/module.php");
		
	if(isset($_GET['gen_key']) && $_GET['gen_key'] == "plimus-auth")
	{
		// Generate the license key for the skids
		$license_key  = $mod_generate->genString(10)."-".$mod_generate->genString(8)."-".$mod_generate->genString(10);
		print "Registration key : ".$license_key;
			   
		mysql_query("INSERT INTO licensekey VALUES('','$license_key','0')");
	}
	elseif(isset($_GET['upgrade_key']) && $_GET['upgrade_key'] == "reseller-auth")
	{
		// Generate the reseller license for the futur buisness man
		$resellerKey = $mod_generate->genString(8)."-".$mod_generate->genString(10)."-".$mod_generate->genString(5);
		print "Reseller license : ".$resellerKey;
		
		mysql_query("INSERT INTO resellerkey VALUES('','$resellerKey','0','Nothing')");
	}
?>