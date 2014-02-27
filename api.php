<?php

/*
 * API Example
 */

require_once('smartReadFile.php');

// Get name passed via URL
$filename = $_GET['f'];
$base = 'media/';

// Whitelist filename characters
$ok = preg_match('/^[-A-Za-z0-9_.]+$/', $filename);

// Ignore requests that smell funny
if (!$ok) {
	header ("HTTP/1.1 404 Not Found");
	die();
}

$file = explode('.', $filename);

// Get the type by file extension
switch ($file[count($file)-1]) {
	case 'mp3':
		$type = 'audio/mpeg';
		break;
	case 'ogg':
		$type = 'audio/ogg';
		break;
	case 'm4a':
		$type = 'audio/mp4';
		break;
	case 'm4v':
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
