<?php
		 /*-------------/
	  /	 BLACKPEAR 	 / BLACKPEAR STUFF
	 /	 SECURITY	  / IS SERIOUS STUFF
	/=============*/
	
	Class Mod_Login
	{
		var $table_name = "";
		var $logInfos;
		
		/**
		 * Check if the user exist in the dabatase
		 *
		 * @param 	$username 	string
		 * @param 	$password 	string
		 *
		 * @return 	$canLog 	bool
		 */
		public function checkInfos($username,$password)
		{
			if(!$username || !$password) return;
			$this->logInfos['username'] = htmlspecialchars(addslashes($username));
			$this->logInfos['password'] = htmlspecialchars(addslashes(md5($password)));
			
			$result = $this->getLoginInfos();
			
			($result['Username'] != $this->logInfos['username'] || $result['Password'] != $this->logInfos['password']) ? $canLog = false : $canLog = true;
			
			return $canLog;
		}
		
		/**
		 * Check is the user is an admin or not
		 *
		 * @param 	$username 	string
		 *
		 * @return 	$isAdmin 	bool
		 */
		public function isAdmin($username)
		{
			if(!$username) return;
			
			$this->logInfos['username'] = htmlspecialchars(addslashes($username));
			
			$result = $this->getLoginInfos();
			
			($result['isAdmin'] == 1) ? $isAdmin = true : $isAdmin = false;
			
			return $isAdmin;
		}
		
		/**
		 * Check is the user is a reseller or not
		 *
		 * @param 	$username 	string
		 *
		 * @return 	$isAdmin 	bool
		 */
		public function isReseller($username)
		{
			if(!$username) return;
			
			$this->logInfos['username'] = htmlspecialchars(addslashes($username));
			
			$result = $this->getLoginInfos();
			
			($result['isReseller'] == 1) ? $isReseller = true : $isReseller = false;
			
			return $isReseller;
		}
		
		/**
		 * Check if the user is logged or not. Really good function for all protected page
		 */
		public function isLogged()
		{
			if(!isset($_SESSION['username'])) 
				$isLogged = false;
			else
			{
				$this->logInfos['username'] = htmlspecialchars(addslashes($_SESSION['username']));
				
				$result = $this->getLoginInfos();
				
				($result['Username'] == $_SESSION['username']) ? $isLogged = true : $isLogged = false;
			}

			return $isLogged;
		}
		
		/**
		 * Check all information to complete the registration
		 *
		 * @param	$username		string
		 * @param	$registerKey	string
		 *
		 * @return 	$isOk			bool
		 */
		public function checkRegistration($username,$registerKey)
		{
			if(!$username || !$registerKey) return;
			$isOk = false;
			
			$this->logInfos['username'] = htmlspecialchars(addslashes($username));
			$this->logInfos['registrationKey'] = htmlspecialchars(addslashes($registerKey));
			$checkUsername = $this->getLoginInfos(); // Check username
			$checkRegistrationKey = $this->getRegistrationKey();
			
			($checkUsername['Username'] == false && $checkRegistrationKey['registerkey'] == $registerKey && $checkRegistrationKey['isused'] == 0) ? $isOk = true : null;
			
			return $isOk;
		}
		
		public function checkLicenseKey($username,$licenseKey)
		{	
			if(!$username OR !$licenseKey) return;
			$validLicense = false;
			
			$licenseKey = htmlspecialchars(addslashes($licenseKey));
			$this->logInfos['username'] = htmlspecialchars(addslashes($username));
			$checkLicense = $this->getLoginInfos();
			
			if($checkLicense['Username'] != false && $checkLicense['licenseKey'] == $licenseKey) $validLicense = true;
			
			return $validLicense;
		}
		
		/**
		 * Create the SQL request to check the registration key
		 */
		private function getRegistrationKey()
		{	
			$request = "SELECT * FROM `licensekey` WHERE registerkey='".$this->logInfos['registrationKey']."'";
			$request = mysql_query($request);
			$result = mysql_fetch_assoc($request);
			
			
			return $result;
		}
		
		/**
		 * Create the SQL request for take information of the user
		 */
		private function getLoginInfos()
		{	
			$request = "SELECT * FROM `bpcms_users` WHERE Username='".$this->logInfos['username']."'";
			$request = mysql_query($request);
			$result = mysql_fetch_assoc($request);
			
			return $result;
		}
	}
?>