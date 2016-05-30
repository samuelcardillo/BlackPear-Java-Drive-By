<?php if(!$mod_login->isLogged()) header('Location: '.$_SERVER['PHP_SELF'].'?p=home'); ?>
<div align="center">
	Welcome, <? print $_SESSION['username']; ?><hr/>
	<?php
	
		$newsRequest 	= mysql_query($mod_news->getList("home",true));
		while($newsResult = mysql_fetch_assoc($newsRequest)):
			?>
			<div style="margin-top: 10px; border: 3px grey dashed;">
				<?php 
					print '<b><u>'.$newsResult['title'].'</b></u> by <b><i>'.$newsResult['author'].'</b></i> at <i>'.$newsResult['date'].'</i><hr/>';
					print $newsResult['content']; 
				?>
			</div>
			<?php
		endwhile;
	?>
</div>