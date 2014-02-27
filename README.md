# smartReadFile

For reading media file through a PHP controller

## Code example:

This code is a bit woolly and will be adding a set of demo files to show it in actions properly.

```php
require_once('smartReadFile.php');

// Get name passed via URL
$code = $_GET['file'];
$basePath = 'media/';

// Translate into real filename
switch ($code) {
    case 'mp3':
        $track = 'bubble.mp3';
        $type = 'audio/mpeg';
        break;
     case 'ogg':
        $track = 'bubble.ogg';
        $type = 'audio/ogg';
        break;
    default:
        $track = '';
}
$path = $basePath . $track;

smartReadFile($path, $track, $type);
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
* **Big Bubk Bunny** © 2008 Blender Foundation - [bigbuckbunny.org](http://www.bigbuckbunny.org/)
