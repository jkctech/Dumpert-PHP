<?php
	// Include Dumpert-PHP autoloader
	require_once(__DIR__ . "/../Dumpert-PHP/autoload.php");
	
	// Define namespace as "Dumpert"
	use JKCTech\Dumpert as Dumpert;
	
	// Create functions class
	$functions = new Dumpert\functions();
	
	// Run a command and display it's output
	echo '==========Data==========<br>';
	
	echo '<h2>Do some magic with time</h2>';
	
	// Vars
	$current = time();
	$datestring = date("d-m-Y", $current);
	$dumpertdate = $functions->unixToDumpert($current);
	$newdate = $functions->dumpertToUnix($dumpertdate);
	
	// Print result
	echo 'Current timestamp: ' . $current . '</br>';
	echo 'Current date: ' . $datestring . '</br>';
	echo 'unixToDumpert(' . $current . ') -> ' . $dumpertdate . '</br>';
	echo 'dumpertToUnix(' . $dumpertdate . ') -> ' . $newdate;
	
	// Show available metadata
	echo '</br></br>==========Meta==========<br></br>';
	echo '<pre>';
		print_r($functions->meta());
	echo '</pre>';
	
	// Show errors
	echo '</br></br>=========Errors=========<br></br>';
	echo '<pre>';
		print_r($functions->errors());
	echo '</pre>';
?>