<?php
	// Include Dumpert-PHP autoloader
	require_once(__DIR__ . "/../Dumpert-PHP/autoload.php");
	
	// Define namespace as "Dumpert"
	use JKCTech\Dumpert as Dumpert;
	
	// Create article class
	$soundboard = new Dumpert\Soundboard();
?>
<html>
	<head>
		<style>
			* {
				margin: 0;
				padding: 0;
			}
			
			h2, fieldset {
				margin: 10px 0;
			}
			
			fieldset {
				width: 20%;
				display: inline-block;
				border: 0;
			}
		</style>
	</head>
	<body>
		<?php
			// Get latest page 0
			$sounds = $soundboard->getSounds();
			
			// Loop over all sounds
			foreach($sounds as $id => $sound) {
				echo '<fieldset>';
					echo '<center>'; // I KNOW this is deprecated but frankly, I just don't care :)
						echo '<a href="' . $sound->video . '" target="_blank">';
							echo '<img src="' . $sound->thumbnail . '"></br>';
						echo '</a>';
						echo '<audio controls><source src="' . $sound->url . '" type="audio/mpeg">Geen audio voor jou.</audio></br></br>';
					echo '</center>';
				echo '</fieldset>';
			}
		?>
	</body>
</html>