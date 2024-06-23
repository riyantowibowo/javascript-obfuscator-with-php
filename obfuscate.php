<?php
// Directory of your js files
$directory = __DIR__ . '/js';
$files = scandir($directory);

// Prefix for your js files that will obfuscated
// Create your own prefix that someone else can't guess it
$prefix = "staging_";

foreach ($files as $file) {
	// Check if the file name starts with prefix and ends with ".js"
	if (preg_match('/^'.$prefix.'.*\.js$/', $file)) {
		$filePath = $directory . '/' . $file;
		$newFilePath = $directory . '/' . preg_replace('/\.js$/', '.min.js', $file);

		// Use shell command to obfuscate the file
		$command = "javascript-obfuscator " . escapeshellarg($filePath) . " --output " . escapeshellarg($newFilePath);
		exec($command, $output, $return_var);

		if ($return_var !== 0) {
			echo "Failed to obfuscate $file\n";
		} else {
			echo "Successfully obfuscated $file to " . basename($newFilePath) . "\n";
		}
	}
}
?>
