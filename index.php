<?php
function getObfuscateJsFileName($fileName) {
	// Your prefix in obfuscate.php
	$prefix = "staging_";

	// Get the server name
	$serverName = $_SERVER['SERVER_NAME'];

	// Check if the file name starts with the obfuscator prefix
	if (preg_match('/^'.$prefix.'(.*)\.js$/', $fileName, $matches)) {

		// Return obfuscated file name if in release or production mode
		if ($serverName === 'yourdomain.com') {
			// Remove the prefix and add "min" before the file extension
			return $matches[1] . '.min.js';
		}

	}

	// Return the original file name if in staging or development mode like for your localhost
	return $fileName;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ping Pong Game</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			background-color: #000;
			margin: 0;
		}
		canvas {
			border: 2px solid #fff;
		}
	</style>
</head>
<body>
	<canvas id="pong" width="800" height="400"></canvas>
	<script src="js/<?php echo getObfuscateJsFileName('staging_pingpong.js'); ?>"></script>
	<script src="js/no-prefix-example.js"></script>
</body>
</html>