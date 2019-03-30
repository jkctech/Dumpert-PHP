<?php
	namespace JKCTech\Dumpert;
	
	// Functions
	// Some common functions
	class Functions {
		// Variables
		var $errors = array(); // Errors are stored here
		var $meta = array(); // Metadata of last call (gentime, success, etc.)
		
		// unixToDumpert()
		// Convert unix timestamp to dumpert compatible date
		// "1553900400" -> "2019-03-30"
		function unixToDumpert($unix = "") {
			if(!is_int($unix))
				$unix = intval($unix);
			if(empty($unix))
				$unix = time();
			return date("Y-m-d", $unix);
		}
		
		// dumpertToUnix()
		// Convert dumpert compatible date to unix timestamp
		// "2019-03-30" -> "1553900400"
		function dumpertToUnix($date) {
			return strtotime($date);
		}
		
		// meta()
		// Get metadata of last call
		function meta() {
			return $this->meta;
		}
		
		// errors()
		// Return errors
		function errors() {
			return $this->errors;
		}
	}
?>