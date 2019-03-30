<?php
	// Include Dumpert-PHP autoloader
	require_once(__DIR__ . "/../Dumpert-PHP/autoload.php");
	
	// Define namespace as "Dumpert"
	use JKCTech\Dumpert as Dumpert;
	
	// Create article class
	$articles = new Dumpert\Articles();
	
	// Run a command and display it's output
	echo '==========Data==========<br>';
	
	echo '<h2>Vote for a post</h2>';
	
	// Print result
	echo '<pre>';
		// vote() takes a post id and a direction {"up", "down"}
		// for upvote / downvote respectively.
		print_r($articles->vote("7654895_d5e54fc7", "up"));
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