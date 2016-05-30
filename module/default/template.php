<?php
		 /*-------------/
	  /	 BLACKPEAR 	 / BLACKPEAR STUFF
	 /	 SECURITY	  / IS SERIOUS STUFF
	/=============*/
	
	Class Mod_Template
	{
		var $template;
		
		/**
		 * Take the template name and return the CSS file needed
		 *
		 * @param $name string
		 *
		 * @return $this->template
		 */
		public function getTemplate($name)
		{
			#### CONDITION TIME #####
			if(!$name) return;
			if(!is_dir("template/".$name)) $name = "default"; // Check if the directory exist else take the default template (blackpear)
			
			##### CREATE AND STORE PATH #####
			$this->template['path'] = "template/".$name; // Store the template path
			
			$this->template['css'] = $this->template['path']."/".$name.".css"; // Create the path to the CSS
			$this->template['header'] = $this->template['path']."/".$name."_header.php"; // Create the path to the page header
			$this->template['footer'] = $this->template['path']."/".$name."_footer.php"; // Create the path to the page footer
			
			return $this->template;
		}
	}
?>