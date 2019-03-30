<?php
	// Include Dumpert-PHP autoloader
	require_once(__DIR__ . "/../Dumpert-PHP/autoload.php");
	
	// Define namespace as "Dumpert"
	use JKCTech\Dumpert as Dumpert;
	
	// Create article class
	$articles = new Dumpert\Articles();
	
	// Run a command and display it's output
	echo '==========Data==========<br>';
	
	echo '<h2>Hottest shiz right now</h2>';
	
	// Print result
	echo '<pre>';
		print_r($articles->getHot()); // getHot() cannot take any parameters sadly
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