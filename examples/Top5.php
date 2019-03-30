<?php
	// Include Dumpert-PHP autoloader
	require_once(__DIR__ . "/../Dumpert-PHP/autoload.php");
	
	// Define namespace as "Dumpert"
	use JKCTech\Dumpert as Dumpert;
	
	// Create article class
	$articles = new Dumpert\Articles();
	
	// Run a command and display it's output
	echo '==========Data==========<br>';
	
	echo '<h2>Dagtoppers</h2>';
	
	// Print result
	echo '<pre>';
		// getTop5() takes a section {"dag", "week", "maand"} and a date.
		// You COULD use the class function Functions->unixToDumpert() here.
		print_r($articles->getTop5("dag", "2019-03-30"));
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