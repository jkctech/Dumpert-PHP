<?php
	// Include Dumpert-PHP autoloader
	require_once(__DIR__ . "/../Dumpert-PHP/autoload.php");
	
	// Define namespace as "Dumpert"
	use JKCTech\Dumpert as Dumpert;
	
	// Create article class
	$articles = new Dumpert\Articles();
	
	echo '<h2>Example Dumpert Homepage</h2>';
	
	// Get latest page 0
	$posts = $articles->getLatest(0);
	
	// Loop over all articles
	foreach($posts as $id => $post) {
		echo '<fieldset>';
			echo '<legend>#' . ($id + 1) . ' - ' . $post->title . '</legend>';
			
			echo '<a href="https://www.dumpert.nl/mediabase/' . str_replace('_', '/', $post->id) . '" target="_blank">';
				echo '<img src="' . $post->thumbnail . '"></br>';
			echo '</a>';
			
			echo '<p>';
				echo $post->description . '</br>';
				echo 'Date: ' . date("d-m-Y @ H:i:s", strtotime($post->date)) . '</br>';
				echo 'Kudo\'s: ' . $post->stats->kudos_total . '</br>';
				echo 'Views: ' . $post->stats->views_total . '</br>';
				echo 'NSFW: ' . ($post->nsfw ? "Yes" : "No") . '</br>';
				echo 'Tags: ' . $post->tags . '</br>';
			echo '</p>';
		echo '</fieldset>';
	}
	
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