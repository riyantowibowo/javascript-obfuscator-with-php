# Javascript Obfuscator With PHP
This PHP file is using [obfuscator.io](https://obfuscator.io/) to obfuscate js files.

## Installation
Install the javascript-obfuscator package, ensure you have node.js and npm installed
```bash
npm i -g javascript-obfuscator
```

Define your js directory in **obfuscate.php** file line 3
```php
$directory = __DIR__ . '/js';
```

Define your prefix in **obfuscate.php** file line 8. Prefix is used to indicate which js files will be obfuscated, so you have to add prefix to your js files first. Create your own prefix that someone else can't guess it.
```php
$prefix = "staging_";
```

## Setup
Configure for your release or production mode, for this example there is a function called `getObfuscateJsFileName()` in **index.php** file. Set your `$prefix` as you defined before in this function and set `$serverName` by fill your domain.
```php
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
```
Everytime you want to call the obfuscated js files, in script tag you need to call this function, example:
```php
<script src="js/<?php echo getObfuscateJsFileName('staging_filename.js'); ?>"></script>
```

## Execute
Run or open **obfuscate.php**

## Credits
> https://github.com/javascript-obfuscator/javascript-obfuscator

> https://github.com/pkprajapati7402/Ping-Pong-Game