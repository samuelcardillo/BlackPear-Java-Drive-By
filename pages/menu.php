<?php if(!$mod_login->isLogged()) header('Location: '.$_SERVER['PHP_SELF'].'?p=home'); ?>

<div class="dock" id="dock">
  <div class="dock-container">
  <a class="dock-item" href="?p=connected"><img src="template/default/images/plus_48x48.png" alt="home" /><span>Home</span></a> 
  <a class="dock-item" href="?p=generate"><img src="template/default/images/data_48x48.png" alt="contact" /><span>Generate</span></a> 
  <a class="dock-item" href="?p=help"><img src="template/default/images/info_48x48.png" alt="portfolio" /><span>Help</span></a> 
  <?php
	if(!$mod_login->isReseller($_SESSION['username'])) print '<a class="dock-item" href="'.$_SERVER['PHP_SELF'].'?p=panel"><img src="template/default/images/user_48x48.png" alt="music" /><span>User Panel</span></a>';
	(!$mod_login->isReseller($_SESSION['username'])) 
		? print '<a class="dock-item" href="'.$_SERVER['PHP_SELF'].'?p=upgrade"><img src="template/default/images/exclamation_48x48.png" alt="portfolio" /><span>Upgrade</span></a>'
		: print '<a class="dock-item" href="'.$_SERVER['PHP_SELF'].'?p=resellerpanel"><img src="template/default/images/user_48x48.png" alt="portfolio" /><span>Reseller Panel</span></a>';
		
	if($mod_login->isAdmin($_SESSION['username'])) print '<a class="dock-item" href="'.$_SERVER['PHP_SELF'].'?p=admin"><img src="template/default/images/chart_48x48.png" alt="admin" /><span>Admin Link</span></a>';
  
  ?>
  <a class="dock-item" href="?p=disconnect"><img src="template/default/images/remove_48x48.png" alt="rss" /><span>Disconnect</span></a> 
  
</div>
</div>
<script type="text/javascript">
	
	$(document).ready(
		function()
		{
			$('#dock').Fisheye(
				{
					maxWidth: 50,
					items: 'a',
					itemsText: 'span',
					container: '.dock-container',
					itemWidth: 40,
					proximity: 90,
					halign : 'center'
				}
			)
		}
	);

</script>

<?php 
$o = 1;
if($mod_login->isAdmin($_SESSION['username']) && $o = 0) 
{
	?>
	
	<b>[<a id="menulink" href="?p=connected">HOME</a> - <a id="menulink" href="?p=generate">GENERATOR</a> - <a id="menulink" href="?p=help">HELP</a> - <?php if(!$mod_login->isReseller($_SESSION['username'])) print '<a href="'.$_SERVER['PHP_SELF'].'?p=panel" id="menulink">PANEL</a> -'; ?> <?php (!$mod_login->isReseller($_SESSION['username'])) ? print '<a href="'.$_SERVER['PHP_SELF'].'?p=upgrade" id="menulink">UPGRADE</a>' : print '<a id="menulink" href="'.$_SERVER['PHP_SELF'].'?p=resellerpanel">RESELLER PANEL</a>'; ?> - <a id="menulink" href="?p=disconnect">DISCONNECT</a>]</b>

<div class="dock" id="dock">
  <div class="dock-container">
  <a class="dock-item" href="?p=connected"><img src="template/default/images/plus_48x48.png" alt="home" /><span>Home</span></a> 
  <a class="dock-item" href="?p=generate"><img src="template/default/images/data_48x48.png" alt="contact" /><span>Generate</span></a> 
  <a class="dock-item" href="?p=help"><img src="template/default/images/info_48x48.png" alt="portfolio" /><span>Help</span></a> 
  <?php
	if(!$mod_login->isReseller($_SESSION['username'])) print '<a class="dock-item" href="#"><img src="template/default/images/user_48x48.png" alt="music" /><span>User Panel</span></a>';
	(!$mod_login->isReseller($_SESSION['username'])) 
		? print '<a class="dock-item" href="'.$_SERVER['PHP_SELF'].'?p=upgrade"><img src="template/default/images/exclamation_48x48.png" alt="portfolio" /><span>Upgrade</span></a>'
		: print '<a class="dock-item" href="'.$_SERVER['PHP_SELF'].'?p=resellerpanel"><img src="template/default/images/chart_48x48.png" alt="portfolio" /><span>Reseller Panel</span></a>';
  ?>
  <a class="dock-item" href="?p=disconnect"><img src="template/default/images/remove_48x48.png" alt="rss" /><span>Disconnect</span></a> 
  
</div>
</div>
<script type="text/javascript">
	
	$(document).ready(
		function()
		{
			$('#dock').Fisheye(
				{
					maxWidth: 50,
					items: 'a',
					itemsText: 'span',
					container: '.dock-container',
					itemWidth: 40,
					proximity: 90,
					halign : 'center'
				}
			)
		}
	);

</script>
	<?php
}
?>