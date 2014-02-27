<?php

/*
 * API Example
 */

// Perform some form of security validation.
// EG., You could check their PHP session is logged in.
$granted = true; // Bypass validation.

if (!$granted) {
	header ("HTTP/1.1 404 Not Found");
	die();
}

require_once('smartReadFile.php');

// Get filename passed via URL
$filename = $_GET['f'];

// Usually this would be hidden above the web server root. EG., '/hidden/media/'
$base = 'media/';

// Whitelist filename characters. Edit if your filenames require other characters.
// Never include the '/' character.
// ie., Learn from the link below, if you think it is already in there, because it's not!
// http://php.net/manual/en/reference.pcre.pattern.syntax.php
$ok = preg_match('/^[-A-Za-z0-9_.]+$/', $filename);

// Ignore requests that smell funny
if (!$ok) {
	header ("HTTP/1.1 404 Not Found");
	die();
}

$file = explode('.', $filename);

// You could check they have rights to access the media here.
//  - No checking in this example.

// Get the type by file extension
switch ($file[count($file)-1]) {
	case 'mp3':
		$type = 'audio/mpeg';
		break;
	case 'ogg':
		$type = 'audio/ogg';
		break;
	case 'oga':
		$type = 'audio/ogg';
		break;
	case 'm4a':
		$type = 'audio/mp4';
		break;
	case 'm4v':
		$type = 'video/mp4';
		break;
	case 'mp4':
		$type = 'video/mp4';
		break;
	case 'webm':
		$type = 'video/webm';
		break;
	case 'ogv':
		$type = 'video/ogg';
		break;
}

$path = $base . $filename;

// Call smartReadFile
smartReadFile($path, $filename, $type);
