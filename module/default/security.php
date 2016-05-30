<?php
		 /*-------------/
	  /	 BLACKPEAR 	 / BLACKPEAR STUFF
	 /	 SECURITY	  / IS SERIOUS STUFF
	/=============*/
	
	Class Mod_Security
	{
		public function checkLog($username,$min)
		{
			if(!$username OR !$min) return;
			$isOk = false;
			
			$query = mysql_query("SELECT * FROM bpcms_users WHERE Username='$username'");
			$result = mysql_fetch_assoc($query);
			
			if($result['lastGen'] == null):
				$time = $this->getTime();
				// mysql_query("UPDATE bpcms_users SET lastGen='$time' WHERE Username='$username'");
				$isOk = true;
			else:
				$lastGen = $result['lastGen']; // Take the last generation time
				$timeNow = $this->getTime(); // Take the time now
				$condition = $lastGen - $timeNow; // Do the substraction
				$condition = explode("-", $condition);
				$secondeForCondition = 60 * $min; // Multiplicate secondes with minute for the conditon
				
				if($condition[1] >= $secondeForCondition) $isOk = true;
			endif;
			
			return $isOk;
		}
		
		public function checkSubscription($username)
		{
			$subscriptionRequest = mysql_query("SELECT * FROM bpcms_users WHERE Username='$username'");
			$subscriptionResult = mysql_fetch_assoc($subscriptionRequest);
			if($subscriptionResult['isReseller'] != 1) return;
			
			$subscriptionDate = $subscriptionResult['subscriptionDate'];
			$subscriptionDate = explode('-',$subscriptionDate);
			$endMonth = $subscriptionDate[0] + 1;
			$endDay = $subscriptionDate[1] + 1 - 1;
			$dayNow = date("d") + 1 - 1;
			$monthNow = date("m") + 1 - 1;
			
			if($dayNow >= $endDay && $monthNow >= $endMonth)
				mysql_query("UPDATE bpcms_users SET isReseller='0' WHERE Username='$username'");
		}
		
		public function setTime($username)
		{
			$timeNow = $this->getTime();
			mysql_query("UPDATE bpcms_users SET lastGen='$timeNow' WHERE Username='$username'");
		}
		
		private function getTime()
		{
			$time = time();
			return $time;
		}
	}
?>