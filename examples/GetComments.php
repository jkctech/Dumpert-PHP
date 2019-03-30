<?php
	// Include Dumpert-PHP autoloader
	require_once(__DIR__ . "/../Dumpert-PHP/autoload.php");
	
	// Define namespace as "Dumpert"
	use JKCTech\Dumpert as Dumpert;
	
	// Create comments class
	$comments = new Dumpert\Comments();
	
	// Run a command and display it's output
	echo '==========Data==========<br>';
	
	echo '<h2>Get HUGE comments list</h2>';
	
	// Print result
	echo '<pre>';
		// search() takes a string to search
		// and an optional int pagenumeber.
		print_r($comments->getComments("7654895_d5e54fc7"));
	echo '</pre>';
	
	// Show available metadata
	echo '</br></br>==========Meta==========<br></br>';
	echo '<pre>';
		print_r($comments->meta());
	echo '</pre>';
	
	// Show errors
	echo '</br></br>=========Errors=========<br></br>';
	echo '<pre>';
		print_r($comments->errors());
	echo '</pre>';
?>