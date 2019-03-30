<?php
	namespace JKCTech\Dumpert;
	
	class Comments {
		// Endpoint
		private static $endpoint = "https://comments.dumpert.nl/api/v1.0";
		
		// Variables
		var $errors = array(); // Errors are stored here
		var $meta = array(); // Metadata of last call (gentime, success, etc.)
		
		// getComments()
		// Get ALL comments from a post
		function getComments($id) {
			$con = new Connector(); // Create a connector
			$id = explode("_", $id); // Splice ID
			
			// Validate ID
			if(count($id) != 2) {
				$this->errors[] = "Malformed ID";
				return false;
			}
			
			$url = sprintf("%s/articles/%s/%s/%s", $this::$endpoint, $id[0], $id[1], "comments/?includeitems=1"); // Build url
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
			$data = $this->meta->data->comments;
			unset($this->meta->data->comments);
			return $data; // Return
		}
		
		// vote()
		// Vote on a comment
		// Not working because of some sort of firewall :(
		// function vote($id, $direction) {
			// $con = new Connector(); // Create a connector
			// $direction = strtolower($direction); // Make direction lowercase
			
			// // Filter sections
			// if($direction != "up" && $direction != "down") {
				// $this->errors[] = "Unknown vote direction.";
				// return false;
			// }
			
			// $post_data = json_encode(array("kudo_action" => $direction));
			
			// $url = sprintf("%s/comments/%s", $this::$endpoint, $id); // Build url
			// $data = json_decode($con->request($url, "PUT", $post_data)); // Send request and create object
			
			// // TODO
			
			// return $data; // Return
		// }
		
		// getComment()
		// Get comment by !COMMENT! id (Looks like "243794639")
		// Not working because of some sort of firewall :(
		// function getComment($id) {
			// $con = new Connector(); // Create a connector
			
			// $url = sprintf("%s/comments/%s", $this::$endpoint, $id); // Build url
			// $data = die($con->request($url)); // Send request and create object
			// $this->meta = $data; // Set meta
			
			// // Check for errors
			// if(isset($this->meta->errors)) {
				// // Move errors to $errors
				// $this->errors = $this->meta->errors;
				// unset($this->meta->errors);
				// return false; // Return false 
			// }
			
			// // Move data
			// $data = $this->meta->data->comment;
			// unset($this->meta->data->comment);
			// return $data; // Return
		// }
		
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