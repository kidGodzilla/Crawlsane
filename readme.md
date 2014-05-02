Crawlsane
================

Crawlsane is a project aimed at crawling external resources to retrieve general
metadata in PHP. It uses the HTTP library [Requests] and the native [DomDocument]
extension.

This project is mainly developed for a start-up that crawls [MOOC]'s and tutorials
from any website.

## Usage
The Crawlsane-object requires two arguments. The first of which is the location
of the resource you want to retrieve metadata. Secondly it takes a configuration
object.

```php
$configuration = new Configuration ();
$configuration->setCookiejar ('cookiejar');
$location = new Location ('https://www.youtube.com/watch?v=9DZXOANUaNk');
$crawlsane = new Crawlsane ($location, $configuration);
```

## How does it work?
The algorithm behind Crawlsane uses different techniques to obtain the most
accurate metadata and thumbnails for a resource. Essentially Crawlsane executes
the following steps.

### Metadata
1. Creates an [Opengraph] object according to the OGP
   protocol.
2. If the Opengraph object lacks metadata or is not present at all, it traverses
   the DOM looking for elements that can supply more metadata.

### Thumbnail(s)
1. Traverse the DOM for all images.
2. Apply heuristics to find images closest to the top of the visual DOM.
    1. Try to find width & height attributes on each element.
    2. If that fails run a partial image downloading technique ([Fastimage]):
       open a socket to download the images. Kill the socket as soon as the actual
       dimension are obtained.
3. Apply a ratio threshold of 3.0 on the images to filter out unwanted banners and
   logos.
4. Look for embedded content and apply the oEmbed specification on it to substitute
   the thumbnail.

## References
* [Reddit's scraper.py]:
* [Facebook's crawler]:
* [How to Find the Image That Best Represents a Web Page] by Zachary Broderick

## Libraries
* The code features an implementation of the Opengraph protocol developed by Facebook.
* It uses DomDocument to generate an internal document object model.


[Requests]: https://github.com/rmccue/Requests
[DomDocument]: http://www.php.net/manual/en/class.domdocument.php
[Opengraph]: http://ogp.me
[MOOC]: http://en.wikipedia.org/wiki/Massive_open_online_course
[Fastimage]: https://github.com/tommoor/fastimage

[How to Find the Image That Best Represents a Web Page]: https://tech.shareaholic.com/2012/11/02/how-to-find-the-image-that-best-respresents-a-web-page/
[Reddit's scraper.py]: https://github.com/reddit/reddit/blob/a6a4da72a1a0f44e0174b2ad0a865b9f68d3c1cd/r2/r2/lib/scraper.py#L192-L235
[Facebook's crawler]:
