# smartReadFile

For reading media files through a PHP controller, while accepting **range** rquests.

This satisfies the requirements for HTML5 media requests in **\<audio\>** and **\<video\>** elements.

## Code example:

This code is in the api.php file. You should refer to the api.php file for the latest version of usage example.

```php
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
```

## License

MIT License.

## Kudos to the creators!

The development history:

* Alpha: gaosipov of [php.net](http://php.net/manual/en/function.readfile.php#86244) User Contributed Notes
* Beta: Joe Lencioni of [Shifting Pixel](http://shiftingpixel.com/)
* 1.0: Eoin of [bitesizeirishgaelic.com](http://www.bitesizeirishgaelic.com/)

## Media Copyright

The media used in this demo is owned by:

* **Bubble** © 2003 Miaow / Arnaud Laflaquiere - [MiaowMusic.com](http://www.miaowmusic.com/)
* **Big Buck Bunny** © 2008 Blender Foundation - [bigbuckbunny.org](http://www.bigbuckbunny.org/)

## Known Issues

* When this project is behind *Apache AuthType*, **OSX Safari** refuses to play the media served.
