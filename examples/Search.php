<?php
	// Include Dumpert-PHP autoloader
	require_once(__DIR__ . "/../Dumpert-PHP/autoload.php");
	
	// Define namespace as "Dumpert"
	use JKCTech\Dumpert as Dumpert;
	
	// Create article class
	$articles = new Dumpert\Articles();
	
	// Run a command and display it's output
	echo '==========Data==========<br>';
	
	echo '<h2>Search for katten en honden</h2>';
	
	// Print result
	echo '<pre>';
		// search() takes a string to search
		// and an optional int pagenumeber.
		print_r($articles->search("kat hond", 0));
	echo '</pre>';
	
	// Show available metadata
	echo '</br></br>==========Meta==========<br></br>';
	echo '<pre>';
		print_r($articles->meta());
	echo '</pre>';
	
	// Show errors
	echo '</br></br>=========Errors=========<br></br>';
	echo '<pre>';
		print_r($articles->errors());
	echo '</pre>';
?>