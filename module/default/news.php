<?php
		 /*-------------/
	  /	 BLACKPEAR 	 / BLACKPEAR STUFF
	 /	 SECURITY	  / IS SERIOUS STUFF
	/=============*/
	
	Class Mod_News
	{
		/**
		 * List all article in the database for this page
		 *
		 * 	@param 	$page 	string
		 * 	@param 	$isDesc bool
		 *
		 * 	@return $request
		 */
		public function getList($page,$isDesc = false)
		{
			if(!$page) return;
			
			$request = "SELECT * FROM `bpcms_news` WHERE page='".$page."' ORDER BY id";
			if($isDesc == true) $request .= " DESC";
			
			return $request;
		}
		
		/**
		 * Take the news with the same asked id
		 *
		 * 	@param 	$page 	string
		 * 	@param 	$id 	int
		 *
		 *	@return $request
		 */
		public function getNews($id)
		{
			if(!$id) return;
			
			$request = "SELECT * FROM `bpcms_news` WHERE id='".$id."' ORDER BY id";
			
			return $request;
		}
	}
?>