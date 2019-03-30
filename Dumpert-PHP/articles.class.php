<?php
	namespace JKCTech\Dumpert;
	
	// Articles
	// Get lists of articles, search, vote or add views.
	class Articles {
		// Endpoint
		private static $endpoint = "https://api.dumpert.nl/mobile_api/json/";
		
		// Variables
		var $errors = array(); // Errors are stored here
		var $meta = array(); // Metadata of last call (gentime, success, etc.)
		
		// search()
		// Search for a keyword
		function search($text, $page = 0) {
			$settings = new Settings();
			$con = new Connector(); // Create a connector
			
			// Format text
			if($settings::$encodeText)
				$text = urlencode($text);
			
			// Only positive INT numbers
			if(empty($page) || !is_int($page) || $page < 0)
				$page = 0;
			
			$url = sprintf("%ssearch/%s/%d", $this::$endpoint, $text, $page); // Build url
			$data = json_decode($con->request($url)); // Send request and create object
			$this->meta = $data; // Set meta
			
			// Check for errors
			if(isset($this->meta->errors)) {
				// Move errors to $errors
				$this->errors = $this->meta->errors;
				unset($this->meta->errors);
				return false; // Return false 
			}
			
			// Move data
			$data = $this->meta->items;
			unset($this->meta->items);
			return $data; // Return
		}
		
		// view()
		// Add 1 to the view counter of an article
		function view($id) {
			$con = new Connector(); // Create a connector
			$url = sprintf("%sviewed/%s", $this::$endpoint, $id); // Build url
			$data = json_decode($con->request($url)); // Send request and create object
			$this->meta = $data; // Set meta;
			
			// Check for errors
			if(isset($this->meta->errors)) {
				// Move errors to $errors
				$this->errors = $this->meta->errors;
				unset($this->meta->errors);
				return false;
			}
			
			return true; // Return
		}
		
		// vote()
		// Vote on a post
		function vote($id, $direction) {
			$con = new Connector(); // Create a connector
			$direction = strtolower($direction); // Make direction lowercase
			
			// Filter sections
			if($direction != "up" && $direction != "down") {
				$this->errors[] = "Unknown vote direction.";
				return false;
			}
			
			$url = sprintf("%srating/%s/%s", $this::$endpoint, $id, $direction); // Build url
			$data = json_decode($con->request($url)); // Send request and create object
			$this->meta = $data; // Set meta
			
			// Move data
			$data = $this->meta->item;
			unset($this->meta->item);
			
			// Check for errors
			if(isset($this->meta->errors)) {
				// Move errors to $errors
				$this->errors = $this->meta->errors;
				unset($this->meta->errors);
			}
			
			return $data; // Return
		}
		
		// getTop5()
		// Get top5 of day, week or month
		function getTop5($section, $day) {
			$con = new Connector(); // Create a connector
			$section = strtolower($section); // Make section lowercase
			
			// Filter sections
			if($section != "dag" && $section != "week" && $section != "maand") {
				$this->errors[] = "Unknown top5 section.";
				return false;
			}
			
			$url = sprintf("%stop5/%s/%s", $this::$endpoint, $section, $day); // Build url
			$data = json_decode($con->request($url)); // Send request and create object
			$this->meta = $data; // Set meta
			
			// Check for errors
			if(isset($this->meta->errors)) {
				// Move errors to $errors
				$this->errors = $this->meta->errors;
				unset($this->meta->errors);
				return false; // Return false 
			}
			
			// Move data
			$data = $this->meta->items;
			unset($this->meta->items);
			return $data; // Return
		}
		
		// getHot()
		// Get the hottest posts fam
		function getHot() {
			$con = new Connector(); // Create a connector
			
			$url = $this::$endpoint . "hotshiz/"; // Build url (haha "Hot shiz")
			$data = json_decode($con->request($url)); // Send request and create object
			$this->meta = $data; // Set meta
			
			// Check for errors
			if(isset($this->meta->errors)) {
				// Move errors to $errors
				$this->errors = $this->meta->errors;
				unset($this->meta->errors);
				return false; // Return false 
			}
			
			// Move data
			$data = $this->meta->items;
			unset($this->meta->items);
			return $data; // Return
		}
		
		// getDumpertTv()
		// Gen entries from DumpertTV (optional add pagenumber)
		function getDumpertTv($page = 0) {
			$con = new Connector(); // Create a connector
			
			// Only positive INT numbers
			if(empty($page) || !is_int($page) || $page < 0)
				$page = 0;
			
			$url = $this::$endpoint . "dumperttv/" . $page; // Build url
			$data = json_decode($con->request($url)); // Send request and create object
			$this->meta = $data; // Set meta
			
			// Check for errors
			if(isset($this->meta->errors)) {
				// Move errors to $errors
				$this->errors = $this->meta->errors;
				unset($this->meta->errors);
				return false; // Return false 
			}
			
			// Move data
			$data = $this->meta->items;
			unset($this->meta->items);
			return $data; // Return
		}
		
		// getLatest()
		// Get latest posts (optional add pagenumber)
		function getLatest($page = 0) {
			$con = new Connector(); // Create a connector
			
			// Only positive INT numbers
			if(empty($page) || !is_int($page) || $page < 0)
				$page = 0;
			
			$url = $this::$endpoint . "latest/" . $page; // Build url
			$data = json_decode($con->request($url)); // Send request and create object
			$this->meta = $data; // Set meta
			
			// Check for errors
			if(isset($this->meta->errors)) {
				// Move errors to $errors
				$this->errors = $this->meta->errors;
				unset($this->meta->errors);
				return false; // Return false 
			}
			
			// Move data
			$data = $this->meta->items;
			unset($this->meta->items);
			return $data; // Return
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