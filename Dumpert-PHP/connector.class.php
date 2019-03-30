<?php
	namespace JKCTech\Dumpert;
	
	// Connector
	// Connect to the Dumpert API in a controlled way
	class Connector {
		var $errors = array();
		
		// request()
		// Send a request to the Dumpert API
		function request($url, $method = "GET", $data = "", $mime = "application/json") {
			// Init some stuff
			$settings = new Settings(); // Settings connector
			$headers = array(); // Headers var
			$ch = curl_init(); // Init curl
			
			// NSFW Cookie
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: " . $settings::$nsfw ? "true" : "false"));
			
			// Set proper method
			// POST
			if(strtolower($method) == "post") {
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			}
			
			// PUT (This is not yet used tho)
			else if(strtolower($method) == "put") {
				// Add header and data
				$headers[] = 'Content-Type: ' . $mime;
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			}
			
			// Add default opts
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			
			// Get result & close
			$result = curl_exec($ch);
			curl_close($ch);
			
			// Return
			return $result;
		}
		
		// errors()
		// Return errors
		function errors() {
			return $this->errors;
		}
	}
?>