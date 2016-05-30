<?php 
	// Protection
	if(!$mod_login->isLogged()) header('Location: '.$_SERVER['PHP_SELF'].'?p=home'); 
?>


<div align="center">
	<?php
		session_destroy();
		header('Location: '.$_SERVER['PHP_SELF']);
	?>
</div>