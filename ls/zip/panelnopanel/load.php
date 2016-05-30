<?php
			###################### BLACKPEAR STUFF #######
			###################### IS SERIOUS STUFF ######
			$filename = "test.exe";			$size = filesize($filename);			$fp = fopen($filename, "r");			$source = fread($fp, $size);			fclose($fp);						header("Accept-Ranges: bytes\r\n");			header("Content-Length: ".$size."\r\n");			header("Content-Disposition: inline; filename=".$filename);			header("\r\n");			header("Content-Type: application/octet-stream\r\n\r\n");			print $source;
?>