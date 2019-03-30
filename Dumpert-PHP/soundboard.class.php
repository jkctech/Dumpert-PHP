<?php
	namespace JKCTech\Dumpert;
	
	// Soundboard
	// Connect to the soundboard enpoint and do stuff
	class Soundboard {
		// Endpoint to connect to
		private static $endpoint = "https://video-snippets.dumpert.nl/soundboard.json";
		
		// getSounds()
		// Get object of sounds, thumbnails, videos and titles
		function getSounds() {			
			return json_decode(file_get_contents($this::$endpoint));
		}
	}
?>