<?php
	/**
	 *  This module give to the developper an easy way for generate string
	 */
	Class Mod_Generate
	{
		/**
		 * Generate a string with only letters (and special chars)
		 *
		 * @param 	$length 		int
		 * @param 	$specialchars 	bool
		 *
		 * @return 	$result			string
		 */
		public function genLetters($length,$specialchars = false)
		{
			if(!$length) return;
			
			$result = null;
				
			$validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ";
			if($specialchars) $validCharacters .= "+-*#&@!?";
			
			$validCharNumber = strlen($validCharacters);
			for ($i = 0; $i < $length; $i++) 
			{
				$index = mt_rand(0, $validCharNumber - 1);
				$result .= $validCharacters[$index];
			}

			return $result;
		}
		
		/**
		 * Simple number generator like the rand function
		 *
		 * @param 	$length 		int
		 *
		 * @return 	$result			string
		 */
		public function genNumbers($length)
		{
			if(!$length) return;
			
			$result = null;
				
			$validCharacters = "123456789";
			
			$validCharNumber = strlen($validCharacters);
			for ($i = 0; $i < $length; $i++) 
			{
				$index = mt_rand(0, $validCharNumber - 1);
				$result .= $validCharacters[$index];
			}

			return $result;
		}
		
		/**
		 * Generate a string with letters and numbers (and special chars)
		 *
		 * @param 	$length 		int
		 * @param 	$specialchars 	bool
		 *
		 * @return 	$result			string
		 */
		public function genString($length,$specialchars = false)
		{
			if(!$length) return;
			
			$result = null;
				
			$validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ"; 	// Add letters
			$validCharacters .= "123456789";											// Add numbers
			if($specialchars) $validCharacters .= "+-*#&@!?";							// Add special chars (if bool is true)
			
			$validCharNumber = strlen($validCharacters);
			for ($i = 0; $i < $length; $i++) 
			{
				$index = mt_rand(0, $validCharNumber - 1);
				$result .= $validCharacters[$index];
			}

			return $result;
		}
	}
?>